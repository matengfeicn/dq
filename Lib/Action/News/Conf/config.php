<?php
return array(
	//'配置项'=>'配置值'

	'TMPL_PARSE_STRING' =>array(
		'__ADMIN__' => APP_WEB_URL.'index.php?m=Home&c=Admin',
		'__ROOT__' => APP_WEB_URL, // 更改默认的/Public 替换规则
		'__TEMPLATE__' => APP_WEB_URL.'index.php?m=Template&c=Index',
		'__NEWS__' => APP_WEB_URL.'index.php?m=News&c=Index',
		'__ITEM__' => APP_WEB_URL.'index.php?m=Item&c=Index',
		'__PUBLIC__' => APP_WEB_URL.'Public/', // 更改默认的/Public 替换规则
		'__INDEX__' => APP_WEB_URL.'index.php?m=Item&c=Index', // 增加新的JS类库路径替换规则
		'__UPLOAD__' =>APP_WEB_URL. 'Uploads', // 增加新的上传路径替换规则
		'__JS__' => APP_WEB_URL.'Public/js/', // 增加新的JS类库路径替换规则
		'__REAL__' => APP_REAL_URL,
	)
				    /*
	    __ROOT__： 会替换成当前网站的地址（不含域名）
		__APP__： 会替换成当前应用的URL地址 （不含域名）
		    __MODULE__：会替换成当前模块的URL地址 （不含域名）
			__CONTROLLER__（__或者__URL__ 兼容考虑）： 会替换成当前控制器的URL地址（不含域名）
			    __ACTION__：会替换成当前操作的URL地址 （不含域名）
				__SELF__： 会替换成当前的页面URL
				    __PUBLIC__：会被替换成当前网站的公共目录 通常是 /Public/
				     */
);
