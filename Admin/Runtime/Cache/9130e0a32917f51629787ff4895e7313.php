<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        a {text-decoration: none;}
    </style>
    <body>
        <div>欢迎回来,
            <strong>
                <?php if(session('username')==C('RBAC_SUPERADMIN')): ?>超级管理员
                <?php else: ?>
                    <?php echo (session('username')); endif; ?>
            </strong></div>
        <div><a target='_top' href="<?php echo U('Public/logout');?>">退出登录</a></div>
    </body>
</html>