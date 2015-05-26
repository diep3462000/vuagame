<?php
/**
 * Created by JetBrains PhpStorm.
 * User: diepth2
 * Date: 5/28/14
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */
class vtManageChargAmountFormAdminFillter extends BaseVtChargAmountFormFilter
{

    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
        $this->setWidgets(array(
            'description'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'description'     => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('vt_charg_amount_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }
}