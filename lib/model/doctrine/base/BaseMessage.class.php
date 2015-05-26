<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Message', 'doctrine');

/**
 * BaseMessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $parent_id
 * @property integer $from_user_id
 * @property integer $isnewcomment
 * @property integer $type_id
 * @property string $comment
 * @property timestamp $datetime
 * @property string $cp
 * 
 * @method integer   getId()           Returns the current record's "id" value
 * @method integer   getParentId()     Returns the current record's "parent_id" value
 * @method integer   getFromUserId()   Returns the current record's "from_user_id" value
 * @method integer   getIsnewcomment() Returns the current record's "isnewcomment" value
 * @method integer   getTypeId()       Returns the current record's "type_id" value
 * @method string    getComment()      Returns the current record's "comment" value
 * @method timestamp getDatetime()     Returns the current record's "datetime" value
 * @method string    getCp()           Returns the current record's "cp" value
 * @method Message   setId()           Sets the current record's "id" value
 * @method Message   setParentId()     Sets the current record's "parent_id" value
 * @method Message   setFromUserId()   Sets the current record's "from_user_id" value
 * @method Message   setIsnewcomment() Sets the current record's "isnewcomment" value
 * @method Message   setTypeId()       Sets the current record's "type_id" value
 * @method Message   setComment()      Sets the current record's "comment" value
 * @method Message   setDatetime()     Sets the current record's "datetime" value
 * @method Message   setCp()           Sets the current record's "cp" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMessage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('message');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('parent_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('from_user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('isnewcomment', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('type_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('comment', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
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
        $this->hasColumn('cp', 'string', 40, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 40,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}