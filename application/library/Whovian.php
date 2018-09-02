<?php
/**
 * Created by PhpStorm.
 * User: szh
 * Date: 2018/6/29
 * Time: 上午11:26
 */
class Whovian
{
    protected $favoriteDoctor;

    public function __construct($favoriteDoctor)
    {
        $this->favoriteDoctor = (string)$favoriteDoctor;
    }

    public function say()
    {
        return 'The best doctor is '. $this->favoriteDoctor;
    }

    public function respondTo($input)
    {
        $input = strtolower($input);
        $myDoctor = strtolower($this->favoriteDoctor);

        if(strpos($input,$myDoctor) == false){
            throw new Exception(
                sprintf(
                    'No way! $s is the best doctor ever!',
                    $this->favoriteDoctor
                )
            );
        }
        return 'I agree!';
    }
}