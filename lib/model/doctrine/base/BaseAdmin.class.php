<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Admin', 'doctrine');

/**
 * BaseAdmin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $cp
 * @property integer $roleid
 * @property integer $is_active
 * 
 * @method integer getId()        Returns the current record's "id" value
 * @method string  getUsername()  Returns the current record's "username" value
 * @method string  getPassword()  Returns the current record's "password" value
 * @method string  getName()      Returns the current record's "name" value
 * @method string  getCp()        Returns the current record's "cp" value
 * @method integer getRoleid()    Returns the current record's "roleid" value
 * @method integer getIsActive()  Returns the current record's "is_active" value
 * @method Admin   setId()        Sets the current record's "id" value
 * @method Admin   setUsername()  Sets the current record's "username" value
 * @method Admin   setPassword()  Sets the current record's "password" value
 * @method Admin   setName()      Sets the current record's "name" value
 * @method Admin   setCp()        Sets the current record's "cp" value
 * @method Admin   setRoleid()    Sets the current record's "roleid" value
 * @method Admin   setIsActive()  Sets the current record's "is_active" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAdmin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('admin');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('cp', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('roleid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('is_active', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}