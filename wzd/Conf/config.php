<?php
$config = require './config.inc.php';
$array = array(
	'URL_CASE_INSENSITIVE'=>true,
	//'配置项'=>'配置值'
	'URL_HTML_SUFFIX' => '.html',//开启伪静态
	'SHOW_PAGE_TRACE'=>true,
	'DEFAULT_THEME'  => 'Default',//设置默认模板主题
        'TMPL_DETECT_THEME' => true, // 自动侦测模板主题	
	'TMPL_R_DELIM'=>'}>',//设置模板定界符
	'TMPL_L_DELIM'=>'<{',
	'DEFAULT_CHARSET' => 'utf-8',
	'APP_DEBUG' => true,//开启调试	
	'SESSION_AUTO_START' =>true,//自动开启session	

);
return array_merge($config, $array);