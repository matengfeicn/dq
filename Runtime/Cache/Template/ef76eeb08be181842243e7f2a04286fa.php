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
		
	

		
		<section class="product-intro wraper">
			<!-- 轮播start-->
			<section id="slider" class="swipe" style="visibility: visible;">
				<section class="swipe-wrap">
					<?php if(is_array($image_url)): foreach($image_url as $k=>$vo): ?><figure>
						<div class="wrap">
							<img src="<?php echo ($vo); ?>" alt="" />
						</div>
					</figure><?php endforeach; endif; ?>
				</section>
			</section>
			<!-- 轮播end-->
			
			<section class="product-name">
				<h3><?php echo ($data["title"]); ?></h3>
			</section>
			
			<div class="product-info">
				<span>价格：<em>￥<?php echo ($data["price"]); ?></em></span>
				<em>累计销量<?php echo ($data["sold_total"]); ?>件</em>
			</div>
			
			<section class="txt-intro">
				<div class="parameter">
					<h3>规格参数</h3>
					<table>
						<?php if(is_array($table_info)): foreach($table_info as $key=>$vo): ?><tr><th><?php echo ($key); ?></th><td><?php echo ($vo); ?></td></tr><?php endforeach; endif; ?>
					</table>
				</div>
				
				<div class="parameter">
					<h3>图文介绍</h3>
					<div class="txt-pic-intro">
						<?php echo ($data["content"]); ?>

					</div>
				</div>
				
				<div class="service">
					<h3>服务承诺</h3>
					<div class="txt-pic-intro">
						<p>网站所售产品均为厂商正品，如有任何问题可与我们客服人员联系，我们会在第一时间跟您沟通处理。我们将争取以最低的价格、最优的服务来满足您最大的需求。开箱验货：签收时在付款后与配送人员当面核对：商品及配件、应付金额、商品数量及发货清单、发票（如有）、赠品（如有）等；如存在包装破损、商品错误、商品短缺、商品存在质量问题等影响签收的因素，请您可以拒收全部或部分商品，相关的赠品，配件或捆绑商品应一起当场拒收；为了保护您的权益，建议您尽量不要委托他人代为签收；如由他人代为签收商品而没有在配送人员在场的情况下验货，则视为您所订购商品的包装无任何问题。</p>
					</div>
				</div>
				
			</section>
			
			<!--
			<div class="bdsharebuttonbox">
				<span class="share-txt">分享到：</span>
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
			</div>
			-->
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			
			
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