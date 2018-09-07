<?php
/**
 * Created by PhpStorm.
 * User: szh
 * Date: 2018/6/5
 * Time: 下午1:58
 */

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use \Monolog\Logger as MonologLogger;

/**
 * Logger.php
 *
 * @author: David
 * @date  : 2017-11-02 11:31
 * @method static info($message);
 * @method static debug($message);
 * @method static error($message);
 */
class Logger
{

    private static $log;

    public static function init()
    {
        self::$log = new MonologLogger('s');

        $formate = new LineFormatter(null, null, true, true);
        $date    = date('Y-m-d');

        $transport = Swift_SmtpTransport::newInstance('smtp.qq.com',465,'ssl')->setUsername('295945205@qq.com')
            ->setPassword('jbcmolklgnrncbci');
        $mailer    = Swift_Mailer::newInstance($transport);
        $message   = Swift_Message::newInstance()->setSubject('EffectiveDay error!')
            ->setFrom(array('295945205@qq.com' => 'David'))
            ->setTo(array('295945205@qq.com' => 'szh'));

        self::$log->setHandlers([
            (new StreamHandler(self::getLogPath() . "error" . "{$date}" . 'log', MonologLogger::ERROR, true))->setFormatter($formate),
            (new \Monolog\Handler\SwiftMailerHandler($mailer,$message,MonologLogger::ERROR,false)),
            (new StreamHandler(self::getLogPath() . "info" . "{$date}" . 'log', MonologLogger::INFO, false))->setFormatter($formate),
            (new StreamHandler(self::getLogPath() . "debug" . "{$date}" . 'log', MonologLogger::DEBUG, false))->setFormatter($formate),
        ]);
    }

    public static function write($level, $message)
    {
        if (!is_string($message)) {
            $message = json_encode($message);
        }

        return self::$log->$level($message);
    }

    public static function getLogPath()
    {
        return STORAGE_PATH . '/logs/';
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func('static::write', $name, ...$arguments);
    }
}
