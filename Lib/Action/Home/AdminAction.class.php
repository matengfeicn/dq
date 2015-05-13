<?php
class AdminAction extends Action{
	/*
	 * session admin( id , uname);
	 * cookie  id	, admin_mid
	 */
	public function __construct(){
		parent::__construct();

		if(isset($_SESSION['admin'])){
		}
		else if(isset($_COOKIE['admin_mid'])){
			/*
			 * 自动登陆
			 */
		}

		else if(in_array(GetArg('a'),array('login','register'))){
		}
		else{
			$this->display("login");
			exit;
		}
	}
	public function logout(){
		unset($_SESSION['admin']);
		setcookie("admin_mid","",time()-3600*7);
		$this->success("退出成功");
	}
	public function changePwd(){
		if(isset($_POST['dosubmit'])){
			$old=$_POST['old'];
			$new=$_POST['new'];
			$new2=$_POST['new2'];
			if(empty($old)){
				$this->error("原密码不能为空");
			}
			if(empty($new)||empty($new2)){
				$this->error("新密码不能为空");
			}
			if(strlen($new)<6){
				$this->error("新密码至少为6位");
			}
			if($new!=$new2){
				$this->error("密码不一致");
			}

			$uid=$_SESSION['admin']['id'];
			$res=M("admin")->where("id='$uid'")->find();
			$pwd=md5(md5($old).$res['ext']);
			if($pwd==$res['pwd']){
				$ext="";
				for($i=0;$i<4;$i++){
					$ext.=chr(rand(97,122));

				}
				$pwd=md5(md5($new).$ext);
				$res=M("admin")->where("id='$uid'")->save(array("pwd"=>$pwd,"ext"=>$ext));
				if($res){
					unset($_SESSION['admin']);
					echo "<script>parent.refresh();</script>";
					$this->success("修改成功");
				}
				else {
					$this->error("修改失败");
				}
			}
			else {
				$this->error("密码错误");
			}
			/*
			array(7) {
				["id"]=>
					string(1) "2"
					["uname"]=>
					string(5) "admin"
					["pwd"]=>
					string(32) "a6876b80de000eeeb7c4ffe3bae726a9"
					["creattime"]=>
					string(10) "1425393150"
					["ext"]=>
					string(4) "ixvn"
					["groupid"]=>
					string(1) "0"
					["email"]=>
					string(16) "bistumtf@163.com"
			}
			 */





		}
		else{
			$this->display("changePwd");
		}
	}


	public function treeChannels($data){
		for($i=0;$i<count($data);$i++){
			$re_data=$data[$i];
			if(empty($re_data['layer'])){
				$str.=' <li class="active">
					<a href="'.$re_data['url'].'">
					<i class="'.$re_data['icon'].'"></i>
					<span class="menu-text"> '.$re_data['title'].' </span>
					</a>
					</li>
					';
			}
			else{
				$str.='
					<li>
					<a href="'.$re_data['url'].'" class="dropdown-toggle">
					<i class="'.$re_data['icon'].'"></i>
					<span class="menu-text"> '.$re_data['title'].'</span>
					<b class="arrow icon-angle-down"></b>
					</a>
					<ul class="submenu">
					';

				for($i=0;$i<count($re_data['layer']);$i++){
					$str.=self::treeChannel($re_data['layer']);
				}
				$str.="</ul>";
			}
		}
		$str.="</li>";
		return $str;
	}

