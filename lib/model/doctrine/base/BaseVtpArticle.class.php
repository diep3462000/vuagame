<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VtpArticle', 'doctrine');

/**
 * BaseVtpArticle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $alttitle
 * @property string $header
 * @property string $body
 * @property string $body_wap
 * @property string $image_path
 * @property integer $attributes
 * @property integer $hit_count
 * @property integer $priority
 * @property timestamp $published_time
 * @property timestamp $expiredate_time
 * @property string $meta
 * @property string $keywords
 * @property string $author
 * @property string $other_link
 * @property integer $is_active
 * @property integer $is_hot
 * @property integer $is_delete
 * @property integer $delete_by
 * @property timestamp $delete_at
 * @property string $lang
 * @property string $slug
 * @property integer $category_id
 * @property integer $survey_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $portal_id
 * @property VtpCategory $VtpCategory
 * @property SfGuardUser $SfGuardUser
 * @property SfGuardUser $SfGuardUser_3
 * 
 * @method integer     getId()              Returns the current record's "id" value
 * @method string      getTitle()           Returns the current record's "title" value
 * @method string      getAlttitle()        Returns the current record's "alttitle" value
 * @method string      getHeader()          Returns the current record's "header" value
 * @method string      getBody()            Returns the current record's "body" value
 * @method string      getBodyWap()         Returns the current record's "body_wap" value
 * @method string      getImagePath()       Returns the current record's "image_path" value
 * @method integer     getAttributes()      Returns the current record's "attributes" value
 * @method integer     getHitCount()        Returns the current record's "hit_count" value
 * @method integer     getPriority()        Returns the current record's "priority" value
 * @method timestamp   getPublishedTime()   Returns the current record's "published_time" value
 * @method timestamp   getExpiredateTime()  Returns the current record's "expiredate_time" value
 * @method string      getMeta()            Returns the current record's "meta" value
 * @method string      getKeywords()        Returns the current record's "keywords" value
 * @method string      getAuthor()          Returns the current record's "author" value
 * @method string      getOtherLink()       Returns the current record's "other_link" value
 * @method integer     getIsActive()        Returns the current record's "is_active" value
 * @method integer     getIsHot()           Returns the current record's "is_hot" value
 * @method integer     getIsDelete()        Returns the current record's "is_delete" value
 * @method integer     getDeleteBy()        Returns the current record's "delete_by" value
 * @method timestamp   getDeleteAt()        Returns the current record's "delete_at" value
 * @method string      getLang()            Returns the current record's "lang" value
 * @method string      getSlug()            Returns the current record's "slug" value
 * @method integer     getCategoryId()      Returns the current record's "category_id" value
 * @method integer     getSurveyId()        Returns the current record's "survey_id" value
 * @method integer     getCreatedBy()       Returns the current record's "created_by" value
 * @method integer     getUpdatedBy()       Returns the current record's "updated_by" value
 * @method timestamp   getCreatedAt()       Returns the current record's "created_at" value
 * @method timestamp   getUpdatedAt()       Returns the current record's "updated_at" value
 * @method integer     getPortalId()        Returns the current record's "portal_id" value
 * @method VtpCategory getVtpCategory()     Returns the current record's "VtpCategory" value
 * @method SfGuardUser getSfGuardUser()     Returns the current record's "SfGuardUser" value
 * @method SfGuardUser getSfGuardUser3()    Returns the current record's "SfGuardUser_3" value
 * @method VtpArticle  setId()              Sets the current record's "id" value
 * @method VtpArticle  setTitle()           Sets the current record's "title" value
 * @method VtpArticle  setAlttitle()        Sets the current record's "alttitle" value
 * @method VtpArticle  setHeader()          Sets the current record's "header" value
 * @method VtpArticle  setBody()            Sets the current record's "body" value
 * @method VtpArticle  setBodyWap()         Sets the current record's "body_wap" value
 * @method VtpArticle  setImagePath()       Sets the current record's "image_path" value
 * @method VtpArticle  setAttributes()      Sets the current record's "attributes" value
 * @method VtpArticle  setHitCount()        Sets the current record's "hit_count" value
 * @method VtpArticle  setPriority()        Sets the current record's "priority" value
 * @method VtpArticle  setPublishedTime()   Sets the current record's "published_time" value
 * @method VtpArticle  setExpiredateTime()  Sets the current record's "expiredate_time" value
 * @method VtpArticle  setMeta()            Sets the current record's "meta" value
 * @method VtpArticle  setKeywords()        Sets the current record's "keywords" value
 * @method VtpArticle  setAuthor()          Sets the current record's "author" value
 * @method VtpArticle  setOtherLink()       Sets the current record's "other_link" value
 * @method VtpArticle  setIsActive()        Sets the current record's "is_active" value
 * @method VtpArticle  setIsHot()           Sets the current record's "is_hot" value
 * @method VtpArticle  setIsDelete()        Sets the current record's "is_delete" value
 * @method VtpArticle  setDeleteBy()        Sets the current record's "delete_by" value
 * @method VtpArticle  setDeleteAt()        Sets the current record's "delete_at" value
 * @method VtpArticle  setLang()            Sets the current record's "lang" value
 * @method VtpArticle  setSlug()            Sets the current record's "slug" value
 * @method VtpArticle  setCategoryId()      Sets the current record's "category_id" value
 * @method VtpArticle  setSurveyId()        Sets the current record's "survey_id" value
 * @method VtpArticle  setCreatedBy()       Sets the current record's "created_by" value
 * @method VtpArticle  setUpdatedBy()       Sets the current record's "updated_by" value
 * @method VtpArticle  setCreatedAt()       Sets the current record's "created_at" value
 * @method VtpArticle  setUpdatedAt()       Sets the current record's "updated_at" value
 * @method VtpArticle  setPortalId()        Sets the current record's "portal_id" value
 * @method VtpArticle  setVtpCategory()     Sets the current record's "VtpCategory" value
 * @method VtpArticle  setSfGuardUser()     Sets the current record's "SfGuardUser" value
 * @method VtpArticle  setSfGuardUser3()    Sets the current record's "SfGuardUser_3" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVtpArticle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('vtp_article');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('title', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('alttitle', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('header', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('body_wap', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('image_path', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('attributes', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('hit_count', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('priority', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('published_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('expiredate_time', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('meta', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('keywords', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('author', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('other_link', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('is_active', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('is_hot', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('is_delete', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('delete_by', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('delete_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('lang', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('category_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('survey_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('created_by', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('updated_by', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('portal_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('VtpCategory', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('SfGuardUser', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('SfGuardUser as SfGuardUser_3', array(
             'local' => 'updated_by',
             'foreign' => 'id'));
    }
}