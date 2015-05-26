<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vtManageChargAmountFormAdmin
 *
 * @author diepth2
 */
class vtManageChargAmountFormAdmin extends BaseVtChargAmountForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'id'               => new sfWidgetFormInputHidden(),
            'charg_amount'     => new sfWidgetFormInputText(),
            'description'      => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'charg_amount'     => new sfValidatorPass(),
            'description'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
        ));

        $this->validatorSchema->setPostValidator(
            new sfValidatorDoctrineUnique(array('model' => 'VtChargAmount', 'column' => array('charg_amount')))
        );

        $this->widgetSchema->setNameFormat('vt_charg_amount[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();



//        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
//
//        $this->setupInheritance();



    }

}
