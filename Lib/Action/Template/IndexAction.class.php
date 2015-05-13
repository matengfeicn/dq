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


	public function pc(){
		$id=I("get.id");
		$res=M("liquor")->where("id='$id'")->find();
	}
	public function phone(){
		$id=I("get.id");
		$res=M("item")->where("id='$id'")->find();
		$image_url_arr=split(",",$res['image_url']);
		$table_id=$res['table_id'];
		$table=M("table_item")->where("id=$table_id")->find();


		$res['content']=htmlspecialchars_decode($res['content']);
		eval('$item_table_content='.$res['table_content'].';');
		if($table!==null)
			eval('$table_content='.$table['content'].';');
		$array=array();
		for($i=0;$i<count($item_table_content);$i++){
			$array[$table_content[$i]]=$item_table_content[$i];
		}

		$this->table_info=$array;
		$this->assign("data",$res);
		$this->assign("image_url",$image_url_arr);
		$this->display("item_detail");
		//$this->display("phone_template");
	}
	public function create(){
		$id=I("get.id");
		$res=M("item")->where("id='$id'")->find();
		$image_url_arr=split(",",$res['image_url']);
		$table_id=$res['table_id'];
		$table=M("table_item")->where("id=$table_id")->find();


		eval('$item_table_content='.$res['table_content'].';');
		if(!empty($table))
			eval('$table_content='.$table['content'].';');
		$array=array();
		for($i=0;$i<count($item_table_content);$i++){
			$array[$table_content[$i]]=$item_table_content[$i];
		}

		$res['content']=htmlspecialchars_decode($res['content']);
		$this->table_info=$array;
		$this->assign("data",$res);
		$this->assign("image_url",$image_url_arr);




		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$date=date("Ymd",time());
		$url=$document_root."/html/".$date;
		if(!is_dir($url)){
			mkdir($url,0777);
		}




		$web_url="http://".$_SERVER['SERVER_NAME']."/html/".$date;;
		$after="/".md5($res['title'])."_".$id."_".rand(1,100).".html";
		if(!empty($res['link'])){
			$url=$res['link'];
			$web_url=$res['web_url'];
		}
		else {
			$url=$url.$after;
			$web_url=$web_url.$after;
		}



		$content=$this->fetch("item_detail");

		$res=file_put_contents($url,$content);
		if($res){

			M("item")->where("id='$id'")->save(array("link"=>$url,"status"=>2,"web_url"=>$web_url));
			$this->success("生成成功");
		}
		else{
			$this->error("生成失败");
		}
		exit;




	}
	public function create_page(){
		$id=I("get.id");
		$res=M("item")->where("id='$id'")->find();
		$image_url_arr=split(",",$res['image_url']);
		$table_id=$res['table_id'];
		$table=M("table_item")->where("id=$table_id")->find();



		$res['content']=htmlspecialchars_decode($res['content']);
		eval('$item_table_content='.$res['table_content'].';');
		eval('$table_content='.$table['content'].';');
		$array=array();
		for($i=0;$i<count($item_table_content);$i++){
			$array[$table_content[$i]]=$item_table_content[$i];
		}

		$this->table_info=$array;
		$this->assign("data",$res);
		$this->assign("image_url",$image_url_arr);
		$this->display("item_detail");





	}
}
