<?php
require '../vendor/autoload.php';

define('APPLICATION_PATH', realpath(dirname(__FILE__).'/../'));

define('STORAGE_PATH',realpath(dirname(__FILE__).'/../storage'));

$application = new Yaf_Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
