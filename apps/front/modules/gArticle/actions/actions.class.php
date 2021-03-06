<?php

/**
 * pageHome actions.
 *
 * @package    Vt_Portals
 * @subpackage pageHome
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gArticleActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $objArticle = VtpArticleTable::getInstance()->getlistArticle()->andWhere('a.slug=?', $request->getParameter('slug'))->fetchOne();
        if ($objArticle) {
            $this->objArticle = $objArticle;
        } else {
            echo "Không có dữ liệu";
            return sfView::NONE;
        }
    }
}
