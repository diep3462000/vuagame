<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('History', 'doctrine');

/**
 * BaseHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $cash
 * @property float $current_cash
 * @property string $description
 * @property integer $game_id
 * @property integer $trans_type
 * @property timestamp $time
 * @property integer $money
 * @property string $cp
 * @property string $title
 * @property integer $isxu
 * @property integer $cardtype
 * @property string $short_code
 * @property integer $status
 * @property string $telco
 * 
 * @method integer   getId()           Returns the current record's "id" value
 * @method integer   getUserId()       Returns the current record's "user_id" value
 * @method integer   getCash()         Returns the current record's "cash" value
 * @method float     getCurrentCash()  Returns the current record's "current_cash" value
 * @method string    getDescription()  Returns the current record's "description" value
 * @method integer   getGameId()       Returns the current record's "game_id" value
 * @method integer   getTransType()    Returns the current record's "trans_type" value
 * @method timestamp getTime()         Returns the current record's "time" value
 * @method integer   getMoney()        Returns the current record's "money" value
 * @method string    getCp()           Returns the current record's "cp" value
 * @method string    getTitle()        Returns the current record's "title" value
 * @method integer   getIsxu()         Returns the current record's "isxu" value
 * @method integer   getCardtype()     Returns the current record's "cardtype" value
 * @method string    getShortCode()    Returns the current record's "short_code" value
 * @method integer   getStatus()       Returns the current record's "status" value
 * @method string    getTelco()        Returns the current record's "telco" value
 * @method History   setId()           Sets the current record's "id" value
 * @method History   setUserId()       Sets the current record's "user_id" value
 * @method History   setCash()         Sets the current record's "cash" value
 * @method History   setCurrentCash()  Sets the current record's "current_cash" value
 * @method History   setDescription()  Sets the current record's "description" value
 * @method History   setGameId()       Sets the current record's "game_id" value
 * @method History   setTransType()    Sets the current record's "trans_type" value
 * @method History   setTime()         Sets the current record's "time" value
 * @method History   setMoney()        Sets the current record's "money" value
 * @method History   setCp()           Sets the current record's "cp" value
 * @method History   setTitle()        Sets the current record's "title" value
 * @method History   setIsxu()         Sets the current record's "isxu" value
 * @method History   setCardtype()     Sets the current record's "cardtype" value
 * @method History   setShortCode()    Sets the current record's "short_code" value
 * @method History   setStatus()       Sets the current record's "status" value
 * @method History   setTelco()        Sets the current record's "telco" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHistory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('history');
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
        $this->hasColumn('cash', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('current_cash', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('description', 'string', 6000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 6000,
             ));
        $this->hasColumn('game_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('trans_type', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('money', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cp', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('title', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('isxu', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cardtype', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('short_code', 'string', 4, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
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
        $this->hasColumn('telco', 'string', 5, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 5,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}