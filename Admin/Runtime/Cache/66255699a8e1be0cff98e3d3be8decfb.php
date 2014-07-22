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
    <body >
        <div>
            <div id='rbac'>
                <h2>RBAC权限控制</h2>
                <a href="<?php echo U('Rbac/user_list');?>" target="right">前台用户列表</a><br/>
                <a href="<?php echo U('Rbac/manager_list');?>" target="right">后台用户列表</a><br/>
                <a href="<?php echo U('Rbac/node_list');?>" target="right">节点列表</a><br/>
                <a href="<?php echo U('Rbac/role_list');?>" target="right">角色列表</a><br/>
            </div>
                    <hr/>
            <div id='asks'>
                <h2>问题</h2>
                <a href="<?php echo U('Asks/asks_list');?>" target="right">问题列表</a><br/>
                <a href="<?php echo U('Asks/asks_report');?>" target="right">问题举报列表</a><br/>
            </div>
                    <hr/>
            <div id="answers">
                <h2>回答</h2>
                <a href='<?php echo U("Answers/answers_list");?>' target="right">回答列表</a><br/>
                <a href="<?php echo U('Answers/answers_report');?>" target="right">回答举报列表</a><br/>
            </div>
                    <hr/>
            <div id='topic'>
                <h2>话题</h2>
                <a href='<?php echo U("Topic/topic_list");?>' target="right">话题列表</a><br/>
            </div>
                    <hr/>
            <div id="tag">
                <h2>标签</h2>
                <a href="<?php echo U('Tag/tag_list');?>" target="right">标签列表</a><br/>
            </div>
                    <hr/>
            <div id='webInfo'>
                <h2>网站信息</h2>
                <a href="<?php echo U('Public/main');?>" target="right">About</a>
            </div>
        </div>
            
    </body>
</html>