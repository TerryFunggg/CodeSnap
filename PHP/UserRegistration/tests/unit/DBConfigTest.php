<?php
use PHPUnit\Framework\TestCase;

use App\Library\DB;
class DBConfigTest extends TestCase
{

    static private $db = null;
    public function testSettingFileExist()
    {
        $this->assertFileExists(__DIR__.'/../../setting.ini');
    }
    public function testSettingFileReadable()
    {
        $this->assertFileIsReadable(__DIR__.'/../../setting.ini');
    }


//    /**@after */
//    final public function getConnection(){
//        $db = new DB();
//
//    }
}