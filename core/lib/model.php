<?php
namespace core\lib;

/*
 * 模型类
 */
class model extends \PDO {
	
	public function __construct() {
		$dsn = 'mysql:host=127.0.0.1;dbname=easy';
		$username = 'root';
		$password = 'root';
		try{
			parent::__construct($dsn, $username, $password);
		}catch (\PDOException $e){
			pd($e->getMessage());
		}
	}
}