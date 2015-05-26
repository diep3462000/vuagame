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
class vtManageSerialCodeFormAdmin extends BaseVtSerialCodeForm
{
    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'amount_code'    => new sfWidgetFormInputText(),
            'charg_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'), 'add_empty' => false)),
            'end_date' => new sfWidgetFormVnDatePicker(array(),array('readonly'=>true)),
      'dai_ly_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'), 'add_empty' => false)),
            ));

        $this->setValidators(array(
            'amount_code'          => new sfValidatorInteger(array('required' => false, "min"=>1, 'max'=>1000,'trim' => true),array('min'=>$i18n->__('Thứ tự phải là số nguyên dương'),'max'=>$i18n->__('Tối đa 5 ký tự'),'invalid'=> $i18n->__('Thứ tự phải là số nguyên dương'))),
            'charg_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'))),
            'end_date'   => new sfValidatorDateTime(),
            'dai_ly_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'))),
      
            ));

        $this->widgetSchema->setNameFormat('vt_serial_code[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();



//        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
//
//        $this->setupInheritance();



    }

}
