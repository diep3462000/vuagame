<?php

require_once dirname(__FILE__).'/../lib/vtManageGameflashTypeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/vtManageGameflashTypeGeneratorHelper.class.php';

/**
 * vtManageGameflashType actions.
 *
 * @package    Vt_Portals
 * @subpackage vtManageGameflashType
 * @author     ngoctv1
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtManageGameflashTypeActions extends autoVtManageGameflashTypeActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $gameflash_type = $form->save();
                $slug=removeSignClass::removeSign($gameflash_type->name);
                if($slug==''){
                    $slug=VtHelper::generateString(5);
                }
                $objCat = count(GameflashTypeTable::checkSlug($slug,$gameflash_type->id));
                while ($objCat>0){
                    $slug=$slug.'_'.VtHelper::generateString(5);
                    $objCat = count(GameflashTypeTable::checkSlug($slug,$gameflash_type->id));
                }
                $gameflash_type->slug=$slug;
                $gameflash_type->save();
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $gameflash_type)));

            if ($request->hasParameter('_save_and_exit'))
            {
                $this->getUser()->setFlash('success', $notice);
                $this->redirect('@gameflash_type');
            } elseif ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('success', $notice.' You can add another one below.');

                $this->redirect('@gameflash_type_new');
            }
            else
            {
                $this->getUser()->setFlash('success', $notice);

                $this->redirect(array('sf_route' => 'gameflash_type_edit', 'sf_subject' => $gameflash_type));
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
