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
            <?php if($report==null): ?>暂无举报数据
                <?php else: ?>
            <?php if(is_array($report)): foreach($report as $key=>$v): ?><div>
                    举报者：<?php echo ($v["reporter"]["username"]); ?><br>
                    举报回答内容：<?php echo ($v["answer"]["content"]); ?><br>
                    举报理由：<?php echo ($v["description"]); ?><br>
                    <a href="<?php echo U('Answers/report_del',array('report_id'=>$v['id']));?>">删除</a>
                </div><?php endforeach; endif; endif; ?>
        </div>
    </body>
</html>