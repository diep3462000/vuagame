<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VtUserSigninLock', 'doctrine');

/**
 * BaseVtUserSigninLock
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $user_name
 * @property integer $created_time
 * 
 * @method integer          getId()           Returns the current record's "id" value
 * @method string           getUserName()     Returns the current record's "user_name" value
 * @method integer          getCreatedTime()  Returns the current record's "created_time" value
 * @method VtUserSigninLock setId()           Sets the current record's "id" value
 * @method VtUserSigninLock setUserName()     Sets the current record's "user_name" value
 * @method VtUserSigninLock setCreatedTime()  Sets the current record's "created_time" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVtUserSigninLock extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('vt_user_signin_lock');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('user_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('created_time', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}