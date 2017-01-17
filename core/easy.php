<?php
namespace core;

class easy {

//	已经被加载的类的列表
	public static $classMap = array();
	
	public static function run() {
//		启动框架
		p('ok');
//		未引入route.php的时候实例化
		$route = new \core\route();
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
}