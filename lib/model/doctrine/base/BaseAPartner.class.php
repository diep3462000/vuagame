<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('APartner', 'doctrine');

/**
 * BaseAPartner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $partnername
 * @property string $smsnumber
 * @property string $username
 * @property string $password
 * @property string $accesskey1
 * @property string $accesskey2
 * @property timestamp $datecreated
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method string    getPartnername() Returns the current record's "partnername" value
 * @method string    getSmsnumber()   Returns the current record's "smsnumber" value
 * @method string    getUsername()    Returns the current record's "username" value
 * @method string    getPassword()    Returns the current record's "password" value
 * @method string    getAccesskey1()  Returns the current record's "accesskey1" value
 * @method string    getAccesskey2()  Returns the current record's "accesskey2" value
 * @method timestamp getDatecreated() Returns the current record's "datecreated" value
 * @method APartner  setId()          Sets the current record's "id" value
 * @method APartner  setPartnername() Sets the current record's "partnername" value
 * @method APartner  setSmsnumber()   Sets the current record's "smsnumber" value
 * @method APartner  setUsername()    Sets the current record's "username" value
 * @method APartner  setPassword()    Sets the current record's "password" value
 * @method APartner  setAccesskey1()  Sets the current record's "accesskey1" value
 * @method APartner  setAccesskey2()  Sets the current record's "accesskey2" value
 * @method APartner  setDatecreated() Sets the current record's "datecreated" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAPartner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_partner');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('partnername', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('smsnumber', 'string', 4, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('username', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('accesskey1', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('accesskey2', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('datecreated', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}