<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Friend', 'doctrine');

/**
 * BaseFriend
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user1_id
 * @property integer $user2_id
 * @property timestamp $datetime
 * 
 * @method integer   getId()       Returns the current record's "id" value
 * @method integer   getUser1Id()  Returns the current record's "user1_id" value
 * @method integer   getUser2Id()  Returns the current record's "user2_id" value
 * @method timestamp getDatetime() Returns the current record's "datetime" value
 * @method Friend    setId()       Sets the current record's "id" value
 * @method Friend    setUser1Id()  Sets the current record's "user1_id" value
 * @method Friend    setUser2Id()  Sets the current record's "user2_id" value
 * @method Friend    setDatetime() Sets the current record's "datetime" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFriend extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('friend');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user1_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('user2_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('datetime', 'timestamp', 25, array(
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