	public function treeChannel($data){
		$str="";
		for($i=0;$i<count($data);$i++){
			$one=$data[$i];
			if(empty($one['child'])&&empty($one['parent'])){
				$str.=' <li item="'.$one['id'].'"  class="active">
					<a href="'.$one['url'].'">
					<i class="'.$one['icon'].'"></i>
					<span class="menu-text"> '.$one['title'].' </span>
					</a>
					</li>
					';
			}
			else if(!empty($one['child'])){
				$channel_id=explode(",",$one['child']);
				array_pop($channel_id);
				$str.='
					<li  item="'.$one['id'].'" >
					<a href="'.$one['url'].'" class="dropdown-toggle">
					<i class="'.$one['icon'].'"></i>
					<span class="menu-text"> '.$one['title'].'</span>
					<b class="arrow icon-angle-down"></b>
					</a>
					<ul class="submenu">
					';

				for($j=0;$j<count($channel_id);$j++){
					$childid=$channel_id[$j];
					$ones=M("channel")->where("id=$childid")->find();
					$str.=' <li  item="'.$ones['id'].'"  class="active">
						<a href="'.$ones['url'].'">
						<i class="'.$ones['icon'].'"></i>
						<span class="menu-text"> '.$ones['title'].' </span>
						</a>
						</li>
						';
				}
				$str.="</ul>";
			}

		}
		$str.="</li>";
		return $str;
	}
	public function getChannel(){
		$cache_url=$_SERVER['DOCUMENT_ROOT']."/Public/Cache/";
		$res=M("channel")->select();
		$str=self::treeChannel($res);
		$res=file_put_contents($cache_url."home_left_list.html",$str);
		ob_start();
		$this->display($cache_url."home_left_list.html");
		$str=ob_get_contents();
		ob_clean();
		$res=file_put_contents($cache_url."home_left_list.html",$str);
		if($res) $this->success("生成列表成功","index.php?g=Home&m=Admin&a=index");
		else{
			$this->error("生成失败");
		}

	}
	public function addChannel(){
		if(IS_POST){
			$title=I("post.title");
			$url="javascript:jump('".$_POST['url']."')";
			$icon=I("post.icon");
			$channelid=I("get.channelid");
			$type=I("post.type");
			$child=I("post.child");
			if(!empty($channelid)){
				$parent=$channelid;
				$res=M("channel")->add(array("title"=>$title,"url"=>$url,"icon"=>$icon,"child"=>$child,"parent"=>"$parent,","type"=>$type));
				$url="javascript:jump('__ITEM__&a=item_list&channelid=$res')";
				M("channel")->where("id='$res'")->save(array("url"=>$url));
				//if($url=="javascript:jump('#')"){
					//$r_res=M("channel")->where("id=$res")->save(array("url"=>$url));
				//}
				$childid=$res;
				$res=M("channel")->where("id=$channelid")->find();
				if(empty($res['child'])){
					$res=M("channel")->where("id=$channelid")->save(array("child"=>"$childid,"));
				}
				else{
					$childidarr=explode(",",$res['child']);
					array_pop($childidarr);
					array_push($childidarr,$childid);
					$childid=implode(",",$childidarr);
					$res=M("channel")->where("id=$channelid")->save(array("child"=>"$childid,"));

				}
			}
			else {
				$res=M("channel")->add(array("title"=>$title,"url"=>$url,"icon"=>$icon,"child"=>$child,"type"=>$type));
				$url="javascript:jump('__ITEM__&a=item_list&channelid=$res')";
				$res=M("channel")->where("id='$res'")->save(array("url"=>$url));
				/*if($url=="javascript:jump('#')"){
				}
				 */
			}
			
			if($res) $this->success("增加成功");
			else $this->error("增加失败");

		}
		else {
			$this->channelid=I("get.channelid");
			$this->display();
		}

	}
	public function detailChannel(){
		$channelid=I("get.channelid");
		$res=M("channel")->where("id=$channelid")->find();
		if(empty($res['child'])){
			$this->channel=null;
		}
		else{
			$childid=substr($res['child'],0,-1);
			if(empty($childid)) $this->channel=null;
			else $this->channel=M("channel")->where("id in ($childid)")->select();

		}
		$childid=$res['child'];
		$this->channelid=$channelid;
		$this->display();
	}
	public function insertChannel(){
		/*
		 *|  1 | javascript:jump(3) | icon-text-width | 酒    |       | NULL   |
		 |  2 | javascript:jump(3) | icon-text-width | 酒    | 3,4,  | NULL   |
		 |  3 | javascript:jump(3) | icon-text-width | 酒    |       | 2      |
		 |  4 | javascript:jump(3) | icon-text-width | 酒    |       | 2      |
		 |  5 | javascript:jump(3) | icon-text-width | 酒    |       |       
		 */
		$this->channel=M("channel")->where("parent is null or parent=''")->select();
		$this->display();

	}
	public function delChannel(){
		$channelid=I("get.channelid");
		$res=M("channel")->where("parent like '%$channelid%'")->select();
		if(!empty($res)) {
			for($i=0;$i<count($res);$i++){

				$child_id_arr=explode(",",$res[$i]['parent']);
				array_pop($child_id_arr);
				for($j=0;$j<count($child_id_arr);$j++){
					if($child_id_arr[$j]==$channelid){
						unset($child_id_arr[$j]);
					}
				}
				$childid=implode(",",$child_id_arr);
				$cid=$res[$i]['id'];
				if(count($child_id_arr)==0){
					$d_res=M("channel")->where("id=$cid")->save(array("parent"=>"$childid"));
				}
				else 
					$d_res=M("channel")->where("id=$cid")->save(array("parent"=>"$childid,"));



			}

		}

		$res=M("channel")->where("child like '%$channelid%'")->select();

		if(!empty($res)){
			for($i=0;$i<count($res);$i++){

				$child_id_arr=explode(",",$res[$i]['child']);
				array_pop($child_id_arr);
				for($j=0;$j<count($child_id_arr);$j++){
					if($child_id_arr[$j]==$channelid){
						unset($child_id_arr[$j]);
					}
				}
				$cid=$res[$i]['id'];
				$childid=implode(",",$child_id_arr);
				if(count($child_id_arr)==0){
					$d_res=M("channel")->where("id=$cid")->save(array("child"=>"$childid"));
				}
				else 
					$d_res=M("channel")->where("id=$cid")->save(array("child"=>"$childid,"));



			}
		}
		$res=M("channel")->where("id=$channelid")->delete();
		if($res) $this->success("删除成功");
		else $this->error("删除失败");


	}
	public function index(){
		$cache_url=$_SERVER['DOCUMENT_ROOT']."/Public/Cache/";
		$this->home_left_list=file_get_contents($cache_url."home_left_list.html");
		$this->display("index");
	}
	public function login(){
		if(IS_POST){
			$uname=I("post.uname");
			$pwd=I("post.pwd");
			$user=M("admin")->where("uname='$uname'")->find();
			$ext=$user['ext'];
			if($user['pwd']==md5(md5($pwd).$ext)){
				$_SESSION['admin']=array('id'=>$user['id'],'uname'=>$user['uname']);
				$this->success("登陆成功","index.php?g=Home&m=Admin&a=index");
			}
			else{
				$this->error("用户名或密码错误");
			}
			exit;
		}
		else{
			$this->display("login");
		}
	}
	/*
		+-----------+-------------+------+-----+---------+----------------+
		| Field     | Type        | Null | Key | Default | Extra          |
		+-----------+-------------+------+-----+---------+----------------+
		| id        | int(32)     | NO   | PRI | NULL    | auto_increment |
		| uname     | varchar(32) | YES  |     | NULL    |                |
		| pwd       | varchar(32) | YES  |     | NULL    |                |
		| creattime | varchar(32) | YES  |     | NULL    |                |
		| ext       | varchar(32) | YES  |     | NULL    |                |
		| email     | varchar(32) | YES  |     | NULL    |                |
		| groupid   | int(32)     | YES  |     | NULL    |                |
		+-----------+-------------+------+-----+---------+----------------+
	 */

	public function register(){
		if(IS_POST){
			$uname=I("post.uname");
			$pwd=I("post.pwd");
			$email=I("post.email");
			$groupid=0;

			$ext="";;
			for($i=0;$i<4;$i++){
				$ext.=chr(rand(97,122));

			}
			$rs=M("admin")->where("uname='$uname' or email='email'")->find();
			if(!empty($rs)){
				$this->error("用户名或邮箱已被使用");
				exit;
			}



			$data['uname']=$uname;
			$data['pwd']=md5(md5($pwd).$ext);
			$data['creattime']=time();
			$data['ext']=$ext;
			$data['email']=$email;
			$data['groupid']=$groupid;
			$rs=M("admin")->add($data);
			if($rs>0){
				$this->success("增加成功");
			}
			else{
				$this->error("增加失败");
			}
		}
		else{
			$this->display("register");
			exit;
		}

	}
	public function test(){
		exit;
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
