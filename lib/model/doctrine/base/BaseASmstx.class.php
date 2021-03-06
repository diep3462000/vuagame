<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ASmstx', 'doctrine');

/**
 * BaseASmstx
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $gameid
 * @property integer $status
 * @property integer $partnerid
 * @property string $txref
 * @property string $operatornumber
 * @property string $cmdcode
 * @property string $msisdn
 * @property string $mobody
 * @property string $targetuser
 * @property timestamp $receivedtime
 * @property string $mtbody
 * @property timestamp $responetime
 * 
 * @method integer   getId()             Returns the current record's "id" value
 * @method integer   getGameid()         Returns the current record's "gameid" value
 * @method integer   getStatus()         Returns the current record's "status" value
 * @method integer   getPartnerid()      Returns the current record's "partnerid" value
 * @method string    getTxref()          Returns the current record's "txref" value
 * @method string    getOperatornumber() Returns the current record's "operatornumber" value
 * @method string    getCmdcode()        Returns the current record's "cmdcode" value
 * @method string    getMsisdn()         Returns the current record's "msisdn" value
 * @method string    getMobody()         Returns the current record's "mobody" value
 * @method string    getTargetuser()     Returns the current record's "targetuser" value
 * @method timestamp getReceivedtime()   Returns the current record's "receivedtime" value
 * @method string    getMtbody()         Returns the current record's "mtbody" value
 * @method timestamp getResponetime()    Returns the current record's "responetime" value
 * @method ASmstx    setId()             Sets the current record's "id" value
 * @method ASmstx    setGameid()         Sets the current record's "gameid" value
 * @method ASmstx    setStatus()         Sets the current record's "status" value
 * @method ASmstx    setPartnerid()      Sets the current record's "partnerid" value
 * @method ASmstx    setTxref()          Sets the current record's "txref" value
 * @method ASmstx    setOperatornumber() Sets the current record's "operatornumber" value
 * @method ASmstx    setCmdcode()        Sets the current record's "cmdcode" value
 * @method ASmstx    setMsisdn()         Sets the current record's "msisdn" value
 * @method ASmstx    setMobody()         Sets the current record's "mobody" value
 * @method ASmstx    setTargetuser()     Sets the current record's "targetuser" value
 * @method ASmstx    setReceivedtime()   Sets the current record's "receivedtime" value
 * @method ASmstx    setMtbody()         Sets the current record's "mtbody" value
 * @method ASmstx    setResponetime()    Sets the current record's "responetime" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseASmstx extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_smstx');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('gameid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('partnerid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('txref', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('operatornumber', 'string', 4, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cmdcode', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('msisdn', 'string', 12, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 12,
             ));
        $this->hasColumn('mobody', 'string', 160, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 160,
             ));
        $this->hasColumn('targetuser', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('receivedtime', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('mtbody', 'string', 160, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 160,
             ));
        $this->hasColumn('responetime', 'timestamp', 25, array(
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