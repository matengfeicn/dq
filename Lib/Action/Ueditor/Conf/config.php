<?php
return array(
	//'配置项'=>'配置值'

	'TMPL_PARSE_STRING' =>array(
		'__ROOT__' => APP_WEB_URL, // 更改默认的/Public 替换规则
		'__INDEX__' => 'index.php?m=Item&c=Index', // 增加新的JS类库路径替换规则
		'__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
		'__JS__' => '/Public/js/', // 增加新的JS类库路径替换规则
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
