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
            <?php if(is_array($asks)): foreach($asks as $key=>$v): ?>问题ID：<?php echo ($v["id"]); ?><br>
                创建者：<?php echo ($v["creator"]["username"]); ?><br>
                回答数：<?php echo ($v["replys"]); ?><br>
                问题标题：<?php echo ($v["title"]); ?><br>
                问题内容：<?php echo ($v["content"]); ?><br>
                问题创建时间：<?php echo ($v["createtime"]); ?><br>
                <a href="<?php echo U('Asks/asks_delete',array('ask_id'=>$v['id']));?>">删除问题</a>
                <hr>
                <br><br><?php endforeach; endif; ?>
        </div>
    </body>
</html>