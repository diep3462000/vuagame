<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Gameflash', 'doctrine');

/**
 * BaseGameflash
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $category
 * @property clob $description
 * @property boolean $state
 * @property string $flash
 * @property string $screen
 * @property integer $visit
 * @property GameflashType $GameflashType
 * 
 * @method integer       getId()            Returns the current record's "id" value
 * @method string        getName()          Returns the current record's "name" value
 * @method string        getCategory()      Returns the current record's "category" value
 * @method clob          getDescription()   Returns the current record's "description" value
 * @method boolean       getState()         Returns the current record's "state" value
 * @method string        getFlash()         Returns the current record's "flash" value
 * @method string        getScreen()        Returns the current record's "screen" value
 * @method integer       getVisit()         Returns the current record's "visit" value
 * @method GameflashType getGameflashType() Returns the current record's "GameflashType" value
 * @method Gameflash     setId()            Sets the current record's "id" value
 * @method Gameflash     setName()          Sets the current record's "name" value
 * @method Gameflash     setCategory()      Sets the current record's "category" value
 * @method Gameflash     setDescription()   Sets the current record's "description" value
 * @method Gameflash     setState()         Sets the current record's "state" value
 * @method Gameflash     setFlash()         Sets the current record's "flash" value
 * @method Gameflash     setScreen()        Sets the current record's "screen" value
 * @method Gameflash     setVisit()         Sets the current record's "visit" value
 * @method Gameflash     setGameflashType() Sets the current record's "GameflashType" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGameflash extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('gameflash');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 300, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 300,
             ));
        $this->hasColumn('category', 'string', 750, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 750,
             ));
        $this->hasColumn('description', 'clob', null, array(
             'type' => 'clob',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('state', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('flash', 'string', 3000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 3000,
             ));
        $this->hasColumn('screen', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('visit', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'default' => '00000',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('GameflashType', array(
             'local' => 'category',
             'foreign' => 'id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($sluggable0);
    }
}