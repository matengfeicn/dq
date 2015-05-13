<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>控制台 - Bootstrap后台管理系统模版Ace下载</title>
<meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
<meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- basic styles -->

<script src="/Public/js/jquery_1.js"></script>
<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />

<!--[if IE 7]>
      <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->
<!-- page specific plugin styles -->
<!-- fonts -->
<!-- ace styles -->

<link rel="stylesheet" href="/Public/assets/css/ace.css" />
<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />

<!--[if lte IE 8]>
      <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
    <![endif]-->
<!-- inline styles related to this page -->
<!-- ace settings handler -->

<script src="/Public/assets/js/ace-extra.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="/Public/assets/js/html5shiv.js"></script>
    <script src="/Public/assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
try { ace.settings.check('breadcrumbs', 'fixed') } catch (e) { }
		</script>

		<ul class="breadcrumb">
			<li>
			<i class="icon-home home-icon"></i>
			<a target="_blank" href="http://dq/index.php?m=Home&c=Admin&a=addChannel&channelid=<?php echo ($channelid); ?>">增加新频道</a>
			</li>
			<li class="active">控制台</li>
		</ul><!-- .breadcrumb -->

		<div class="nav-search" id="nav-search">
			<form class="form-search">
				<span class="input-icon">
					<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
					<i class="icon-search nav-search-icon"></i>
				</span>
			</form>
		</div><!-- #nav-search -->
	</div>

	<div class="page-content">

		<div class="row">


			<div class="col-sm-5" style="width:100%">
				<div class="widget-box transparent">
					<div class="widget-body">
						<div class="widget-main no-padding">

							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>
											<i class="icon-caret-right blue"></i>
											ID	
										</th>

										<th>
											<i class="icon-caret-right blue"></i>
											频道
										</th>
										<th>
											<i class="icon-caret-right blue"></i>
											操作
										</th>
									</tr>
								</thead>

								<tbody id="channel_list">
								<?php if(is_array($channel)): foreach($channel as $key=>$vo): ?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["title"]); ?></td>
									<td><a target="_blank" href="http://dq/index.php?m=Home&c=Admin&a=detailChannel&channelid=<?php echo ($vo["id"]); ?>">查看子结点</a>  |  <a target="_self" href="http://dq/index.php?m=Home&c=Admin&a=delChannel&channelid=<?php echo ($vo["id"]); ?>">删除</a></td>
								</tr><?php endforeach; endif; ?>

								</tbody>
							</table>
						</div><!-- /widget-main -->
					</div><!-- /widget-body -->
				</div><!-- /widget-box -->
			</div>

		</div>

	</div><!-- /widget-main -->
</div><!-- /widget-body -->
<script src="/Public/assets/js/jquery-2.0.3.min.js"></script>
<!-- <![endif]-->
<!--[if IE]>
    <script src="/Public/assets/js/jquery-1.10.2.min.js"></script>
    <![endif]-->
<!--[if !IE]> -->

<script type="text/javascript">
window.jQuery || document.write("<script src='/Public/assets/js/jquery-2.0.3.min.js'>" + "<" + "script>");
</script>

<!-- <![endif]-->
<!--[if IE]>
    <script type="text/javascript">
     window.jQuery || document.write("<script src='/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
    </script>
    <![endif]-->

<script type="text/javascript">
if ("ontouchend" in document) document.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>" + "<" + "script>");
</script>
<script src="/Public/assets/js/bootstrap.min.js"></script>
<script src="/Public/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->
<!--[if lte IE 8]>
      <script src="/Public/assets/js/excanvas.min.js"></script>
    <![endif]-->

<script src="/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/Public/assets/js/jquery.slimscroll.min.js"></script>
<script src="/Public/assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="/Public/assets/js/jquery.sparkline.min.js"></script>
<script src="/Public/assets/js/flot/jquery.flot.min.js"></script>
<script src="/Public/assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="/Public/assets/js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->

<script src="/Public/assets/js/ace-elements.min.js"></script>
<script src="/Public/assets/js/ace.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
jQuery(function ($) {
$('#recent-box [data-rel="tooltip"]').tooltip({ placement: tooltip_placement });
function tooltip_placement(context, source) {
	var $source = $(source);
	var $parent = $source.closest('.tab-content')
		var off1 = $parent.offset();
	var w1 = $parent.width();

	var off2 = $source.offset();
	var w2 = $source.width();

	if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
	return 'left';
}


$('.dialogs,.comments').slimScroll({
height: '300px'
});


//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
//so disable dragging when clicking on label
var agent = navigator.userAgent.toLowerCase();
if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
$('#tasks').on('touchstart', function (e) {
		var li = $(e.target).closest('#tasks li');
		if (li.length == 0) return;
		var label = li.find('label.inline').get(0);
		if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
		});

$('#tasks').sortable({
opacity: 0.8,
revert: true,
forceHelperSize: true,
placeholder: 'draggable-placeholder',
forcePlaceholderSize: true,
tolerance: 'pointer',
stop: function (event, ui) {            //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
$(ui.item).css('z-index', 'auto');
}
}
);
$('#tasks').disableSelection();
$('#tasks input:checkbox').removeAttr('checked').on('click', function () {
		if (this.checked) $(this).closest('li').addClass('selected');
		else $(this).closest('li').removeClass('selected');
		});


})
</script>