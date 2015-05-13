<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>更多页面</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="http://dq/Public/swipe/style/base.css" type="text/css"/>
    <link rel="stylesheet" href="http://dq/Public/swipe/style/common.css" type="text/css"/>
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
					<li><a href="http://dq//mobile_index.html">首页</a></li>
					<li><a href="http://dq/index.php?m=Item&c=Index&a=getMore&channelid=35">特产</a></li>
					<li><a href="http://dq/index.php?m=Item&c=Index&a=getMore">礼品定制</a></li>
					<li><a href="http://dq/index.php?m=News&c=Index&a=new_list">资讯中心</a></li>
					<li><a href="http://dq/Public/about_us.html">关于我们</a></li>
					<li><a href="contact_us.html">联系我们</a></li>
				</ul>
			</nav>
		</header>

		<nav class="nav wraper">
			<ul>
				<li><a href="http://dq/index.php?m=Item&c=Index&a=getMore"><i class="gift-icon"></i><strong>礼品定制</strong></a></li>
				<li><a href="http://dq/index.php?m=News&c=Index&a=news_list"><i class="news-icon"></i><strong>资讯中心</strong></a></li>
				<li><a href="http://dq/html/contact_us.html"><i class="contact-icon"></i><strong>联系我们</strong></a></li>
			</ul>
		</nav>
		
	

		<section class="product-intro wraper">
			<section class="txt-intro">
				
				<div style="text-align:center;font-size:30px"><?php echo ($data["title"]); ?></div>
				<div class="parameter">

					<h3>图文介绍</h3>
					<div class="txt-pic-intro">
						<?php echo ($data["content"]); ?>

					</div>
				</div>
				
				
			</section>
			
			
			<div class="bdsharebuttonbox">
				<!--
				<span class="share-txt">分享到：</span>
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
				-->
			</div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			
			
		</section>
		
		
		<footer id="footer" class="wraper">
			<a href="//13999999999">13999999999</a>
			<p>Copyright © 北京大秦汇通商贸有限公司 </br>Powered by: 大秦汇通</p>
		</footer>
	</section>
	<script src="http://dq/Public/swipe/js/zepto.min.js"></script>
	<script src="http://dq/Public/swipe/js/swipe.js"></script>
	<script>
	
		$(function(){
		
			//首页轮播图创建按钮
			
		
			var touchSlider = {
				touchSwipe: function(id){
					var _this = this;
					 var slider = Swipe(document.getElementById(id), {
						auto: 3000,
						continuous: true,
						callback: function (pos) {
							var bullets = $("#count").find("li");
							var i = bullets.length;
							while (i--) {
								bullets[i].className = ' ';
							}
							bullets[pos].className = 'on';
						}
					 });
					 this.createCount(id);
				},
				createCount: function(id){
					var oCount = $("<ol />", {
						id: "count",
						class: "cf"
					})
					$('#'+id).append(oCount);
					var oFragment = document.createDocumentFragment();
					var oPicLength = $('#slider').find('.swipe-wrap').children().length;
					for (var i = 0; i < oPicLength; i++) {
						var oLi = $('<li></li>');
						oCount.append(oLi);
					}
					oCount.find('li').eq(0).addClass('on');
				}
			 };
			 touchSlider.touchSwipe('slider');
		
			$("#top-menu").tap(function(){
				$("#top-menu-content").toggleClass("h0");
			});
			
		});
	
		 

	</script>
</body>
</html>