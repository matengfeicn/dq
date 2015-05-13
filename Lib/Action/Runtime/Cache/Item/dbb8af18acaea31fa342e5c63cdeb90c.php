<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv=Content-Type content="text/html;charset=utf-8"/>
<script src="http://dq/Public/js/jquery_1.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://dq/Public/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://dq/Public/js/ueditor/ueditor.all.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://dq/Public/js/ueditor/lang/zh-cn/zh-cn.js"></script>


    <link href="http://dq/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://dq/Public/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <!-- page specific plugin styles -->
    <!-- fonts -->
    <!-- ace styles -->

    <link rel="stylesheet" href="http://dq/Public/assets/css/ace.css" />
    <link rel="stylesheet" href="http://dq/Public/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="http://dq/Public/assets/css/ace-skins.min.css" />

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->
    <!-- inline styles related to this page -->
    <!-- ace settings handler -->

    <script src="http://dq/Public/assets/js/ace-extra.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
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
                            <a href="#">首页</a>
                        </li>
                        <li class="active">生成</li>
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
                    <div class="page-header">
                        <h1>
				生成后台
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="alert alert-block alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <i class="icon-remove"></i>
                                </button>

                                <i class="icon-ok green"></i>

                                欢迎使用
                                <strong class="green">
                                    Ace后台管理系统
                                    <small>(v1.2)</small>
                                </strong>
                                ,轻量级好用的后台管理系统模版.
                            </div>

                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
							<form name="form1" action="http://dq/index.php?m=Item&c=Index&a=doChange&id=<?php echo ($data["id"]); ?>" method="post" enctype="multipart/form-data">
                                                <table class="table table-bordered table-striped">

							<tbody>
							<tr>
								<td>名称:</td><td><input name="title" value="<?php echo ($data[title]); ?>"/></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php if(is_array($image_url)): foreach($image_url as $key=>$vo): ?><div style="width:200px:height:100px;float:left"><img style="width:150px;height:200px" src="<?php echo ($vo); ?>"/></div><?php endforeach; endif; ?>
								</td>
							</tr>
							<tr>
								<tr>
									<td><input type="file" name="file[]"/></td>
									<td><input type="button" id="add_file" value='增加'/></td>
								</tr>
							</tr>

							<tr>
								<td>价格:</td><td><input name="price" value="<?php echo ($data[price]); ?>"/></td>
							</tr>

							<tr>
								<td>销售总量:</td><td><input name="sold_total" value="<?php echo ($data[sold_total]); ?>"/></td>
							</tr>
							<tr>
								<td>总量:</td><td><input name="total" value="<?php echo ($data[total]); ?>"/></td>
							</tr>
							<tr id="table_tr">
								<td>表格</td>
								<td>
									<select name="table_item_id" onchange="getTableItem()" id="table_select">
										<?php if(is_array($table_s)): foreach($table_s as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; ?>

									</select>
									| <a target="_blank" href="http://dq/index.php?m=Item&c=Index&a=addTable">新增表格</a>
								</td>
							</tr>

							<?php if(is_array($table_info)): foreach($table_info as $key=>$vo): ?><tr class='new_tr'><td><?php echo ($vo['title']); ?></td><td><input name='item[<?php echo ($key); ?>]' value="<?php echo ($vo[content]); ?>"/></td></tr><?php endforeach; endif; ?>
							<script>

var item_table_id='<?php echo ($item_table_id); ?>';
$("#table_select option").each(function(){
		if($(this).val()==item_table_id){
		$(this).attr("selected","selected");
		}
		
		})
function getTableItem(){
	var _this=$("#table_select");
	var option=_this.find("option:selected").val();
	$.ajax({
data:{"table_item_id":option},
dataType:"json",
url:"http://dq/index.php?m=Item&c=Index&a=getTableItem&jsonpcallback=?",
type:"get",
success:function(data){
$(".new_tr").remove();

var str="";
$.each(data,function(k,v){
	str+="<tr class='new_tr'><td>"+v+"</td><td><input name='item["+k+"]'/></td></tr>";
	});
$("#table_tr").after(str);
}

});
}



				</script>
				<tr>
					<td colspan="2">
						<div>
							<script id="editor" type="text/plain" style="width:1024px;height:500px;"><?php echo ($vo["content"]); ?></script>
						</div>
					</td>

				</tr>
				<tr>
					<td>

						<input type="button" onclick="form_submit()"value="提交"/></td>
				</tr>
				<div style="display:none"><textarea name="content" id="textarea_content"></textarea></div>
				</tbody>


			</table>
		</form>




	</div><!-- /widget-main -->
</div><!-- /widget-body -->
			</div><!-- /widget-box -->
		</div>


	</div><!-- /.col -->
</div><!-- /.row -->
		</div><!-- /.page-content -->
	    </div><!-- /.main-content -->
<script>
function form_submit(){
	var content=getContent();
	$("#textarea_content").html(content);
	form1.submit();
}
$("#add_file").click(function(){
		$(this).parent().siblings().append('<input type="file" name="file[]"/>');
		})

</script>











<script type="text/javascript">

//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');


function isFocus(e){
	alert(UE.getEditor('editor').isFocus());
	UE.dom.domUtils.preventDefault(e)
}
function setblur(e){
	UE.getEditor('editor').blur();
	UE.dom.domUtils.preventDefault(e)
}
function insertHtml() {
	var value = prompt('插入html代码', '');
	UE.getEditor('editor').execCommand('insertHtml', value)
}
function createEditor() {
	enableBtn();
	UE.getEditor('editor');
}
function getAllHtml() {
	alert(UE.getEditor('editor').getAllHtml())
}
function getContent() {
	var arr = [];
	// arr.push("使用editor.getContent()方法可以获得编辑器的内容");
	//arr.push("内容为：");
	arr.push(UE.getEditor('editor').getContent());
	return arr.join("\n");
}
function getPlainTxt() {
	var arr = [];
	arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
	arr.push("内容为：");
	arr.push(UE.getEditor('editor').getPlainTxt());
	alert(arr.join('\n'))
}
function setContent(isAppendTo) {
	var arr = [];
	arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
	UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
	alert(arr.join("\n"));
}
function setDisabled() {
	UE.getEditor('editor').setDisabled('fullscreen');
	disableBtn("enable");
}

function setEnabled() {
	UE.getEditor('editor').setEnabled();
	enableBtn();
}

function getText() {
	//当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
	var range = UE.getEditor('editor').selection.getRange();
	range.select();
	var txt = UE.getEditor('editor').selection.getText();
	alert(txt)
}

function getContentTxt() {
	var arr = [];
	arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
	arr.push("编辑器的纯文本内容为：");
	arr.push(UE.getEditor('editor').getContentTxt());
	alert(arr.join("\n"));
}
function hasContent() {
	var arr = [];
	arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
	arr.push("判断结果为：");
	arr.push(UE.getEditor('editor').hasContents());
	alert(arr.join("\n"));
}
function setFocus() {
	UE.getEditor('editor').focus();
}
function deleteEditor() {
	disableBtn();
	UE.getEditor('editor').destroy();
}
function disableBtn(str) {
	var div = document.getElementById('btns');
	var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
	for (var i = 0, btn; btn = btns[i++];) {
		if (btn.id == str) {
			UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
		} else {
			btn.setAttribute("disabled", "true");
		}
	}
}
function enableBtn() {
	var div = document.getElementById('btns');
	var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
	for (var i = 0, btn; btn = btns[i++];) {
		UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
	}
}

function getLocalData () {
	alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
}

function clearLocalData () {
	UE.getEditor('editor').execCommand( "clearlocaldata" );
	alert("已清空草稿箱")
}
</script>
</body>
</html>