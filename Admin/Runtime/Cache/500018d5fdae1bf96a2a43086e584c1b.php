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
        <a href="<?php echo U('Rbac/node_list');?>">返回节点列表</a>
        <div>
            <form action="<?php echo U('Rbac/node_manage');?>" method="post">
                <input type="hidden" name='node_id' value="<?php echo ($node["id"]); ?>">
                <?php echo ($type); ?>名称:<input type="text" name="name" value="<?php echo ($node["name"]); ?>"><br>
                <?php echo ($type); ?>描述:<input type='text' name="title" value='<?php echo ($node["title"]); ?>'><br>
                <?php echo ($type); ?>状态:<input type='text' name='status' value="<?php echo ($node["status"]); ?>"><br>
                排序:<input type="text" name="sort" value="<?php echo ($node["sort"]); ?>">
                <input type='submit' value="保存">
            </form>
        </div>
    </body>
</html>