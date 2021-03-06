<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Clanwall', 'doctrine');

/**
 * BaseClanwall
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clanid
 * @property integer $userid
 * @property string $message
 * @property timestamp $postdate
 * 
 * @method integer   getId()       Returns the current record's "id" value
 * @method integer   getClanid()   Returns the current record's "clanid" value
 * @method integer   getUserid()   Returns the current record's "userid" value
 * @method string    getMessage()  Returns the current record's "message" value
 * @method timestamp getPostdate() Returns the current record's "postdate" value
 * @method Clanwall  setId()       Sets the current record's "id" value
 * @method Clanwall  setClanid()   Sets the current record's "clanid" value
 * @method Clanwall  setUserid()   Sets the current record's "userid" value
 * @method Clanwall  setMessage()  Sets the current record's "message" value
 * @method Clanwall  setPostdate() Sets the current record's "postdate" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClanwall extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('clanwall');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('clanid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('userid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('message', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('postdate', 'timestamp', 25, array(
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