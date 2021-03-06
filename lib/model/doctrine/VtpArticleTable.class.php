<?php

/**
 * VtpArticleTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VtpArticleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VtpArticleTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VtpArticle');
    }

    public function getlistArticle()
    {
        return $query = $this->createQuery('a')
            ->where('a.is_active=?', VtCommonEnum::NUMBER_TWO)
            ->andWhere('a.is_delete=?', VtCommonEnum::NUMBER_ZERO)
            ->andWhere('a.published_time <= ?', date('Y-m-d H:i:s', time()))
            ->andWhere('(a.expiredate_time is null or a.expiredate_time >= ?)', date('Y-m-d H:i:s', time()));
    }
}