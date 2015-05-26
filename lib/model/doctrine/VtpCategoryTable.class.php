<?php

/**
 * VtpCategoryTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtpCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VtpCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VtpCategory');
    }

    public static function checkSlug($slug, $id)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?', $slug)
            ->andWhere('id<>?', $id);
        return $query;
    }

    public static function getCategoryById($id)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->select('level,name')
            ->Where('id=?', $id);
        return $query->fetchOne();
    }

    public static function getCategoryByPermission($permission, $type,$portalId)
    {
//        $permission=sfGuardPermissionTable::getPermissionByName($permissionName);

        if ($permission != null) {
            $strCat = VtpCategoryPermissionTable::getCatgoryIdByPermission($permission);
            if ($strCat != '') {
                $query = VtpCategoryTable::getInstance()->createQuery()
                    ->select('name, parent_id, level, priority')
                    ->where('type=?', $type)
                    ->andWhereIn('id', explode(',', $strCat))
                    ->andWhere('portal_id=?', $portalId)
                    ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
                    ->orderby('priority asc');
                $arrCat = $query->execute();
                $arrResult = array();
                $i18n = sfContext::getInstance()->getI18N();
                $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
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
            } else {
                $i18n = sfContext::getInstance()->getI18N();
                $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
                return $arrResult;
            }
        } else {
            $i18n = sfContext::getInstance()->getI18N();
            $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
            return $arrResult;
        }
    }

    public static function getCategoryByType($type,$portalId,$listChild)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->select('name, parent_id, level, priority')
            ->where('type=?', $type)
            ->andWhere('portal_id=?',$portalId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        if($listChild!=''){
            $query->andWhereNotIn('id',explode(',',$listChild));
        }
        $arrCat = $query->execute();
        $arrResult = array();
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult[''] = $i18n->__('---Chọn chuyên mục---');
        foreach ($arrCat as $cat) {
            $strTab = '';
            if ($cat->level > 0) {
                for ($i = 0; $i < $cat->level; $i++) {
                    $strTab = $strTab . '...';
                }
            }
            $arrResult[$cat->id] = $strTab . htmlspecialchars($cat->name);
        }

        return $arrResult;
    }

    //Cập nhật thứ tự
    public static function updateOrder($categoryId, $parent_id, $level, $priority)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->update()
            ->set('parent_id', '?', $parent_id)
            ->set('level', '?', $level)
            ->set('priority', '?', $priority)
            ->where('id=?', $categoryId);
        return $query->execute();
    }

    public static function getAllCategory($type)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }
    //danh cho backend, neu dung cho frontend thi viet ra mot ham khac

    public static function getCategoryByParentID($type, $parentId,$portalId)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', $portalId)
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getListCategory($type, $strCat)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhereIn('id', explode(',', $strCat))
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    //Lấy các category cùng mức
    public static function getCategoryByLevel($type, $parentId)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere(($parentId != '') ? 'parent_id=?' : '(parent_id=? or parent_id is null)', $parentId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    public static function getCategoryByPriority($type, $priority)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->where('type=?', $type)
            ->andWhere('priority > ?', $priority)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        return $query->execute();
    }

    /*
     * Frontend Begin
     */

    public static function getActiveCategoryQuery($portalID)
    {
        return VtpCategoryTable::getInstance()->createQuery('c')
            ->where('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('c.portal_id=?', $portalID);
    }

    public static function getActiveCategoryWithParentSlugQuery($slug,$portalID)
    {
        return self::getActiveCategoryQuery($portalID)
            ->leftJoin('c.VtpParentCategory p')
            ->andWhere('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.slug=?', $slug)
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    public static function getActiveCategoryWithChildSlugQuery($slug)
    {
        return VtpCategoryTable::getInstance()->createQuery('p')
            ->leftJoin('p.ParentCategory c')
            ->where('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.slug=?', $slug)
            ->andWhere('c.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    public static function getActiveCategorySpecSlugQuery($slug,$portalID)
    {
        return VtpCategoryTable::getInstance()->createQuery('p')
            ->leftJoin('p.ParentCategory c')
            ->where('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('p.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('p.slug=?', $slug)
            ->andWhere('p.portal_id=?', $portalID);
//            ->andWhere('c.is_active=?', VtCommonEnum::NUMBER_ONE);
    }


    public static function getCategoryBySlug($slug,$portalId)
    {
        return self::getActiveCategoryQuery($portalId)
            ->select('c.name, c.slug')
            ->andWhere('c.slug=?', $slug)
            ->fetchOne();
    }

    //ngoctv: getCategory for Breakum
    public static function getListParentByParent($id,$portalID)
    {
        return self::getActiveCategoryQuery($portalID)
            ->select('c.id, c.name, c.slug, c.parent_id')
            ->andWhere('c.id=?', $id)
            ->fetchOne();
    }

    //Lay parent theo slug
    public static function getListCategoryBySlug($slug,$portalID)
    {
        return self::getActiveCategoryWithParentSlugQuery($slug,$portalID)
            ->select('c.id, c.name, c.description, c.image_path, c.parent_id, c.slug, c.link, p.name, p.slug')
            ->orderBy('c.priority asc')
            ->fetchArray();
//        $query = VtpCategoryTable::getInstance()->createQuery('c')
//            ->select('p.id, p.name, p.description, p.image_path, p.parent_id, p.slug, p.link,c.name, c.slug')
//            ->innerJoin('c.ParentCategory p')
//            ->where('c.slug=?', $slug)
//            ->andWhere('p.lang=?', sfContext::getInstance()->getUser()->getCulture())
//            ->orderBy('p.priority asc');
//        return $query->fetchArray();
    }

    public static function getArrCatIdBySlug($slug,$portalID)
    {
        return self::getActiveCategorySpecSlugQuery($slug,$portalID)
            ->select('c.id, p.id')
            ->orderBy('c.priority asc')
            ->fetchArray();
//        $query = VtpCategoryTable::getInstance()->createQuery('c')
//            ->select('p.id, c.id')
//            ->leftJoin('c.ParentCategory p')
//            ->where('c.slug=?', $slug)
//            ->orderBy('p.priority asc');
//        return $query->fetchArray();
    }

    public static function getLimitCategoryByParentID($portalID,$type, $parentId, $limit )
    {
        return self::getActiveCategoryQuery($portalID)
            ->select('c.id, c.name, c.slug, c.link')
            ->andWhere('c.type=?', $type)
            ->andWhere(($parentId != '') ? 'c.parent_id=?' : '(c.parent_id=? or c.parent_id is null)', $parentId)

            ->limit($limit)
            ->orderby('c.priority asc')
            ->execute();
    }

    //Roaming
    public static function getRoamingService($slug, $limit)
    {
        return self::getActiveCategoryWithChildSlugQuery($slug)
            ->select('p.id, c.id, c.name,c.slug, s.title, s.header, s.image_path, s.link, s.slug')
            ->innerJoin('c.ServicesCategory s')
            ->andWhere('s.is_active=?', VtCommonEnum::NUMBER_TWO)
            ->andWhere('s.is_delete=?', VtCommonEnum::NUMBER_ZERO)
            ->andWhere('s.published_time <= ?', date('Y-m-d H:i:s', time()))
            ->andWhere('s.expiredate_time >= ? or s.expiredate_time is null', date('Y-m-d H:i:s', time()))
            ->andWhere('s.lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderBy('c.priority ASC, s.priority ASC')
            ->limit($limit)
            ->fetchArray();
//        $query = VtpCategoryTable::getInstance()->createQuery('c')
//            ->select('c.id, p.id, p.name,p.slug, s.title, s.header, s.image_path, s.link, s.slug')
//            ->innerJoin('c.ParentCategory p ')
//            ->innerJoin('p.ServicesCategory s on p.id=s.category_id and p.is_active=1')
//            ->where('s.is_active=?', VtCommonEnum::NUMBER_TWO)
//            ->andWhere('s.is_delete=?', VtCommonEnum::NUMBER_ZERO)
//            ->andWhere('s.published_time <= ?', date('Y-m-d H:i:s', time()))
//            ->andWhere('s.expiredate_time >= ?', date('Y-m-d H:i:s', time()))
//            ->andWhere('s.lang=?', sfContext::getInstance()->getUser()->getCulture())
//            ->where('c.slug=?', $slug)
//            ->orderBy('p.priority ASC')
//            ->limit($limit);
//        return $query->fetchArray();
    }

    //Lay danh sach tat ca chuyen muc con theo catid va chinh no
    public static function getListCategoryByParent($portalID,$type, $parent_id = null)
    {
        return self::getActiveCategoryQuery($portalID)
            ->select('c.id, c.name, c.slug, c.link')
            ->distinct()
            //->leftJoin('c.ArticleCategory a')
            ->andWhere('c.type=?', $type)
            ->andWhere(($parent_id != null || $parent_id != '') ? 'c.parent_id=?' : '(c.parent_id=? or c.parent_id is null)', $parent_id)
            ->orWhere('c.id=?', $parent_id)
            ->orderby('priority asc')
            ->execute();
    }
    //Lay category theo id, return array
    public static function getCateById($id)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->select('level,name')
            ->Where('id=?', $id);
        return $query->fetchArray();
    }

    public static function getCategoryByTypeClone($type,$portalId,$listChild)
    {
        $query = VtpCategoryTable::getInstance()->createQuery()
            ->select('name, parent_id, level, priority')
            ->where('type=?', $type)
            ->andWhere('portal_id=?',$portalId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->orderby('priority asc');
        if($listChild!=''){
            $query->andWhereNotIn('id',explode(',',$listChild));
        }
        $arrCat = $query->execute();
        $arrResult = array();
        $i18n = sfContext::getInstance()->getI18N();
        $arrResult[0] = $i18n->__('---Chọn chuyên mục---');
        foreach ($arrCat as $cat) {
            $strTab = '';
            if ($cat->level > 0) {
                for ($i = 0; $i < $cat->level; $i++) {
                    $strTab = $strTab . '...';
                }
            }
            $arrResult[$cat->id] = $strTab . htmlspecialchars($cat->name);
        }

        return $arrResult;
    }

    //get slug by di
    public static function getSlugById($id){
        return VtpCategoryTable::getInstance()->createQuery()
            ->select('slug')
            ->where('id=?',$id)
            ->fetchOne();
    }

    /*
     * Frontend end
     */
}