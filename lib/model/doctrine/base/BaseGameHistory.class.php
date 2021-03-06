<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('GameHistory', 'doctrine');

/**
 * BaseGameHistory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property float $money_trans
 * @property float $current_money
 * @property string $description
 * @property integer $game_id
 * @property integer $trans_type
 * @property timestamp $time
 * 
 * @method integer     getId()            Returns the current record's "id" value
 * @method integer     getUserId()        Returns the current record's "user_id" value
 * @method float       getMoneyTrans()    Returns the current record's "money_trans" value
 * @method float       getCurrentMoney()  Returns the current record's "current_money" value
 * @method string      getDescription()   Returns the current record's "description" value
 * @method integer     getGameId()        Returns the current record's "game_id" value
 * @method integer     getTransType()     Returns the current record's "trans_type" value
 * @method timestamp   getTime()          Returns the current record's "time" value
 * @method GameHistory setId()            Sets the current record's "id" value
 * @method GameHistory setUserId()        Sets the current record's "user_id" value
 * @method GameHistory setMoneyTrans()    Sets the current record's "money_trans" value
 * @method GameHistory setCurrentMoney()  Sets the current record's "current_money" value
 * @method GameHistory setDescription()   Sets the current record's "description" value
 * @method GameHistory setGameId()        Sets the current record's "game_id" value
 * @method GameHistory setTransType()     Sets the current record's "trans_type" value
 * @method GameHistory setTime()          Sets the current record's "time" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGameHistory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('game_history');
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
        $this->hasColumn('money_trans', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('current_money', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('description', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('game_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
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
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}