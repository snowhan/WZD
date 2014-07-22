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
            <?php if($topic==null): ?>暂无主题数据
                <?php else: ?>
            <?php if(is_array($topic)): foreach($topic as $key=>$v): ?><div>
                    话题ID：<?php echo ($v["id"]); ?><br>
                    问题数：<?php echo ($v["questions"]); ?><br>
                    话题题目：<?php echo ($v["topicname"]); ?><br>
                    话题描述：<?php echo ($v["description"]); ?><br>
                    <a href="<?php echo U('Topic/topic_delete',array('topic_id'=>$v['id']));?>">删除</a>
                </div><?php endforeach; endif; endif; ?>
        </div>
    </body>
</html>