<?php

/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 5/6/14
 * Time: 6:08 PM
 * To change this template use File | Settings | File Templates.
 */
class gArticleComponents extends sfComponents
{
    public function executeGArticle()
    {
        $objArticle = VtpArticleTable::getInstance()->getlistArticle()->limit(5)->execute();
        if ($objArticle) {
            $this->objArticle = $objArticle;
        } else {
            return sfView::NONE;
        }
    }
}
