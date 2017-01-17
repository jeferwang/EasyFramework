<?php
/*
 * 框架入口文件
 * 1,定义常量
 * 2,加载函数库
 * 3,启动框架
 */
//框架目录
define('EASY', realpath('./'));
//核心文件目录
define('CORE', EASY . '/core');
//项目文件目录
define('APP', EASY . '/app');
//是否开启调试模式
define('DEBUG', true);
if (DEBUG) {
	ini_set('display_errors', 'On');
} else {
	ini_set('display_errors', 'Off');
}
//加载函数库
include CORE . '/common/function.php';
//加载框架的核心文件
include CORE . '/easy.php';
//当实例化的类不存在的时候,自动触发的方法
spl_autoload_register('\core\easy::load');
//启动框架
\core\easy::run();