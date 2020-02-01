<?php
use PHPUnit\Framework\TestCase;
use App\Library\DB;


class UserTest extends TestCase
{
    protected $user;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new App\Model\User;
        $this->user->user_id = 1;
        $this->user->username = "Terry";
        $this->user->password = sha1("123456");
        $this->user->email_addr = "terry@gmail.com";
        $this->user->is_active = true;

    }
    /**
     * Since we re-write the __set and __get magic method,
     *  We need to confirm those getter and setter can work normally.
     */
    public  function testGetID(){
        $this->assertEquals(1,$this->user->user_id);
    }
    public function testSetID(){
        $this->user->user_id = 100;
        $this->assertEquals(100,$this->user->user_id);
    }

    public function testGetName(){
        $this->assertEquals("Terry",$this->user->username);
    }

    public function testSetName(){
        $this->user->username = "Tom";
        $this->assertEquals("Tom",$this->user->username);
    }

    public function testGetPassword(){
        $this->assertEquals(sha1("123456"),$this->user->password);
    }

    public function testSetPassword(){
        $password = sha1("654321");
        $this->user->password = $password;
        $this->assertEquals($password,$this->user->password);
    }

    public function testGetEmail(){
        $this->assertEquals("terry@gmail.com",$this->user->email_addr);
    }

    public function testSetEmail(){
        $this->user->email_addr = "tom@gmail.com";
        $this->assertEquals("tom@gmail.com",$this->user->email_addr);
    }

    public function testUserIsActive(){
        $this->assertTrue($this->user->is_active);
    }


    public function test_User_If_Not_Active(){
        $this->user->is_active = false;
        $this->assertFalse($this->user->is_active);
    }

    public function testValidateEmailAddress_1(){
        $this->assertIsString(\App\Model\User::validateEmailAddress("terry@gmail.com"));
    }
    public function testValidateEmailAddress_2(){
        $this->assertIsString(\App\Model\User::validateEmailAddress("www.terry@gmail.com"));
    }

    public function testValidateEmailAddress_3(){
        $this->assertIsString(\App\Model\User::validateEmailAddress("terry@kamabc.org"));
    }

    public function testValidateEmailAddress_4(){
        $this->assertIsString(\App\Model\User::validateEmailAddress("terry_123@gmail.com"));
    }
    public function testUnValidateEmailAddress_1(){
        $this->assertFalse(\App\Model\User::validateEmailAddress("abcabc"));
    }
    public function testUnValidateEmailAddress_2(){
        $this->assertFalse(\App\Model\User::validateEmailAddress("terry@gmail"));
    }
    public function testUnValidateEmailAddress_3(){
        $this->assertFalse(\App\Model\User::validateEmailAddress("http://www.terry@gmail.com"));
    }
    public function testUnValidateEmailAddress_4(){
        $this->assertFalse(\App\Model\User::validateEmailAddress("$%^&*()@gmail.com"));
    }

    public function testValidateUsername_1(){
        $this->assertEquals(1,App\Model\User::validateUsername("PETER"));
    }

    public function testValidateUsername_2(){
        $this->assertEquals(1,App\Model\User::validateUsername("Terry12345"));
    }

    public function testValidateUsername_3(){
        $this->assertEquals(1,\App\Model\User::validateUsername("abcdefghijklmnopqrst"),
            "Check the string length less than 20");
    }

    public function testUnValidateUsername_1(){
        $this->assertEquals(FALSE,\App\Model\User::validateUsername("a"));
    }

    public function testUnValidateUsername_2(){
        $this->assertEquals(FALSE,\App\Model\User::validateUsername("Terry_Sam"));
    }

    public function testUnValidateUsername_3(){
        $this->assertEquals(FALSE,\App\Model\User::validateUsername("Terry_$%^&*_Ma"));
    }

    public function testUnValidateUsername_4(){
        $this->assertEquals(FALSE,\App\Model\User::validateUsername("abcdefghijklmnopqrstu"),
            "Check the string length more than 20");
    }

    public function testUserGetById_OK(){
        // Assume no user_id:2 in db
        $user = \App\Model\User::getById(1);
        $this->assertIsNotBool($user);
    }

    public function testUserGetById_Failure(){
        // Assume no user_id:2 in db
        $user = \App\Model\User::getById(2);
        $this->assertFalse($user);

    }

    public function testUserGetById_Check_ID(){
        $user = \App\Model\User::getById(1);
        $this->assertEquals(1,$user->user_id);
    }

    public function testUserGetById_Check_Userame(){
        $user = \App\Model\User::getById(1);
        $this->assertEquals('terry',$user->username);
    }

    public function testUserGetById_Check_password(){
        $user = \App\Model\User::getById(1);
        $this->assertEquals(sha1('123456'),$user->password);
    }

    public function testUserGetById_Check_email(){
        $user = \App\Model\User::getById(1);
        $this->assertEquals('terry@gmail.com',$user->email_addr);
    }

    public function testUserGetById_Check_IS_Active(){
        $user = \App\Model\User::getById(1);
        $this->assertFalse($user->is_active);
    }

    public function testUserGetByUserName_OK(){
        $user = \App\Model\User::getByUsername("terry");
        $this->assertIsNotBool($user);
    }

    public function testUserGetByUserName_Failure(){
        $user = \App\Model\User::getByUsername("Tom");
        $this->assertFalse($user);
    }

    public function testUserGetByUserName_Check_id(){
        $user = \App\Model\User::getByUsername('terry');
        $this->assertEquals(1,$user->user_id);
    }

    public function testUserGetByUserName_Check_Userame(){
        $user = \App\Model\User::getByUsername('terry');
        $this->assertEquals('terry',$user->username);
    }

    public function testUserGetByUserName_Check_password(){
        $user = \App\Model\User::getByUsername('terry');
        $this->assertEquals(sha1('123456'),$user->password);
    }

    public function testUserGetByUserName_Check_email(){
        $user = \App\Model\User::getByUsername('terry');
        $this->assertEquals('terry@gmail.com',$user->email_addr);
    }

    public function testUserGetByUserName_Check_IS_Active(){
        $user = \App\Model\User::getByUsername('terry');
        $this->assertFalse($user->is_active);
    }

    public function testSave()
    {
        $this->user->username = "Tom";
        $this->assertTrue($this->user->save());

        $user = \App\Model\User::getByUsername("Tom");
        $this->assertEquals($this->user->username,$user->username);

        $this->user->username = "terry";
        $this->assertTrue($this->user->save());
    }

//    function testSetActive(){
//        $this->user->setActive();
//    }


}
