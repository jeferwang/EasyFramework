<?php
/*
 * 公共函数库
 */
//打印变量
function p($var) {
	echo "<pre style='position:relative;z-index: 9999;padding: 10px;border-radius: 5px;background: #f5f5f5;border: 1px solid #aaa;font-size: 14px;line-height: 18px;opacity:0.9;'>";
	if (is_bool($var)) {
		var_dump($var);
	} elseif (is_null($var)) {
		var_dump($var);
	} else {
		print_r($var);
	}
	echo "</pre>";
}

//打印变量并结束脚本
function pd($var) {
	p($var);
	exit('PHP脚本结束于pd打印函数');
	
}