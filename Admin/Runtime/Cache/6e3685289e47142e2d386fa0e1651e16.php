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
        <?php if($tags==null): ?>暂无标签
                <?php else: ?>
            <?php if(is_array($tags)): foreach($tags as $key=>$v): ?><div>
                    标签ID：<?php echo ($v["id"]); ?><br>
                    创建者：<?php echo ($v["user"]["username"]); ?><br>
                    标签名：<?php echo ($v["tagname"]); ?><br>
                    <a href="<?php echo U('Tag/tag_delete',array('tag_id'=>$v['id']));?>">删除</a><br>
                </div>
                <hr/><?php endforeach; endif; endif; ?>
        </div>
    </body>
</html>