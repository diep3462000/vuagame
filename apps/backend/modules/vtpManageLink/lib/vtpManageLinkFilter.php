<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ngoctv1
 * Date: 4/24/14
 * Time: 2:01 PM
 * To change this template use File | Settings | File Templates.
 */
class vtpManageLinkFilter extends BaseVtpLinkFormFilter
{
    public function configure()
    {
        $this->setWidgets(array(
            'group_id'   => new sfWidgetFormChoice(array(
                'choices' => $this->getGroup(),
                'multiple' => false,
                'expanded' => false
            )),
        ));

        $this->setValidators(array(
            'group_id'   => new sfValidatorChoice(array(
                'required' => false,
                'choices' => array_keys($this->getGroup()),)),
        ));

        $this->widgetSchema->setNameFormat('vtp_link_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    }

    public function getGroup() {
        $i18n = sfContext::getInstance()->getI18N();
        $result=array();
        $result['']=$i18n->__('--Tất cả liên kết--');
        $pageAttr = Attributes::getAttributesList('link_group');
        foreach ($pageAttr as $key=>$value){
            $result[$key]=$value;
        }

        return $result;
    }

  public function addGroupIdColumnQuery(Doctrine_Query $query, $field, $values) {
       if ($values != ''){
         $query->andWhere("group_id = ?", $values);
       }
    }

}
