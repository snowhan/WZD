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
        <div>
            <form action="<?php echo U('Rbac/role_manage');?>" method="post">
                <input type='hidden' name='role_id' value="<?php echo ($role["id"]); ?>">
                英文名:<input type='text' name='name' value="<?php echo ($role["name"]); ?>">
                状态:<input type='text' name="status" value="<?php echo ($role["status"]); ?>">
                中文名:<input type='text' name="remark" value="<?php echo ($role["remark"]); ?>">
                <input type='submit' value="保存">
            </form>
        </div>
    </body>
</html>