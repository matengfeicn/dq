<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' =>array(
		'__ADMIN__' => APP_WEB_URL.'index.php?m=Home&c=Admin',
		'__ITEM__' => APP_WEB_URL.'index.php?m=Item&c=Index',
		'__JS__' => '/Public/js/', // 增加新的JS类库路径替换规则
		'__CSS__' => '/Public/css/', 
		'__IMG__' => '/Public/image/', 
		'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
		'__BLOCK__' => APP_WEB_URL.'index.php?m=Block&c=Index',
		



	)
);
