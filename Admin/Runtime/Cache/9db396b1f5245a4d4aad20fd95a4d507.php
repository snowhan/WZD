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
        <a href='<?php echo U("Rbac/manager_manage");?>'></a>
        <div>
            <form action="<?php echo U('Rbac/manager_manage');?>" method="post">
                <input type="hidden" name="uid" value="<?php echo ($user["id"]); ?>">
                状&#160;&#160;态:<input type='text' name="status" value="<?php echo ($user["status"]); ?>">
                所属角色：<select name="role_id[]">
                    <?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                </select>
                <input type='submit' value="保存">
            </form>
        </div>
    </body>
</html>