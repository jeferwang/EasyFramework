<?php
namespace app\ctrl;

use core\easy;
use core\lib\model;

class indexCtrl extends easy {
	
	public function index() {
//		p('这里是index控制器的index方法');
//		$model = new model();
//		$sql = 'select * from c';
//		$res = $model->query($sql);
//		p($res->fetchAll());
		$this->display('/index/index.php',[
			'name'=>'wxj',
			'age'=>'20'
		]);
	}
	
	public function article() {
		p('这里是index控制器的article方法');
	}
}