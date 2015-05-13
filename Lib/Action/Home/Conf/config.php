<?php
return array(

	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' =>array(
		'__ROOT__' => APP_WEB_URL,
		'__ADMIN__' => APP_WEB_URL.'index.php?m=Home&c=Admin',
		'__NEWS__' => APP_WEB_URL.'index.php?m=News&c=Index',
		'__INDEX__' => APP_WEB_URL.'index.php?m=Home&c=Index',
		'__ITEM__' => APP_WEB_URL.'index.php?m=Item&c=Index',
		'__PUBLIC__' => APP_WEB_URL.'/Public/', // 更改默认的/Public 替换规则
		'__CACHE__' => APP_WEB_URL.'/Cache/',
		'__TEMPLATE__' => APP_WEB_URL.'index.php?m=Template&c=Index',
		'__JS__' => APP_WEB_URL.'/Public/js/', // 增加新的JS类库路径替换规则
		'__UPLOAD__' => APP_WEB_URL.'/Uploads', // 增加新的上传路径替换规则
	)
);

