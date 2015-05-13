
<?php
function GetArg($param){
	$url=$_SERVER['REQUEST_URI'];
	$arr=split("\?",$url);
	$arr=split("&",$arr[1]);
	$rs=array();
	for($i=0;$i<count($arr);$i++){
		$paried=split("=",$arr[$i]);
		$rs[$paried[0]] = $paried[1];
	}
	$rs=array_unique($rs);
	return $rs[$param];
}
function genBlock($id,$content){
}
function getBlock($blockid){
	if(!creat_html){
	$server_url=$_SERVER['SERVER_NAME'];
	$server_url="http://".$server_url."/index.php?g=Block&m=Index&a=editBlock&blockid=$blockid";
	$block_url=$_SERVER['DOCUMENT_ROOT']."/Public/block";
	$content="<div style='min-height:30px;box-shadow:0px 0px 10px yellow;background-color:yellow' class='block' id='$blockid' onclick='window.open(\"$server_url\")'>";
	$content.=file_get_contents($block_url."/$blockid.html");
	$content.="</div>";
	echo $content;
	}
	else{
	$block_url=$_SERVER['DOCUMENT_ROOT']."/Public/block";
	$content.=file_get_contents($block_url."/$blockid.html");
	echo $content;
	}
}
function getBlockR($id){
	$block_url=$_SERVER['DOCUMENT_ROOT']."/Public/block";
	$content.=file_get_contents($block_url."/$blockid.html");
	echo $content;
}


?>
