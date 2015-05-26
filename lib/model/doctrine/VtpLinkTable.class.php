<?php

/**
 * VtpLinkTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtpLinkTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VtpLinkTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VtpLink');
    }

    public static function checkSlug($slug,$id)
    {
        $query=  VtpLinkTable::getInstance()->createQuery()
            ->select('slug')
            ->where('slug=?',$slug)
            ->andWhere('id<>?',$id);
        return $query;
    }

    // Lay danh sach link theo group_id
    public static function getLinkByGroupId($groupId,$limit,$portalId){
        $query=  VtpLinkTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('group_id=?',$groupId)
            ->andWhere('lang=?',  sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?',  $portalId)
            ->orderBy('priority')
            ->limit($limit);
        return $query->execute();
    }

    public static function getLinkByGroup($groupId,$limit, $portalId){
        $query=  VtpLinkTable::getInstance()->createQuery()
            ->select('name, link')
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('group_id=?',$groupId)
            ->andWhere('lang=?',  sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?',  $portalId)
            ->orderBy('priority')
            ->limit($limit);
        return $query->fetchArray();
    }

    // huync2: lay danh sach menu wap
    // Lay danh sach link theo group_id
    public static function getLinkByGroupIdWap($groupId, $limit, $portalId = VtCommonEnum::portalDefault)
    {
        $query = VtpLinkTable::getInstance()->createQuery()
            ->where('is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('group_id=?', $groupId)
            ->andWhere('lang=?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere('portal_id=?', $portalId)
            ->orderBy('priority');
        if ($limit)
            $query->limit($limit);
        return $query->execute();
    }
}