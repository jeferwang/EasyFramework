<?php
namespace core;

class easy {

//	已经被加载的类的列表
	public static $classMap = array();
//	display传参
	public $params;

//	框架的启动方法
	public static function run() {
		//启动框架
		$route = new \core\lib\route(); //route类是自动加载的
		$ctrlName = $route->ctrl;    //控制器类名
		$action = $route->action; //方法名
		$ctrlFile = APP . '/ctrl/' . $ctrlName . 'Ctrl.php';
		if (is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrlClass = '\\' . MODULE . '\ctrl\\' . $ctrlName . 'Ctrl';
			$ctrlObj = new $ctrlClass(); //实例化控制器
			if (in_array($action, get_class_methods($ctrlObj))) {
				$ctrlObj->$action();
			} else {
				exit('找不到方法' . $action);
			}
		} else {
			exit('找不到控制器' . $ctrlName);
		}
	}
	
	public static function load($class) {
//		自动加载类库
//		$class参数是需要加载的类的命名空间+类名,转化反斜线为正斜线
		$class = str_replace('\\', '/', $class);
//		在自动引入之前,先判断是否已经引入
		if (isset($classMap[$class])) {
			return true;
		} else {
			$file = EASY . '/' . $class . '.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
				return true;
			} else {
				return false;
			}
		}
		
	}
	
	public function display($file, $params = null) {
//		传递参数
		if (is_array($params)) {
			$this->params = extract($params);;
		} elseif (!is_null($params)) {
			pd('display传参格式错误！');
		}
//		渲染视图
		$file = APP . '/views/' . $file;
		if (is_file($file)) {
			include $file;
		} else {
			pd('视图文件无效' . $file);
		}
	}
}