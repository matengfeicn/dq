<?php
class IndexAction extends Action{
	public function __construct(){
		parent::__construct();
	}



	public function editBlock(){
		$block_name=I("get.blockid");
		$res=M("block")->where("title='$block_name'")->field('code')->find();
		if(!$res){
			$this->html_code="
			<section id='slider' class='swipe' style='visibility: visible;'>
			<section class='swipe-wrap'>

<?php
foreach(\$data as \$k => \$v){
?>
	<figure>
	<div class='wrap'>
	<a href='\$v[link]'>
	<img alt='this is pic1' src='<?php echo \$v[image_url] ?>' />
	</a>
	</div>
	</figure>
	<?php } ?>
	</section>
	</section> ";
	}
		else{
			$this->html_code=$res['code'];
		}

$data=M("channel")->where("type=1")->field("id,title")->select();
$this->assign("data",$data);
$this->display();
		
	}
	public function doBlock(){
		$document_root=$_SERVER['DOCUMENT_ROOT'];
		$block_url=$document_root."/Public/block/";
		$itemid=I("post.data");
		$type=I("post.type");
		$blockid=I("post.blockid");
		$auto=I("post.auto");
		$html=stripslashes($_POST['html_code']);//I("post.html_code");
		$itemid=substr($itemid,0,-1);
		$auto=I("post.auto");
		if($auto=="false"){
			if(empty($itemid)||empty($blockid)||empty($html)){
				echo $_GET['jsonpcallback'].'('.json_encode(-1).')'; 
				exit;
			}
		}
		else{
			if(empty($blockid)||empty($html)){
				echo $_GET['jsonpcallback'].'('.json_encode(-1).')'; 
				exit;
			}
		}


		$item_id_arr=explode(",",$itemid);

		$res=array();
		if($auto=="true")  {
			$res=M("item")->order("creat_at desc")->limit("5")->select();
		}
		else{
			for($i=0;$i<count($item_id_arr);$i++){
				$id=$item_id_arr[$i];
				$one=M("item")->where("id=$id")->find();
				array_push($res,$one);

			}
		}


		$image_url_arr=array();

		$data=array();
		for($i=0;$i<count($res);$i++){
			$link=$res[$i]['web_url'];
			$url=$res[$i]['image_url'];
			$url_arr=explode(",",$url);
			array_push($data,array('title'=>$res[$i]['title'],'image_url'=>$url_arr[0],'link'=>$link));

		}
		$block_url=$block_url.$blockid.".html";
		$html=htmlspecialchars_decode($html);
		$rs=file_put_contents($block_url,$html);




		ob_start();
		include($block_url);
		$res=ob_get_contents();
		ob_clean();
		$block_res=M("block")->where("title='$blockid'")->find();
		if($block_res){
			/*
				| id      | int(32)      | YES  |     | NULL    |       |
				| content | mediumtext   | YES  |     | NULL    |       |
				| code    | mediumtext   | YES  |     | NULL    |       |
				| itemid  | varchar(32)  | YES  |     | NULL    |       |
				| contain | varchar(256) | YES  |     | NULL    |       |
				| type    | varchar(32)  | YES  |     | NULL    |      
			 */

			$block_res=M("block")->where("title='$blockid'")->save(array("code"=>$html,"content"=>$res,"itemid"=>$itemid,"url"=>$block_url));
		}
		else{
			$block_res=M("block")->add(array("title"=>'$blockid',"code"=>$html,"content"=>$res,"itemid"=>$itemid,"url"=>$block_url));
		}
		$rs=file_put_contents($block_url,$res);
		if($rs)
			echo $_GET['jsonpcallback'].'('.json_encode(1).')'; 
		else
			echo $_GET['jsonpcallback'].'('.json_encode(3).')'; 
		//$this->success("修改成功");
	}
	public function genBlock(){

		$this->data=array('http://img1.bitautoimg.com/ycmall/mweb/img/jiaodiantu01.jpg','http://img1.bitautoimg.com/ycmall/mweb/img/jiaodiantu01.jpg','http://img1.bitautoimg.com/ycmall/mweb/img/jiaodiantu01.jpg');
		$this->html_code="
		<section id='slider' class='swipe' style='visibility: visible;'>
			<section class='swipe-wrap'>

				<?php foreach(\$data as \$k => \$v){ ?>
				<figure>
					<div class='wrap'>
						<a href='product-detail.html'>
						<img alt='this is pic1' src='<?php echo \$v;?>' />
						</a>
					</div>
				</figure>
				<?php } ?>
			</section>
		</section> ";
		$data=$this->data;
		$s=file_put_contents("/home/mtf/Application/dq/Public/1.html",$this->html_code);
		ob_start();
		include "/home/mtf/Application/dq/Public/1.html";
		$content=ob_get_contents();
	}

}
