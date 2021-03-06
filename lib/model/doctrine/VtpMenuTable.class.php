<?php

/**
 * VtpMenuTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtpMenuTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VtpMenuTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VtpMenu');
    }

    public static function getMenuByType($type,$lstChild,$portalId)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->select('name, parent_id, level, priority')
            ->where('type=?', $type)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', $portalId)
            ->andWhereNotIn('id',explode(',',$lstChild))
            ->orderby('priority');

        $arrCat = $query->execute();
        $arrResult = array();
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult[''] = '---' . $i18n->__('Chọn Menu cha') . '---';
        foreach ($arrCat as $cat) {
            $strTab = '';
            if ($cat->level > 0) {
                for ($i = 0; $i < $cat->level; $i++) {
                    $strTab = $strTab . '...';
                }
            }
            $arrResult[$cat->id] = $strTab . $cat->name;
        }

        return $arrResult;
    }

    public static function checkSlug($slug, $id)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?', $slug)
            ->andWhere('id<>?', $id);
        return $query;
    }

    public static function getMenuById($id)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->select('level')
            ->Where('id=?', $id);
        return $query->fetchOne();
    }

    //Cập nhật thứ tự
    public static function updateOrder($categoryId, $parent_id, $level, $priority)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->update()
            ->set('parent_id', '?', $parent_id)
            ->set('level', '?', $level)
            ->set('priority', '?', $priority)
            ->where('id=?', $categoryId);
        return $query->execute();
    }

    public static function getAllMenu($type)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getMenuByParentID($type, $parentId,$portalId)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', $portalId)
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getListMenu($type, $strCat)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhereIn('id', explode(',', $strCat))
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    //Lấy các category cùng mức
    public static function getMenuByLevel($type, $parentId)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getMenuByPriority($type, $priority)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('priority > ?', $priority)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', sfContext::getInstance()->getUser()->getAttribute('portal',0))
            ->orderby('priority asc');
        return $query->execute();
    }

    /***
     * Begin method frontend
     */

    public static function getMenu($type,$portal)
    {
        $query = VtpMenuTable::getInstance()->createQuery()
            ->select('id, name, parent_id, level, link, slug, image_path')
            ->where('type=?', $type)
            ->andWhere('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', $portal)
            ->orderby('priority asc');
        return $query->fetchArray();
    }
    public static function getMenu1($type,$portal)
    {
        $query = VtpMenuTable::getInstance()->createQuery('a')
            ->select('a.id, a.name, a.parent_id, a.level, a.link, a.slug, a.image_path, v.id, v.name, v.parent_id, v.level, v.link, v.slug, v.image_path')
            ->leftJoin('a.VtpParentMenu v ON (v.parent_id = a.id AND v.is_active = 0)' )
            ->where('a.type=?', $type)
            ->andWhere('a.level = 0')
            ->andWhere('a.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('a.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('a.portal_id=?', $portal)
            ->orderby('priority asc');
        return $query->fetchArray();
    }

    //Lay parent theo slug
    public static function getListMenuBySlug($slug,$portalId)
    {
        $query = VtpMenuTable::getInstance()->createQuery('c')
            ->select('p.id, p.name, p.description, p.image_path, p.parent_id, p.slug, p.link,c.type')
            ->innerJoin('c.ParentMenu p')
            ->where('c.slug=?', $slug)
            ->andWhere('c.is_active = ?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.is_active = ?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.portal_id=?', $portalId)

            ->orderBy('p.priority asc');
        return $query->fetchArray();
    }

    public static function getListVasService($slug)
    {

    }

    // huync2: menu
    protected static $menuCache = array();

    public static function getMenuTree($type, $routeName = '', $slug = '', $rootMenuId = null, $limit = null, $subLimit = 20)
    {
        $user = sfContext::getInstance()->getUser();
//        if (!$rootMenuId && !empty(self::$menuCache['default']) && count(self::$menuCache['default']) == $limit) {
//            return self::$menuCache['default'];
//        } elseif ($rootMenuId > 0 && !empty(self::$menuCache['menu_'.$rootMenuId])) {
//            return self::$menuCache['menu_'.$rootMenuId];
//        }
        $query = self::getInstance()->createQuery()
            ->select('id, name, parent_id, level, link, slug, image_path')
            ->where('type = ?', $type)
            ->andWhere('is_active = ?', VtCommonEnum::NUMBER_ONE)
//            ->andWhere('portal_id = ?', $user->getAttribute('portal', 0))
//            ->andWhere('lang = ?', $user->getCulture())
            ->andWhere('level < 2 ')
            ->orderby('priority ASC');//level DESC, parent_id ASC, sao lại order by level với parent_id
        $allMenus = $query->fetchArray();

        $result = array();
        $count = 0;
        $subCounts = array();   // Counter for submenus
        $flag=0;
        foreach ($allMenus as $item) {
            // Checking if item is active
            if ($routeName) {
                $hasRoute = VtHelper::startsWith($item['link'], '@'.$routeName);

                $itemSlug = null;
                $matches = null;
                if (preg_match("/slug=([\%|\-|\w]+)/", $item['link'], $matches) === 1) {
                    $itemSlug = $matches[1];
                }
                $hasSlug = ((empty($slug) && empty($itemSlug)) || (!empty($slug) && $slug == $itemSlug));
                $item['active'] = ($hasRoute && $hasSlug)? 1 : 0;
            } else {
                $item['active'] = 0;
            }

            // Finished collecting this menu's children
            if (isset($result[ $item['id'] ])) {
                $item['submenu'] = $result[ $item['id'] ]['submenu'];
                $item['active'] = max($item['active'], $result[ $item['id'] ]['active']);
                unset($result[ $item['id'] ]);
                // This is the menu we want to find. Return immediately
                if ($rootMenuId == $item['id']){
                    self::$menuCache['menu_'.$rootMenuId] = $item['submenu'];
                    return $item['submenu'];
                }
                // Merge item with submenu back to results;
                if (!$item['parent_id']) {
                    $result[ $item['id'] ] = $item;
                    $count++;

                    // If menu count limit exceeded
                    if ($limit > 0 && $count >= $limit) {
                        foreach ($result as $key => $value) {
                            if (empty($value['id']) || !empty($value['parent_id'])){
                                unset($result[$key]);
                            }
                        }
                        break;
                    }

                    continue;
                }
            }

            // Collecting menu's children
            if ($item['parent_id'] > 0) {
                // Checking Sub-menus' limit
                if ($subLimit > 0) {
                    if (!isset($subCounts[ $item['parent_id'] ])){
                        $subCounts[ $item['parent_id'] ] = 1;
                    } elseif ($subCounts[ $item['parent_id'] ] >= $subLimit) {
                        continue;
                    } else {
                        $subCounts[ $item['parent_id'] ]++;
                    }
                }

                if ( isset($result[ $item['parent_id'] ]) ) {
                    $result[ $item['parent_id'] ]['submenu'][] = $item;
                    $result[ $item['parent_id'] ]['active'] = max($item['active'], $result[ $item['parent_id'] ]['active']);
                } else {
                    $result[ $item['parent_id'] ] = array(
                        'submenu' => array($item),
                        'active' => $item['active']
                    );
                }
            } else {
                $result[ $item['id'] ] = $item;
                $count++;
                // If menu count limit exceeded
                if ($limit > 0 && $count >= $limit) {
                    foreach ($result as $key => $value) {
                        if (empty($value['id']) || !empty($value['parent_id'])){
                            unset($result[$key]);
                        }
                    }
                    break;
                }
            }
        }

//        self::$menuCache['default'] = $result;

        // Ta-da

        return $result;
    }

    //Front end
}