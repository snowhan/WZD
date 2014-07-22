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
    <body>
        <h3>角色列表</h3>
        <div>
            <?php if(is_array($role)): foreach($role as $key=>$v): echo ($v["id"]); ?>-----<?php echo ($v["name"]); ?>------<?php echo ($v["remark"]); ?>-----状态:<?php if($v["status"]==1): ?>正常<?php else: ?>禁用<?php endif; ?>&#160;&#160;&#160;<a href="<?php echo U('Rbac/role_manage',array('role_id'=>$v['id']));?>">编辑</a>&#160;&#160;&#160;<a href="<?php echo U('Rbac/accessManage',array('role_id'=>$v['id']));?>">配置权限</a><br><?php endforeach; endif; ?>
        </div>
        <a href="<?php echo U('Rbac/addRole');?>">添加角色</a>
    </body>
</html>