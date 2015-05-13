<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'  =>array(
		//'__PUBLIC__' => '/Public/', // 更改默认的/Public 替换规则
		//'__JS__' => '/Public/JS/', // 增加新的JS类库路径替换规则
		//'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则

		'__ROOT__' => APP_WEB_URL,
		'__ADMIN__' => APP_WEB_URL.'index.php?g=Home&m=Admin',
		'__NEWS__' => APP_WEB_URL.'index.php?g=News&m=Index',
		'__INDEX__' => APP_WEB_URL.'index.php?g=Home&m=Index',
		'__ITEM__' => APP_WEB_URL.'index.php?g=Item&m=Index',
		'__BLOCK__' => APP_WEB_URL.'index.php?g=Block&m=Index',
		'__PUBLIC__' => APP_WEB_URL.'/Public/', // 更改默认的/Public 替换规则
		'__CACHE__' => APP_WEB_URL.'/Cache/',
		'__TEMPLATE__' => APP_WEB_URL.'index.php?g=Template&m=Index',
		'__JS__' => APP_WEB_URL.'/Public/js/', // 增加新的JS类库路径替换规则
		'__UPLOAD__' => APP_WEB_URL.'/Uploads', // 增加新的上传路径替换规则



	)
);
?>
