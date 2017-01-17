<?php
namespace core\lib;
/*
 * 路由类
 * 实现拆分url中的控制器和方法,以及得到pathinfo传递的get参数
 */
class route {
	
	public $ctrl;   //控制器
	public $action; //方法
	
	public function __construct() {
		/*
		 * 隐藏index.php
		 * 获取url中对应的参数部分
		 * 返回对应的控制器和方法
		 */
		$pathinfo = $_SERVER['REQUEST_URI'];
		if (isset($pathinfo) && $pathinfo != '/') {
			$path = explode('/', trim($pathinfo, '/'));
			if (isset($path[0])) {
				$this->ctrl = $path[0];
				unset($path[0]);
			}
			if (isset($path[1])) {
				$this->action = $path[1];
				unset($path[1]);
			} else {
				$this->action = 'index';
			}
			$params = array_values($path);  //重置数组索引
			$get = array(); //存放pathinfo方式传递的get参数
			for ($i = 0; $i < count($params); $i += 2) {
				$get[$params[$i]] = isset($params[$i + 1]) ? $params[1] : null;
			}
		} else {
			$this->ctrl = 'index';
			$this->action = 'index';
		}
	}
}