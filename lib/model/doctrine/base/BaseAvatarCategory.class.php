<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AvatarCategory', 'doctrine');

/**
 * BaseAvatarCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $category_name
 * 
 * @method integer        getId()            Returns the current record's "id" value
 * @method string         getCategoryName()  Returns the current record's "category_name" value
 * @method AvatarCategory setId()            Sets the current record's "id" value
 * @method AvatarCategory setCategoryName()  Sets the current record's "category_name" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAvatarCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('avatar_category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('category_name', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}