<?php
class IndexAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function isLogin(){
		if(isset($_SESSION['admin'])){
		}
		else{
			echo "请先登陆";
			exit;
		}
	}

	public function del(){
		self::isLogin();
		$id=I("get.id");
		$res=M("item")->where("id=$id")->find();
		unlink($res['link']);
		$res=M("item")->where("id=$id")->save(array("status"=>3));
		if($res) $this->success("下线成功");
		else $this->error("下线失败");


	}
	public function delR(){
		self::isLogin();
		$id=I("get.id");
		$res=M("item")->where("id=$id")->find();
		unlink($res['link']);
		$res=M("item")->where("id=$id")->delete();
		if($res) $this->success("删除成功");
		else $this->error("删除失败");


	}
	public function getItem(){
		self::isLogin();
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
	public function getMore(){
		$this->channelid=I("get.channelid");
		$channelid=I("get.channelid");
		$data=M("item")->where("channelid='$channelid'")->select();
		for($i=0;$i<count($data);$i++){
			$one=$data[$i];
			$image_url_arr=explode(",",$one['image_url']);
			$data[$i]['image_url']=$image_url_arr[0];

		}
		$this->itemid=$data[count($data)-1]['id'];
		$this->data=$data;
		$this->display("more");

	}

	public function getMoreItem(){
		$channelid=I("get.channelid");
		$itemId=I("itemid");
		$this->channelid=I("get.channelid");
		$this->itemId=I("itemid",0);
		$data=M("item")->where("channelid='$channelid' and id>'$itemId'")->limit(15)->select();
		for($i=0;$i<count($data);$i++){
			$one=$data[$i];
			$image_url_arr=explode(",",$one['image_url']);
			$data[$i]['image_url']=$image_url_arr[0];

		}
		echo I('jsonpcallback').'('.json_encode($data).')';

	}
	public function delTable(){
		self::isLogin();
		$id=I("get.table_item_id");
		$res=M("table_item")->where("id='$id'")->delete();
		if($res) echo $_GET['jsonpcallback'].'('.json_encode(1).')';
		else  echo $_GET['jsonpcallback'].'('.json_encode(-1).')';

	}
	public function addTable(){
		self::isLogin();
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
	public function item_list(){
		self::isLogin();
		$channelid=I("channelid");
		$res=M("item")->where("channelid=$channelid")->select();
		$this->channelid=$channelid;
		$this->assign("data",$res);
		$this->display("pageList");
	}
	public function ajax_list(){
		self::isLogin();
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
	public function uploadItem(){
		self::isLogin();
		if(IS_POST){
			$document_root=$_SERVER['DOCUMENT_ROOT'];
			$file=$_FILES['file'];
			$date=date("Ymd",time());
			$web_url="http://".$_SERVER['SERVER_NAME']."/Public/Upload/".$date;;
			$file_url=$document_root."/Public/Upload/".$date;
			if(!is_dir($file_url)){
				mkdir($file_url,0777);
			}
			$image_url=array();
			//array(5) { ["name"]=> array(2) { [0]=> string(44) "0b7b02087bf40ad1f0187d59542c11dfa8ecce88.jpg" [1]=> string(44) "1e30e924b899a90185233f201e950a7b0208f596.jpg" } ["type"]=> array(2) { [0]=> string(10) "image/jpeg" [1]=> string(10) "image/jpeg" } ["tmp_name"]=> array(2) { [0]=> string(25) "/opt/lampp/temp/phpiBDygb" [1]=> string(25) "/opt/lampp/temp/php8av7FJ" } ["error"]=> array(2) { [0]=> int(0) [1]=> int(0) } ["size"]=> array(2) { [0]=> int(175036) [1]=> int(60359) } } 
			for($i=0;$i<count($file['tmp_name']);$i++){
				if(empty($file['tmp_name'][$i])) continue;
				$name=$file['name'][$i];
				list($name,$type)=split("\.",$name);
				$after="/".md5($file['name'][$i])."_".time()."_".rand(1,10000)."_".$i.".".$type;
				$url=$file_url.$after;



				$web_real_url=$web_url.$after;
				$one=$file['tmp_name'][$i];
				array_push($image_url,$web_real_url);
				move_uploaded_file($one,$url);
			}
			/*
			 * +------------+--------------+------+-----+---------+----------------+
			 * | Field      | Type         | Null | Key | Default | Extra          |
			 * +------------+--------------+------+-----+---------+----------------+
			 * | id         | int(32)      | NO   | PRI | NULL    | auto_increment |
			 * | title      | varchar(256) | YES  |     | NULL    |                |
			 * | creat_at   | varchar(32)  | YES  |     | NULL    |                |
			 * | price      | varchar(32)  | YES  |     | NULL    |                |
			 * | image_url  | mediumtext   | YES  |     | NULL    |                |
			 * | webibo_url | mediumtext   | YES  |     | NULL    |                |
			 * | link       | varchar(256) | YES  |     | NULL    |                |
			 * | content    | mediumtext   | YES  |     | NULL    |                |
			 * | total      | varchar(32)  | YES  |     | NULL    |                |
			 * | detail     | mediumtext   | YES  |     | NULL    |                |
			 * | table_id      | varchar(32)  | YES  |     | NULL    |                |
			 * | table_content | mediumtext   | YES  |     | NULL    |                |
			 * | channelid  | int(32)      | YES  |     | NULL    |                |
			 * +------------+--------------+------+-----+---------+----------------+
			 *
			 * 
			 * status 
			 *    1 编辑完成 
			 *    2 已发布
			 *    3 已下线
			 *
			 */





			$data['title'] = I("post.title");
			$data['creat_at'] = time();
			$data['price'] = I("post.price");
			$data['image_url'] = implode(",",$image_url);
			$data['weibo_url'] = I("post.weibo_url");
			$data['content'] = stripslashes(I("post.content"));
			$data['total'] = I("post.total");
			$data['channelid']=I("get.channelid");
			$data['sold_total']=I("post.sold_total");
			$data['status']=1;
			$data['table_id']=I('table_item_id');
			$data['table_content']=var_export(I('post.item'),true);



			$res=M("item")->add($data);
			if($res>0) $this->success("增加成功");
			else $this->error("增加失败");
			//$data['location'] = I("post.type");
		}
		else{
			$table_item=M("table_item")->select();
			$one=null;
			if(!empty($table_item)) $one=$table_item[0];


			eval('$table_content='.$one['content'].';');
			$this->table_info=$table_content;
			$this->table_s=$table_item;
			$this->channelid=I("get.channelid");
			$this->display("uploadItem");
		}
	}
	public function getTableItem(){
		self::isLogin();
		$table_item_id=I("get.table_item_id");
		$res=M("table_item")->where("id=$table_item_id")->find();
		eval('$data='.$res['content'].';');
		echo $_GET['jsonpcallback'].'('.json_encode($data).')';
		
	}
	public function change(){
		self::isLogin();
		$id=$_GET['id'];
		$res=M("item")->where("id='$id'")->find();
		$image_url=$res['image_url'];


		$table_id=$res['table_id'];
		$table=M("table_item")->where("id=$table_id")->find();
		$res['content']=htmlspecialchars_decode($res['content']);
		eval('$item_table_content='.$res['table_content'].';');
		eval('$table_content='.$table['content'].';');
		$array=array();
		for($i=0;$i<count($item_table_content);$i++){
			$array[$i]=array('title'=>$table_content[$i],'content'=>$item_table_content[$i]);
		}
		$this->item_table_id=$res['table_id'];
		$this->table_info=$array;


		$table_item=M("table_item")->field("id,title")->select();
		$this->table_s=$table_item;

		$this->image_url=explode(",",$image_url);
		$this->assign("data",$res);
		$this->display("changeItem");
	}
	public function doChange(){
		self::isLogin();
		$id = I("get.id");
		$data['type'] = I("post.type");
		$data['title'] = I("post.title");
		$data['alcohol'] = I("post.alcohol");
		$data['level'] = I("post.level");
		$data['tempera'] = I("post.tempera");
		$data['price'] = I("post.price");
		$data['content'] = I("post.content");
		$data['uname'] = $_SESSION['admin']['uname'];
		$data['creattime'] = time();
		$data['change'] = time();
		$data['total'] = I("post.total");
		$data['country']=I("post.country");
		$data['province']=I("post.province");
		$data['county']=I("post.county");
		$data['table_id']=I('table_item_id');
		$data['table_content']=var_export(I('post.item'),true);


		$date=date("Ymd",time());
		$web_url="http://".$_SERVER['SERVER_NAME']."/Public/Upload/".$date;;
		$image_url=array();
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$file_url=$document_root."/Public/Upload/".$date;
		if(!is_dir($file_url)){
			mkdir($file_url,0777);
		}
		if(!empty($_FILES['file']['name'][0])){
			var_dump($_FILES);
			$file=$_FILES['file'];
			for($i=0;$i<count($file['tmp_name']);$i++){
				if(empty($file['tmp_name'][$i])) continue;
				$name=$file['name'][$i];
				list($name,$type)=split("\.",$name);
				$after="/".md5($file['name'][$i])."_".time()."_".rand(1,10000)."_".$i.".".$type;
				$url=$file_url.$after;
				$web_real_url=$web_url.$after;
				$one=$file['tmp_name'][$i];
				array_push($image_url,$web_real_url);
				move_uploaded_file($one,$url);
			}
			$data['url'] = implode(",",$image_url);
		}
		 $file_url=$_SERVER['DOCUMENT_ROOT']."/html";                                                                                                                
		 $date=date("Ymd",time());
		 $file_url.="/".$date;
		 if(!is_dir($file_url)) mkdir($file_url,0777);
		 $file_url.="/".time()."_".$id."_".rand(1,10000).".html";

		$data['link'] = $file_url;
		$res=M("item")->where("id='$id'")->save($data);
		if($res>0) $this->success("修改成功");
		else $this->error("修改失败");
	}
}

