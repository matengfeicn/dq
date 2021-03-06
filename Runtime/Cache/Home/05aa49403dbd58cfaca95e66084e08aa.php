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
		
	

		<!-- 轮播start-->
			<?php echo getBlock('homePage_1');?>
		<!-- 轮播end-->

		
		<section class="module-list wraper">
			<section class="hd cf">
				<h2 class="fl">礼品定制</h2>
				<a href="__ITEM__&a=getMore&channelid=51" class="fr">更多案例</a>
			</section>
			<section class="bd">
					<?php echo getBlock('homePage_2');?>
				<ul class="cf data-list1">
					<li>
						<a href="gift-detail.html">
							<strong>礼品名称</strong>
							<img src="__PUBLIC__swipe/images/tem/gift-tem.jpg"  alt="" />
						</a>
					</li>
					<li>
					<a href="gift-detail.html">
							<strong>礼品名称</strong>
							<img src="__PUBLIC__swipe/images/tem/gift-tem.jpg"  alt="" />
						</a>
					</li>
				</ul>
				<ul class="cf data-list2">
					<li>
						<a href="gift-detail.html">
							<strong>礼品名称</strong>
							<img src="__PUBLIC__swipe/images/tem/gift-tem.jpg"  alt="" />
						</a>
					</li>
					<li>
						<a href="gift-detail.html">
							<strong>礼品名称</strong>
							<img src="__PUBLIC__swipe/images/tem/gift-tem.jpg"  alt="" />
						</a>
					</li>
					<li>
						<a href="gift-detail.html">
							<strong>礼品名称</strong>
							<img src="__PUBLIC__swipe/images/tem/gift-tem.jpg"  alt="" />
						</a>
					</li>
				</ul>
			</section>
		</section>
		
		<section class="module-list wraper">
			<section class="hd cf">
				<h2 class="fl">酒品人生</h2>
				<a href="__ITEM__&a=getMore&channelid=35" class="fr">更多案例</a>
				<a href="more.html" class="fr">更多案例</a>
			</section>
			<section class="bd">
					<?php echo getBlock('homePage_3');?>
				<ul class="cf data-list1">
					<li>
						<a href="product-detail.html">
							<strong>40度法国轩尼诗</strong>
							<img src="__PUBLIC__swipe/images/tem/tem1-1.jpg"  alt="" />
						</a>
					</li>
					<li>
						<a href="product-detail.html">
							<strong>甘肃皇台95至尊</strong>
							<img src="__PUBLIC__swipe/images/tem/tem1-2.jpg"  alt="" />
						</a>
					</li>
				</ul>
				<ul class="cf data-list2">
					<li>
						<a href="product-detail.html">
							<strong>拉菲红酒原装进口</strong>
							<img src="__PUBLIC__swipe/images/tem/tem1-3.jpg"  alt="" />
						</a>
					</li>
					<li>
						<a href="product-detail.html">
							<strong>拉菲红酒原装进口</strong>
							<img src="__PUBLIC__swipe/images/tem/tem1-3.jpg"  alt="" />
						</a>
					</li>
					<li>
						<a href="product-detail.html">
							<strong>拉菲红酒原装进口</strong>
							<img src="__PUBLIC__swipe/images/tem/tem1-3.jpg"  alt="" />
						</a>
					</li>
				</ul>
			</section>
		</section>
		
		<footer id="footer" class="wraper">
			<a href="//13999999999">13999999999</a>
			<p>Copyright © 北京大秦汇通商贸有限公司 </br>Powered by: 大秦汇通</p>
		</footer>
	</section>
	
	
	<script src="__PUBLIC__swipe/js/zepto.min.js"></script>
	<script src="__PUBLIC__swipe/js/swipe.js"></script>
	<script>
	
		$(function(){
			
			var touchSlider = {
				touchSwipe: function(id){
					 var slider = Swipe(document.getElementById(id), {
						auto: 3000,
						continuous: true
					 });
					 this.createTx(id);
				},
				createTx: function(id){
					var picFigure = $('#'+id).find('figure');
					var imgs = $('#'+id).find('img');
					picFigure.each(function(){
						$('<h3 />', {
							text: imgs.eq($(this).index()).attr('alt'),
							class: 'slider-des'
						}).appendTo($(this));
					});
				}
			 };
			 touchSlider.touchSwipe('slider');

			
			$("#top-menu").tap(function(){
				$("#top-menu-content").toggleClass("h0");
				//$("#top-menu-content").height("300px");
			});
			
		});
	
		 

	</script>
</body>
</html>