<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>更多页面</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="__PUBLIC__swipe/style/base.css" type="text/css"/>
    <link rel="stylesheet" href="__PUBLIC__swipe/style/common.css" type="text/css"/>
    <style>
tr{width:50%}
th{width:50%}
    </style>
</head>
<body class="bg-gray">
	<section id="container" class="container">
		<header id="header" class="cf">
			<section class="top-defalt cf">
				<h1 id="logo" class="logo">
					北京大秦汇通商贸有限公司
				</h1>
				<div id="top-menu" class="top-menu">
					<div class="icon-bar"></div>
					<div class="icon-bar"></div>
					<div class="icon-bar"></div>
				</div>
			</section>
			<nav id="top-menu-content" class="top-menu-content h0">
				<ul>
					<li><a href="__ROOT__html/mobile_index.html">首页</a></li>
					<li><a href="__ITEM__&a=getMore&channelid=35">特产</a></li>
					<li><a href="__ITEM__&a=getMore">礼品定制</a></li>
					<li><a href="__NEWS__&a=new_list">资讯中心</a></li>
					<li><a href="__ROOT__html/about_us.html">关于我们</a></li>
					<li><a href="__ROOT__html/contact_us.html">联系我们</a></li>
				</ul>
			</nav>
		</header>

		<nav class="nav wraper">
			<ul>
				<li><a href="__ITEM__&a=getMore"><i class="gift-icon"></i><strong>礼品定制</strong></a></li>
				<li><a href="__NEWS__&a=new_list"><i class="news-icon"></i><strong>资讯中心</strong></a></li>
				<li><a href="__ROOT__html/about_us.html"><i class="about-icon"></i><strong>关于我们</strong></a></a></li>
				<li><a href="__ROOT__html/contact_us.html"><i class="contact-icon"></i><strong>联系我们</strong></a></li>
			</ul>
		</nav>
		
	

		<section class="module-list wraper">
			<section class="hd cf">
				<h2>礼品定制</h2>
			</section>
			<section class="bd">
				<ol id="itemList" class="item-list cf">
					<?php if(is_array($data)): foreach($data as $key=>$vo): ?><li>
					<a href="<?php echo ($vo["url"]); ?>">
							<img src="<?php echo ($vo["image_url"]); ?>" alt="">
							<strong><?php echo ($vo["title"]); ?></strong>
							<div class="product-info">
								<em>￥<?php echo ($vo["price"]); ?></em>
								<em>累计销量<?php echo ($vo["sold_total"]); ?>件</em>
							</div>
						</a>
					</li><?php endforeach; endif; ?>
				</ol>
				
				<a id="getMore" href="javascript:void(0)" class="get-more-item">
					<i  class="loading"></i>查看更多
				</a>
				
			</section>
		</section>
		
		<section class="sorts-btn"></section>
		<section class="sorts-list">
			<ul>
				<li><a href="#">皇台</a></li>
				<li><a href="#">白酒</a></li>
				<li><a href="#">红酒</a></li>
				<li><a href="#">洋酒</a></li>
			</ul>
		</section>
		
		<footer id="footer" class="wraper">
			<a href="//13999999999">13999999999</a>
			<p>Copyright © 北京大秦汇通商贸有限公司 </br>Powered by: 大秦汇通</p>
		</footer>
	</section>
	<script src="__PUBLIC__swipe/js/zepto.min.js"></script>
	<script>
	
		$(function(){
			var channelid='<?php echo ($channelid); ?>';
			var itemid='<?php echo ($itemid); ?>';
			$("#getMore").click(function(){
				$.ajax({
					data:{"channelid":channelid,"itemid":itemid},
					dataType:"json",
					type:"get",
					url:'__ROOT__/index.php/Item/Index/getMoreItem?jsonpcallback=?',
					success:function(data){
						if(data!==null){
							var str="";
							$.each(data,function(k,v){
								str+='<li> <a href="'+v['url']+'"> <img src="'+v['image_url']+'" alt=""> <strong>'+v['title']+'</strong> <div class="product-info"> <em>￥'+v['price']+'</em> <em>累计销量'+v['sold_total']+'件</em> </div> </a> </li>';

							});
							$("#itemList").append(str);




						}

					}
				});
			});

			//顶部导航显示隐藏
			$("#top-menu").tap(function(){
				$("#top-menu-content").toggleClass("h0");
			});

			//侧边栏导航显示隐藏, 之所以用click事件，因为zepto的tap事件有“穿透”bug.
			$(".sorts-btn").click(function(){
				$(this).toggleClass("show")
					$(".sorts-list").toggle();
			});
			
			
			
			
		});
	
		 

	</script>
</body>
</html>