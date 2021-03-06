<?php

/**
 * VtpAdvertiseTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtpAdvertiseTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VtpAdvertiseTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VtpAdvertise');
    }

    public static function getAdvertiseById($id)
    {
        return VtpAdvertiseTable::getInstance()->createQuery()
            ->select('id,name')
            ->where('id=?', $id)
            ->fetchOne();
    }

    public static function getListAdvertist($portalId)
    {
        return VtpAdvertiseTable::getInstance()->createQuery('a')
            ->select('a.name')
            ->where('a.is_active=?', VtCommonEnum::NUMBER_ONE)
            ->andWhere('a.portal_id=?',$portalId)
            ->orderBy('a.name asc')
            ->execute();
    }

    public static function getActiveAdvertise()
    {
        return VtpAdvertiseTable::getInstance()->createQuery('a')
            ->where('a.is_active=?', VtCommonEnum::NUMBER_ONE);
    }

    /**
     * Ngoctv hàm lấy ra banner
     * @static
     * @param $page
     * @param $template
     * @return array
     */
    public static function getAdvertise($page, $template,$portalId)
    {
        return self::getActiveAdvertise()
            ->select('i.file_path, a.view_type, a.height, a.width, a.name, a.description, i.link')
            ->innerJoin('a.AdvertiseImage i')
            ->innerJoin('a.AdvertiseLocation l')
            ->andWhere('l.page=?', $page)
            ->andWhere('l.template=?', $template)
            ->andWhere('l.portal_id=?', $portalId)
            ->andWhere('a.portal_id=?', $portalId)
            ->andWhere('i.is_active=1')
            ->fetchArray();
    }

}