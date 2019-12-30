<?php
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{
    protected $user;
    protected function setUp():void
    {
        parent::setUp();
        $this->user = new \App\Module\User;
    }

    public function testUserIdCanBeSet(){
        $this->user->id = 1;
        $this->assertEquals($this->user->id , 1);
    }

    public function testUserNameCanBeSet(){
        $this->user->name = "Bill";
        $this->assertEquals($this->user->name , "Bill");
    }

    public function testUserPasswdCanBeSet()
    {
        $this->user->passwd = sha1("123456");
        $this->assertEquals($this->user->passwd , sha1("123456"));
    }

    public function testValidateEmail()
    {
        $this->assertEquals("abc@gmail.com",$this->user->vaildateEmail("abc@gmail.com"));
    }


    public function testInvalidateEmail()
    {
        $this->assertEquals(false,$this->user->vaildateEmail("abc.com"));
    }

    /** @test */
    public function check_user_name_is_vaildate()
    {
        $this->assertEquals(0,$this->user->vaildateUsername("Ssdsadsadsadsadsdsass"));
    }

    

}
