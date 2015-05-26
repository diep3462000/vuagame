<?php

/**
 * sfGuardUser filter form.
 *
 * @package    radio_ivr
 * @subpackage filter
 * @author     loilv4
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vtManageSerialCodeFormAdminFilter extends BaseVtSerialCodeFormFilter
{

    public function configure()
    {
        $i18n = sfContext::getInstance()->getI18N();
            $this->setWidgets(array(
          'serial'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
          'cardnumber' => new sfWidgetFormFilterInput(array('with_empty' => false)),
          'user_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
          'charg_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtChargAmount'), 'add_empty' => true)),
          'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
          'is_status'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
          'end_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
          'dai_ly_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VtDaiLy'), 'add_empty' => 'Tất cả')),
          'admin_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUser'), 'add_empty' => true)),
          'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
          'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
        ));

        $this->setValidators(array(
          'serial'     => new sfValidatorPass(array('required' => false)),
          'cardnumber' => new sfValidatorPass(array('required' => false)),
          'user_id'    => new sfValidatorPass(array('required' => false)),
          'charg_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtChargAmount'), 'column' => 'id')),
          'type'       => new sfValidatorPass(array('required' => false)),
          'is_status'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
          'end_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
          'dai_ly_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VtDaiLy'), 'column' => 'id')),
          'admin_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUser'), 'column' => 'id')),
          'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
          'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
        ));
        $this->widgetSchema->setNameFormat('vt_serial_code_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();
    }
    public function doBuildQuery(array $values)
    {
        $query = parent::doBuildQuery($values);
        $alias = $query->getRootAlias();
        $publisher_id = sfContext::getInstance()->getRequest()->getParameter('default_publisher_id');

        if (array_key_exists('created_at', $values)) {
            $text = trim($values['created_at']['text']);
            $dateArr = explode('-', $text);
            if (count($dateArr) == 2) {
                $date1 = trim($dateArr[0]);
                $date1Arr = explode('/', $date1);
                $date1Str = '';
                if (count($date1Arr) == 3) {
                    $date1Str = $date1Arr[2] . '-' . $date1Arr[1] . '-' . $date1Arr[0] . ' 00:00:00';
                }
                $date2 = trim($dateArr[1]);
                $date2Arr = explode('/', $date2);
                $date2Str = '';
                if (count($date2Arr) == 3) {
                    $date2Str = $date2Arr[2] . '-' . $date2Arr[1] . '-' . $date2Arr[0] . ' 23:59:59';
                }
                $query->andWhere('a.created_at BETWEEN ? AND ?', array($date1Str, $date2Str));
            }
        }
        $query->select($alias. ".*, a.charg_amount as charg_amount, d.name as daily_name, u.username as username");
        $query->leftJoin($alias . '.VtChargAmount a');
        $query->leftJoin($alias . '.VtDaiLy d');
        $query->leftJoin($alias . '.SfGuardUser u');



        if(array_key_exists('publisher_name', $values) && $values['publisher_name']["text"] || $publisher_id){
            $publisher_id =  isset($values['publisher_name']['text'])? $values['publisher_name']['text']:  $publisher_id;
            $query->andWhere('lower(p.username) LIKE ?  OR p.id = ? ',  array('%' . VtHelper::translateQuery($publisher_id) . '%', $publisher_id ));
        }
        if(array_key_exists('app_name', $values)){
            $query->andWhere('lower(a.app_name) LIKE ? OR a.id = ?', array('%' . VtHelper::translateQuery($values['app_name']['text']) . '%', $values['app_name']['text']));
        }
        if(array_key_exists('is_status', $values) && isset($values['is_status'])){
            $query->andWhere('a.is_status = ? ', $values['is_status']);
        }
        $query->orderBy('d.id desc');
        return $query;
    }
    public function checkValidator($validator, $values)
    {
        $i18n = sfContext::getInstance()->getI18N();
        $arrayError = array();
        if ($values['app_name']['text'] != null) {
            if (strlen($values['app_name']['text']) > 50) {
                $arrayError['app_name'] = new sfValidatorError($validator, $i18n->__('Độ dài phải nhỏ hơn 50 ký tự'));
            }
        }
        if ($arrayError)
            throw new sfValidatorErrorSchema($validator, $arrayError);
        return $values;
    }

    /**
     * Loc theo ten dang nhap
     * @author Huynt74
     * @created on 22/01/2013
     * @param $query
     * @param $value
     */
}
