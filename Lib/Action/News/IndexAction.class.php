<?php
class IndexAction extends Action{
	public function __construct(){
		parent::__construct();
	}

	public function getNews(){
		$channelid=I("get.channelid");

		$res=M("item")->where("channelid=$channelid")->field("id,title,image_url")->select();
		$data=array();
		for($i=0;$i<count($res);$i++){
			$data[$i]['id']=$res[$i]['id'];
			$data[$i]['title']=$res[$i]['title'];
			$image_url=$res[$i]['image_url'];
			$image_url_arr=explode(",",$image_url);
			$data[$i]['image_url']=$image_url_arr[0];
		}
		echo $_GET['jsonpcallback'].'('.json_encode($data).')';

	}
	
	public function del(){
		$id=I("get.id");
		$res=M("news")->where("id='$id'")->find();
		unlink($res['address_url']);
		$res=M("news")->where("id='$id'")->save(array("status"=>3));
		if($res) $this->success("下线成功");
		else $this->error("下线失败");


	}
	public function delR(){
		$id=I("get.id");
		$res=M("news")->where("id='$id'")->find();
		unlink($res['address_url']);
		$res=M("news")->where("id='$id'")->delete();
		if($res) $this->success("删除成功");
		else $this->error("删除失败");


	}
	public function getMore(){
		$this->channelid=I("get.channelid");
		$channelid=I("get.channelid");
		$data=M("item")->where("channelid='$channelid'")->select();
		for($i=0;$i<count($data);$i++){
			$one=$data[$i];
			$image_url_arr=explode(",",$one['image_url']);
			$data[$i]['image_url']=$image_url_arr[0];

		}
		$this->data=$data;
		$this->display("more");

	}

	public function create(){

		$newsid=I("get.id");
		$res=M("news")->where("id='$newsid'")->find();
		$res['content']=htmlspecialchars_decode($res['content']);
		$this->data=$res;
		ob_start();
		$this->display("phone");
		$data=ob_get_contents();
		ob_clean();
		$date=date("Ymd",time());
		$web_url="http://".$_SERVER['SERVER_NAME']."/news/".$date;;
		$image_url=array();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$file_url=$document_root."/news/".$date;
		if(!is_dir($file_url)){
			mkdir($file_url,0777);
		}
		$after="/".time()."_".$newsid."_".rand(1,1000).".html";
		$file_url.=$after;
		$web_url.=$after;
		$res=file_put_contents($file_url,$data);
		M("news")->where("id='$newsid'")->save(array("status"=>2,"url"=>$web_url,"address_url"=>$file_url));
		if($res){
			$this->success("生成成功");
		}
		else {
			$this->error("生成失败");
		}
	}


	public function addTable(){
		if(IS_POST){
			$title=I("post.title");
			$item=I("post.item");
			if(empty($title)||count($item)==0) $this->error("信息不完整");
			$str="";
			for($i=0;$i<count($item);$i++){
				if(empty($item[$i])){
					unset($item[$i]);
				}
				else{
				}
			}
			$item=var_export($item,true);
			$res=M("table_item")->add(array("title"=>$title,"content"=>$item));
			if($res){
				$this->success("增加成功");
			}
			else $this->error("增加失败");







		}
		else 
			$this->display();

	}
	public function new_list(){
		$this->data=M("news")->where("status=2")->select();
		$this->display("List");
	}
	public function news_list(){
		$this->data=M("news")->select();
		$this->display("pageList");
	}
	public function ajax_list(){
		$id=$_GET['itemid'];
		if(!empty($id)){
			$rs=M("item")->where("id<$id")->order("id desc")->limit("20")->select();

		}
		else{
			$rs=M("item")->order("id desc")->limit("20")->select();
		}
		$arr=array();
		for($i=0;$i<count($rs);$i++){
			$one=$rs[$i];
			$img_arr=explode(",",$one['url']);
			$image_url=$img_arr[0];
			array_push($arr,array("id"=>$one['id'],"title"=>$one['title'],"image_url"=>$image_url));
		}
		echo $_GET['jsonpcallback'].'('.json_encode($arr).")";
	}
	public function uploadNews(){
		if(IS_POST){
			$document_root=$_SERVER['DOCUMENT_ROOT'];
			$file=$_FILES['file'];
			$date=date("Ymd",time());
			$web_url="http://".$_SERVER['SERVER_NAME']."/news/".$date;;
			$file_url=$document_root."/news/".$date;
			if(!is_dir($file_url)){
				mkdir($file_url,0777);
			}
			/*
			 *
			 * 
			 * status 
			 *    1 编辑完成 
			 *    2 已发布
			 *    3 已下线
			 *
			 */



			$after="/".time()."_".rand(1,1000).".html";
			$file_url.=$after;
			$web_url.=$after;


			$data['title'] = I("post.title");
			$data['creat_at'] = time();
			$data['content'] = I("post.content");
			$data['content']=stripslashes($data['content']);
		//	$data['url'] = $web_url;
		//	$data['address_url'] = $file_url;
			$data['status']=1;
			$res=M("news")->add($data);
			if($res>0) $this->success("增加成功");
			else $this->error("增加失败");
			//$data['location'] = I("post.type");
		}
		else{
			$this->display("uploadNews");
		}
	}
	public function getTableItem(){
		$table_item_id=I("get.table_item_id");
		$res=M("table_item")->where("id=$table_item_id")->find();
		eval('$data='.$res['content'].';');
		echo $_GET['jsonpcallback'].'('.json_encode($data).')';
		
	}
	public function change(){
		$id=$_GET['id'];
		$res=M("news")->where("id='$id'")->find();
		$res['content']=htmlspecialchars_decode($res['content']);
		$this->assign("data",$res);
		$this->display("changeNews");
	}
	public function pc(){
		$this->error("功能未开放");
	}
	public function phone(){
		$newsid=I("get.id");
		$res=M("news")->where("id='$newsid'")->find();
		$res['content']=htmlspecialchars_decode($res['content']);
		$this->data=$res;
		$this->display("phone");

	}
	public function doChange(){
		$id = I("get.id");
		$data['title'] = I("post.title");
		$data['content'] = I("post.content");

		$date=date("Ymd",time());
		$web_url="http://".$_SERVER['SERVER_NAME']."/Public/Upload/".$date;;
		$image_url=array();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$file_url=$document_root."/Public/Upload/".$date;
		if(!is_dir($file_url)){
			mkdir($file_url,0777);
		}
		 $file_url=$_SERVER['DOCUMENT_ROOT']."/html";                                                                                                                
		 $date=date("Ymd",time());
		 $file_url.="/".$date;
		 if(!is_dir($file_url)) mkdir($file_url,0777);
		 $file_url.="/".time()."_".$id."_".rand(1,10000).".html";

		$res=M("news")->where("id='$id'")->save($data);
		if($res>0) $this->success("修改成功");
		else $this->error("修改失败");
	}
}

