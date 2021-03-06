<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdminPermission', 'doctrine');

/**
 * BaseAdminPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $per_id
 * @property integer $id
 * @property string $per_class
 * @property string $per_action
 * 
 * @method integer         getPerId()      Returns the current record's "per_id" value
 * @method integer         getId()         Returns the current record's "id" value
 * @method string          getPerClass()   Returns the current record's "per_class" value
 * @method string          getPerAction()  Returns the current record's "per_action" value
 * @method AdminPermission setPerId()      Sets the current record's "per_id" value
 * @method AdminPermission setId()         Sets the current record's "id" value
 * @method AdminPermission setPerClass()   Sets the current record's "per_class" value
 * @method AdminPermission setPerAction()  Sets the current record's "per_action" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdminPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('admin_permission');
        $this->hasColumn('per_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('per_class', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('per_action', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}