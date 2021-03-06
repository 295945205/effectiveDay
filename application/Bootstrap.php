<?php
/**
 * @name Bootstrap
 * @author vagrant
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
use Illuminate\Database\Capsule\Manager as Capsule;

class Bootstrap extends Yaf_Bootstrap_Abstract {

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $arrConfig);
    }

      public function _initPlugin(Yaf_Dispatcher $dispatcher) {
            //注册一个插件
            $objSamplePlugin = new SamplePlugin();
            $dispatcher->registerPlugin($objSamplePlugin);
      }

      public function _initRoute(Yaf_Dispatcher $dispatcher) {
    //		//在这里注册自己的路由协议,默认使用简单路由
          $router=$dispatcher->getRouter();
          $router->addConfig(Yaf_Registry::get("config")->routes);
      }

      public function _initView(Yaf_Dispatcher $dispatcher) {
            //在这里注册自己的view控制器，例如smarty,firekylin
      }

      public function _initLog()
      {
          Logger::init();
      }

    public function _initWhoops()
    {
        $whoops=new \Whoops\Run();
        $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
        $whoops->register();
    }

    public function _initComposer()
    {
        require_once "../".__DIR__.DIRECTORY_SEPARATOR.'vendor/autoload.php';
    }

    public function _initdatabase()
    {
        //初始化数据库
        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'effectiveDat',
            'username'  => 'root',
            'password'  => '13691132514',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
