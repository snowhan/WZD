<?php
return array(
	'URL_CASE_INSENSITIVE'=>true,
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_NAME'=>'wzd',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PREFIX'=>'wzd_',
	'DB_CHARSET'=>'utf8',
	'URL_HTML_SUFFIX' => '.html',//开启伪静态
	'SHOW_PAGE_TRACE'=>true,
	'TMPL_R_DELIM'=>'}>',//设置模板定界符
	'TMPL_L_DELIM'=>'<{',
	'DEFAULT_CHARSET' => 'utf-8',
	'APP_DEBUG' => true,//开启调试	
	'SESSION_AUTO_START' =>true,//自动开启session
        
        'DEFAULT_MODULE'            =>      'Public',
        'VAR_FILTERS'               =>      'stripslashes,strip_tags,htmlspecialchars',  //全局过滤
        'RBAC_SUPERADMIN'           =>      'admin',   //超级管理员名称
        'ADMIN_AUTH_KEY'            =>      'superadmin',     //超级管理员识别
        'USER_AUTH_ON'              =>      TRUE,       //是否开启验证
        'USER_AUTH_TYPE'            =>      1,        //验证类型（1：登录验证，2：实时验证）
        'USER_AUTH_KEY'             =>      'uid',     //用户认证识别号
        'NOT_AUTH_MODULE'           =>      'Public',      //无需认证的控制器
        'USER_AUTH_GATEWAY'         =>      '/Public/login',// 默认认证网关
        'REQUIRE_AUTH_MODULE'       =>      '',		// 默认需要认证模块
        'NOT_AUTH_ACTION'           =>      '',		// 默认无需认证操作
        'REQUIRE_AUTH_ACTION'       =>      '',		// 默认需要认证操作
        'RBAC_ROLE_TABLE'           =>      'wzd_role',   //角色表名称
        'GUEST_AUTH_ON'             =>      false,    // 是否开启游客授权访问
        'GUEST_AUTH_ID'             =>      0,        // 游客的用户ID
        'RBAC_USER_TABLE'           =>      'wzd_role_user',  //角色与用户的中间表
        'RBAC_ACCESS_TABLE'         =>      'wzd_access',   //权限表名称
        'RBAC_NODE_TABLE'           =>      'wzd_node',       //节点名称
);
?>