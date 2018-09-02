<?php
/**
 * Created by PhpStorm.
 * User: szh
 * Date: 2018/6/29
 * Time: 上午11:33
 */

class WhovianTest extends PHPUnit\Framework\TestCase
{
    public function testSetsDoctorWithConstructor()
    {
        $whovian = new Whovian('Peter Capaldi');
        $this->assertAttributeEquals('Peter Capaldi','favoriteDoctor',$whovian);
    }

    public function testSaysDoctorName()
    {
        $whovian = new Whovian('David Tennant');
        $this->assertEquals('The best doctor is David Tennant',$whovian->say());
    }

    public function testRespondToInAgreement()
    {
        $whovain = new Whovian('David Tennant');

        $opinion = 'David Tennant is the best doctor, period';
        $this->assertEquals('I agree!',$whovain->respondTo($opinion));
    }

    /**
     * @expectedException Exception
     */
    public function testRespondToDisagreement()
    {
        $whovain = new Whovian('David Tennant');

        $opinion = 'No way. Matt Smith was awesome';
        $whovain->respondTo($opinion);

    }
}