<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GameLog', 'doctrine');

/**
 * BaseGameLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $uniqueid
 * @property timestamp $time
 * 
 * @method integer   getId()       Returns the current record's "id" value
 * @method integer   getUniqueid() Returns the current record's "uniqueid" value
 * @method timestamp getTime()     Returns the current record's "time" value
 * @method GameLog   setId()       Sets the current record's "id" value
 * @method GameLog   setUniqueid() Sets the current record's "uniqueid" value
 * @method GameLog   setTime()     Sets the current record's "time" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGameLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('game_log');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('uniqueid', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('time', 'timestamp', 25, array(
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