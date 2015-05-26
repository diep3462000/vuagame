<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Clanmember', 'doctrine');

/**
 * BaseClanmember
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property timestamp $joindate
 * @property integer $role
 * @property integer $applystatus
 * @property integer $clanpoint
 * @property integer $clandonate
 * @property integer $clanid
 * 
 * @method integer    getId()          Returns the current record's "id" value
 * @method integer    getUserId()      Returns the current record's "user_id" value
 * @method timestamp  getJoindate()    Returns the current record's "joindate" value
 * @method integer    getRole()        Returns the current record's "role" value
 * @method integer    getApplystatus() Returns the current record's "applystatus" value
 * @method integer    getClanpoint()   Returns the current record's "clanpoint" value
 * @method integer    getClandonate()  Returns the current record's "clandonate" value
 * @method integer    getClanid()      Returns the current record's "clanid" value
 * @method Clanmember setId()          Sets the current record's "id" value
 * @method Clanmember setUserId()      Sets the current record's "user_id" value
 * @method Clanmember setJoindate()    Sets the current record's "joindate" value
 * @method Clanmember setRole()        Sets the current record's "role" value
 * @method Clanmember setApplystatus() Sets the current record's "applystatus" value
 * @method Clanmember setClanpoint()   Sets the current record's "clanpoint" value
 * @method Clanmember setClandonate()  Sets the current record's "clandonate" value
 * @method Clanmember setClanid()      Sets the current record's "clanid" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClanmember extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('clanmember');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('joindate', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('role', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('applystatus', 'integer', 2, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('clanpoint', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('clandonate', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('clanid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}