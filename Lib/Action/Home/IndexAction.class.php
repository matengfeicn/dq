<?php
class IndexAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		include "./html/mobile_index.html";

	}

	public function homePage(){
		define("creat_html",false);
		$this->display("homePage");
	}



	public function create_about_us(){
		ob_start();
		$this->display("about_us");
		$data=ob_get_contents();
		ob_clean();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$url=$document_root."/html";
		if(!is_dir($url)){
			mkdir($url,0777);
		}
		$url.="/about_us.html";
		$res=file_put_contents($url,$data);

		if($res) $this->success("生成成功");
		else $this->error("生成失败");
		


	}
	public function create_contact_us(){
		ob_start();
		$this->display("contact_us");
		$data=ob_get_contents();
		ob_clean();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$url=$document_root."/html";
		if(!is_dir($url)){
			mkdir($url,0777);
		}
		$url.="/contact_us.html";
		$res=file_put_contents($url,$data);
		if($res) $this->success("生成成功");
		else $this->error("生成失败");
		


	}
	public function contact(){
		$name=I("post.user-name");
		$phone=I("post.user-phone");
		$email=I("post.email");
		$content=I("post.content");
		if(empty($name)||empty($phone)||empty($email)||empty($content)) $this->error("数据不完整");
		$res=M("message")->add(array("name"=>$name,"phone"=>$phone,"email"=>$email,"content"=>$content,"creat_at"=>time()));
		if($res){
			$this->success("提交成功");
		}
		else {
			$this->error("提交失败");
		}


	}
	public function message_list(){
		$this->data=M("message")->order("creat_at desc")->select();
		$this->display("message_list");

	}
	public function get_message(){
		$id=I("get.id");
		$this->data=M("message")->where("id=$id")->find();
		$this->display("message");

	}
	public function create_mobile_homePage(){
		define("creat_html",true);
		ob_start();
		$this->display("homePage");
		$data=ob_get_contents();
		ob_clean();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$date=date("Ymd",time());
		$url=$document_root."/html";
		if(!is_dir($url)){
			mkdir($url,0777);
		}
		$url.="/mobile_index.html";
		$res=file_put_contents($url,$data);
		if($res) $this->success("生成手机首页成功");
		else $this->error("生成手机首页失败");

	}
	public function test(){
		$file=fopen("./data.php","r+");
		$s=array( '0'=>'1','d'=>array( '0'=>'f','a'=>array( '0'=>'4',)));
		$arr=array(
			'0'=>'1',
			'd'=>array('f','a'=>array('4')));
		$return=$this->arr($arr);
		var_dump($s);
		var_dump($return);

	}

	public function arr($param){
		$str="array(";
		foreach($param as $k => $v){
			if(is_array($v)){
				$str.="'$k'=>".$this->arr($v);
			}
			else{
				$str.="\n'$k'=>'$v',";
			}
		}
		$str.=")";
		return $str;


	}


}
