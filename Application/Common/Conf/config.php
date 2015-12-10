<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_TEMPLATE_SUFFIX' => '.php',     // 默认模板文件后缀
	
	'DATA_CACHE_COMPRESS'   =>  true,   // 数据缓存是否压缩缓存
	'DATA_CACHE_CHECK'      =>  true,   // 数据缓存是否校验缓存
	'DATA_CACHE_SUBDIR'     =>  true,    // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
	'DATA_PATH_LEVEL'       =>  1,        // 子目录缓存级别
);