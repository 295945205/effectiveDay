<?php
/**
 * Created by PhpStorm.
 * User: szh
 * Date: 2018/5/2
 * Time: 下午5:59
 */
class Test_Test {
    protected $a;

    public function __construct($a)
    {
        $this->a =$a;
    }

    public function geta()
    {
        return $this->a;
    }
}