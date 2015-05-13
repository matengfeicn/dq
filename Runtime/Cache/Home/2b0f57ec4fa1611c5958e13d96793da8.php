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
					<li><a href="__ROOT__/mobile_index.html">首页</a></li>
					<li><a href="__ITEM__&a=getMore&channelid=35">特产</a></li>
					<li><a href="__ITEM__&a=getMore">礼品定制</a></li>
					<li><a href="__NEWS__&a=new_list">资讯中心</a></li>
					<li><a href="__PUBLIC__about_us.html">关于我们</a></li>
					<li><a href="__ROOT__html/contact_us.html">联系我们</a></li>
				</ul>
			</nav>
		</header>

		<nav class="nav wraper">
			<ul>
				<li><a href="__ITEM__&a=getMore"><i class="gift-icon"></i><strong>礼品定制</strong></a></li>
				<li><a href="__NEWS__&a=news_list"><i class="news-icon"></i><strong>资讯中心</strong></a></li>
				<li><a href="__ROOT__html/about_us.html"><i class="about-icon"></i><strong>关于我们</strong></a></a></li>
				<li><a href="__ROOT__html/contact_us.html"><i class="contact-icon"></i><strong>联系我们</strong></a></li>
			</ul>
		</nav>
		
	


		
		<section class="wraper">
			<section class="contact-us">
				<section class="hd">
					<div class="contact-box">
						<h3>联系我们</h3>
							<table>
								<tr>
									<th>联系地址：</th>
									<td>北京XXXXXXX</td>
								</tr>
								<tr>
									<th>联系电话：</th>
									<td>15201588194</td>
								</tr>
								<tr>
									<th>手机：</th>
									<td>12312412412</td>
								</tr>
								<tr>
									<th>微信公众号：</th>
									<td>ABCDEDF</td>
								</tr>
							</table>
					</div>
					<div class="contact-box">
						<h3>留言给我们</h3>
						<form id= "contact-form" class="contact-form" action="__INDEX__&a=contact"  method="post">
							<ul>
								<li>
								<label for="user-name">姓名：</label>
								<input id="user-name" type="text" name="user-name" placeholder="姓名" class="ipt-txt" />
								</li>
								<li>
									<label for="user-phone">电话：</label>
									<input  id="user-phone" type="text" name="user-phone" placeholder="电话" class="ipt-txt" />
								</li>
								<li>
									<label for="email">邮箱：</label>
									<input  id="email" type="text" name="email" placeholder="邮箱" class="ipt-txt" />
								</li>
								<li>
									<textarea id="user-msg" name="content"  placeholder="留言"></textarea>
								</li>
								<li>
									<input type="submit" class="sub-btn" value="提交" />
								</li>
							</ul>
						</form>
					</div>
				</section>
				<section class="bd">
					
				</section>
			</section>
	
		</section>
		
		<footer id="footer" class="wraper">
			<a href="//13999999999">13999999999</a>
			<p>Copyright © 北京大秦汇通商贸有限公司 </br>Powered by: 大秦汇通</p>
		</footer>
	</section>
	<script src="__PUBLIC__swipe/js/zepto.min.js"></script>
	<script>
	
		$(function(){
			$("#top-menu").tap(function(){
				$("#top-menu-content").toggleClass("h0");
			});
			
			
			//表单验证
			$("#contact-form").submit(function(){
				var b = false;
				var errMsg = {
					"nameNull": "请输入您的名字",
					"nameFormatErr": "名字只 能用 中文、英文、数字、下划线、4-16个字符",
					"phoneNull": "请输入您的联系电话",
					"phoneFormatErr": "联系电话格式错误",
					"emailNull": "请输入您的邮箱",
					"emailFormatErr": "邮箱格式错误",
					"areaNull": "请留言"
				};
				var allReg = {
					"userName": /^[\u4E00-\u9FA5\uf900-\ufa2d\w]{4,16}$/,
					"phone": /^(13[0-9]|15[0|1|2|3|6|7|8|9]|18[0|2|3|5|6|7|8|9])\d{8}$/,
					"email" : /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/
				};
				
			   var oUserNameVal = $.trim($("#user-name").val());
			   var oUserPhoneVal = $.trim($("#user-phone").val());
						 var oEmaiVal = $.trim($("#email").val());
						  var oMsgVal = $.trim($("#user-msg").val());
				

				//验证用户名
				function checkName(){
					if(oUserNameVal == ''){
						alert(errMsg.nameNull);
						return false;
					}
					else if(!allReg.userName.test(oUserNameVal)){
						alert(errMsg.nameFormatErr);
						return false;
					}
					else{
						return true;
					}
				}
				
				//验证电话号码
				function checkPhone(){
					if(oUserPhoneVal == ''){
						alert(errMsg.phoneNull);
						return false;
					}
					else if(!allReg.phone.test(parseInt(oUserPhoneVal))){
						alert(errMsg.phoneFormatErr);
						return false;
					}
					else{
						return true;
					}
				}
				
				//验证Email
				function checkEmail(){
					if(oEmaiVal == ''){
						alert(errMsg.emailNull);
						return false;
					}
					else if(!allReg.email.test(oEmaiVal)){
						alert(errMsg.emailFormatErr);
						return false;
					}
					else{
						return true;
					}
				}
				
				function checkMsg(){
					if(oMsgVal == ''){
						alert(errMsg.areaNull);
						return false;
					}
					else{
						return true;
					}
				}

				b  = checkName() && checkPhone() 	&& 	checkEmail() && checkMsg();
				return b;
			});
			
		});

		
		
	
	</script>
</body>
</html>