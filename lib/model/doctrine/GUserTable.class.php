<?php

/**
 * GUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GUserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('GUser');
    }

    public static function getUserByUsername($username)
    {
        return GUserTable::getInstance()->createQuery('a')
            ->select('a.*, l.name as name_level')
            ->where('a.username=?', $username)
            ->leftJoin('a.Level l')

            ->fetchOne();
    }


    public static function getListCaoThu()
    {
        return GUserTable::getInstance()->createQuery('a')
            ->select('a.*, l.name as name_level')
            ->leftJoin('a.Level l')
            ->orderBy('a.level_id desc')
            ->limit(10)
            ->fetchArray();
    }
    public static function getListDaiGia()
    {
        return GUserTable::getInstance()->createQuery('a')
            ->select('a.*, l.name as name_level')
            ->leftJoin('a.Level l')
            ->orderBy('a.gameCash desc')
            ->limit(10)
            ->fetchArray();
    }
    public static function getListBangHoi()
    {
        return GUserTable::getInstance()->createQuery('a')
            ->select('a.*, l.name as name_level')
            ->leftJoin('a.Level l')
            ->orderBy('a.level_id desc')
            ->limit(10)
            ->fetchArray();
    }


}