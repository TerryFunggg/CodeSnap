<?php
use PHPUnit\Framework\TestCase;
include __DIR__.'/../../app/Library/functions.php';

class FunctionTest extends TestCase
{
    function testRandomText(){
        $ran = random_text(10);
        $this->assertIsString($ran);
    }

    function testRandomTextWithoutSimilar(){
        $filter = ['0','1','2','5','8','B','I','O','Q','S','U','V','Z'];
        foreach ($filter as $value){
            $this->assertStringNotContainsString($value,random_text(random_int(10,100),true),
                "Test the random text isn't including some filter char ");
        }
    }
}