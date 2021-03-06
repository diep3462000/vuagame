<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AdminRole', 'doctrine');

/**
 * BaseAdminRole
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $full
 * @property integer $level
 * 
 * @method integer   getId()     Returns the current record's "id" value
 * @method string    getName()   Returns the current record's "name" value
 * @method integer   getStatus() Returns the current record's "status" value
 * @method integer   getFull()   Returns the current record's "full" value
 * @method integer   getLevel()  Returns the current record's "level" value
 * @method AdminRole setId()     Sets the current record's "id" value
 * @method AdminRole setName()   Sets the current record's "name" value
 * @method AdminRole setStatus() Sets the current record's "status" value
 * @method AdminRole setFull()   Sets the current record's "full" value
 * @method AdminRole setLevel()  Sets the current record's "level" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdminRole extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('admin_role');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('full', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('level', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}