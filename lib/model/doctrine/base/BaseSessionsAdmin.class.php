<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SessionsAdmin', 'doctrine');

/**
 * BaseSessionsAdmin
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $sess_id
 * @property string $sess_data
 * @property integer $sess_time
 * @property integer $sess_userid
 * 
 * @method string        getSessId()      Returns the current record's "sess_id" value
 * @method string        getSessData()    Returns the current record's "sess_data" value
 * @method integer       getSessTime()    Returns the current record's "sess_time" value
 * @method integer       getSessUserid()  Returns the current record's "sess_userid" value
 * @method SessionsAdmin setSessId()      Sets the current record's "sess_id" value
 * @method SessionsAdmin setSessData()    Sets the current record's "sess_data" value
 * @method SessionsAdmin setSessTime()    Sets the current record's "sess_time" value
 * @method SessionsAdmin setSessUserid()  Sets the current record's "sess_userid" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSessionsAdmin extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sessions_admin');
        $this->hasColumn('sess_id', 'string', 64, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('sess_data', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('sess_time', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('sess_userid', 'integer', 8, array(
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