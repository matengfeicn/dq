<?php
class IndexAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	/*
	 *
	 * +----------+--------------+------+-----+---------+----------------+
	 * | Field    | Type         | Null | Key | Default | Extra          |
	 * +----------+--------------+------+-----+---------+----------------+
	 * | id       | int(32)      | NO   | PRI | NULL    | auto_increment |
	 * | type     | int(32)      | YES  |     | 0       |                |
	 * | alcohol  | varchar(32)  | YES  |     | 0       |                |
	 * | level    | varchar(32)  | YES  |     | 0       |                |
	 * | tempera  | varchar(32)  | YES  |     | NULL    |                |
	 * | price    | varchar(32)  | YES  |     | NULL    |                |
	 * | url      | varchar(256) | YES  |     | NULL    |                |
	 * | link     | varchar(128) | YES  |     | NULL    |                |
	 * | location | varchar(32)  | YES  |     | NULL    |                |
	 * | content  | mediumtext   | YES  |     | NULL    |                |
	 * | uname    | varchar(32)  | YES  |     | NULL    |                |
	 * | creattime  | varchar(32)  | YES  |     | NULL    |                |
	 * | changetime | varchar(32)  | YES  |     | NULL    |                |
	 * | total    | varchar(32)  | YES  |     | NULL    |                |
	 * +----------+--------------+------+-----+---------+----------------+
	 */
	public function getPageList(){
		$rs=M("liquor")->order('creattime desc')->limit(20)->select();
		$this->assign("data",$rs);
		$this->display("pageList");
	}

	public function  add(){
		$data['type']=1;
		$data['alcohol']=2;
		$data['level']=3;
		$data['tempera']=4;
		$data['price']=5;
		$data['url']="http://email.163.com";
		$data['link']="http://www.baidu.com";
		$data['location']='biejing';
		$data['content']='213213';
		$data['uname']=1;
		$data['creattime']=time();
		$data['changetime']=time();
		$data['total']=100;
		for($i=0;$i<30;$i++){
		$rs=M("liquor")->add($data);
		}
		var_dump($rs);
	}
	


   

}
