<?php
/**
 * Created by PhpStorm.
 * User: szh
 * Date: 2018/9/7
 * Time: 下午11:27
 */
class Account
{
    static $token ;

    public static function getToken()
    {
        self::$token=$_COOKIE['token'] ??'';
    }

    public static function verify()
    {
        self::getToken();
        $_token =
    }
}