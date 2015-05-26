<?php

/**
 * BaseGUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property bigint $user_id
 * @property bigint $avatar_id
 * @property int $level_id
 * @property int $isOnline
 * @property int $isMobile
 * @property string $ip
 * @property string $device
 * @property string $screen
 * @property int $currentGame
 * @property int $exp
 * @property string $avatar
 * @property bigint $gameCash
 * @property string $username
 * @property bigint $totalGame
 * @property bigint $totalWin
 * @property int $playing_game
 * @property int $is_block
 * @property timestamp $start_playing_time
 * @property string $cp
 * @property int $gift_times
 * @property Level $Level
 * 
 * @method bigint    getUserId()             Returns the current record's "user_id" value
 * @method bigint    getAvatarId()           Returns the current record's "avatar_id" value
 * @method int       getLevelId()            Returns the current record's "level_id" value
 * @method int       getIsOnline()           Returns the current record's "isOnline" value
 * @method int       getIsMobile()           Returns the current record's "isMobile" value
 * @method string    getIp()                 Returns the current record's "ip" value
 * @method string    getDevice()             Returns the current record's "device" value
 * @method string    getScreen()             Returns the current record's "screen" value
 * @method int       getCurrentGame()        Returns the current record's "currentGame" value
 * @method int       getExp()                Returns the current record's "exp" value
 * @method string    getAvatar()             Returns the current record's "avatar" value
 * @method bigint    getGameCash()           Returns the current record's "gameCash" value
 * @method string    getUsername()           Returns the current record's "username" value
 * @method bigint    getTotalGame()          Returns the current record's "totalGame" value
 * @method bigint    getTotalWin()           Returns the current record's "totalWin" value
 * @method int       getPlayingGame()        Returns the current record's "playing_game" value
 * @method int       getIsBlock()            Returns the current record's "is_block" value
 * @method timestamp getStartPlayingTime()   Returns the current record's "start_playing_time" value
 * @method string    getCp()                 Returns the current record's "cp" value
 * @method int       getGiftTimes()          Returns the current record's "gift_times" value
 * @method Level     getLevel()              Returns the current record's "Level" value
 * @method GUser     setUserId()             Sets the current record's "user_id" value
 * @method GUser     setAvatarId()           Sets the current record's "avatar_id" value
 * @method GUser     setLevelId()            Sets the current record's "level_id" value
 * @method GUser     setIsOnline()           Sets the current record's "isOnline" value
 * @method GUser     setIsMobile()           Sets the current record's "isMobile" value
 * @method GUser     setIp()                 Sets the current record's "ip" value
 * @method GUser     setDevice()             Sets the current record's "device" value
 * @method GUser     setScreen()             Sets the current record's "screen" value
 * @method GUser     setCurrentGame()        Sets the current record's "currentGame" value
 * @method GUser     setExp()                Sets the current record's "exp" value
 * @method GUser     setAvatar()             Sets the current record's "avatar" value
 * @method GUser     setGameCash()           Sets the current record's "gameCash" value
 * @method GUser     setUsername()           Sets the current record's "username" value
 * @method GUser     setTotalGame()          Sets the current record's "totalGame" value
 * @method GUser     setTotalWin()           Sets the current record's "totalWin" value
 * @method GUser     setPlayingGame()        Sets the current record's "playing_game" value
 * @method GUser     setIsBlock()            Sets the current record's "is_block" value
 * @method GUser     setStartPlayingTime()   Sets the current record's "start_playing_time" value
 * @method GUser     setCp()                 Sets the current record's "cp" value
 * @method GUser     setGiftTimes()          Sets the current record's "gift_times" value
 * @method GUser     setLevel()              Sets the current record's "Level" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('g_user');
        $this->hasColumn('user_id', 'bigint', 11, array(
             'type' => 'bigint',
             'primary' => true,
             'autoincrement' => true,
             'unique' => true,
             'comment' => '',
             'length' => 11,
             ));
        $this->hasColumn('avatar_id', 'bigint', 11, array(
             'type' => 'bigint',
             'comment' => 'Id avatar',
             'length' => 11,
             ));
        $this->hasColumn('level_id', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 1,
             'length' => 11,
             ));
        $this->hasColumn('isOnline', 'int', null, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('isMobile', 'int', null, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('ip', 'string', 30, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Ip người dùng',
             'length' => 30,
             ));
        $this->hasColumn('device', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('screen', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('currentGame', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('exp', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('avatar', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('gameCash', 'bigint', 200, array(
             'type' => 'bigint',
             'length' => 200,
             ));
        $this->hasColumn('username', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('totalGame', 'bigint', 10, array(
             'type' => 'bigint',
             'length' => 10,
             ));
        $this->hasColumn('totalWin', 'bigint', 10, array(
             'type' => 'bigint',
             'length' => 10,
             ));
        $this->hasColumn('playing_game', 'int', 3, array(
             'type' => 'int',
             'length' => 3,
             ));
        $this->hasColumn('is_block', 'int', 11, array(
             'type' => 'int',
             'length' => 11,
             ));
        $this->hasColumn('start_playing_time', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('cp', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('gift_times', 'int', 3, array(
             'type' => 'int',
             'length' => 3,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Level', array(
             'local' => 'level_id',
             'foreign' => 'id'));
    }
}