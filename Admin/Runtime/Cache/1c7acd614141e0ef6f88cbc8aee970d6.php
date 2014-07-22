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
            <?php if(is_array($answers)): foreach($answers as $key=>$v): ?>回答ID：<?php echo ($v["id"]); ?><br>
                
                        问题标题：<?php echo ($v["getAsk"]["title"]); ?><br>
                
                回答人：<?php echo ($v["uid"]); ?><br>
                回答内容：<?php echo ($v["content"]); ?><br>
                回答时间：<?php echo ($v["createtime"]); ?><br>
                <a href="<?php echo U('Answers/answers_delete',array('ans_id'=>$v['id']));?>">删除回答</a>
                <br><br><?php endforeach; endif; ?>
        </div>
    </body>
</html>