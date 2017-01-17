<?php
/*
 * 公共函数库
 */
//自定义的增强print_r函数
function new_print($var) {
	if (is_bool($var)) {
		var_dump($var);
	} elseif (is_null($var)) {
		var_dump($var);
	} else {
		print_r($var);
	}
}

//打印变量
function p($var) {
	echo "<pre style='position:relative;z-index: 9999;padding: 10px;border-radius: 5px;background: #BFEFFF;border: 1px solid #aaa;font-size: 14px;line-height: 18px;opacity:0.9;'>";
	new_print($var);
	echo "</pre>";
}

//打印变量并结束脚本
function pd($var) {
	echo "<pre style='position:relative;z-index: 9999;padding: 10px;border-radius: 5px;background: #EEA9B8;border: 1px solid #aaa;font-size: 14px;line-height: 18px;opacity:0.9;'>";
	new_print($var);
	echo "</pre>";
	exit();
	
}