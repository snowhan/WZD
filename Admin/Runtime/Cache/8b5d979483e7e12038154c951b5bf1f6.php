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
            <form action="__APP__/Rbac/addNode" method="post">
                <?php echo ($type); ?>名称:<input type="text" name="name"><br>
                <?php echo ($type); ?>描述:<input type='text' name="title"><br>
                <?php echo ($type); ?>状态:<input type='text' name='status'><br>
                排序:<input type="text" name="sort">
                <input type='hidden' name='pid' value="<?php echo ($pid); ?>">
                <input type='hidden' name='level' value="<?php echo ($level); ?>">
                <input type='submit' value="submit">
            </form> 
        </div>
    </body>
</html>