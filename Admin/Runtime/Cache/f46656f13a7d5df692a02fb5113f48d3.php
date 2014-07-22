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
            <a href="<?php echo U('Rbac/addNode');?>">添加应用</a>
            <?php if(is_array($node)): foreach($node as $key=>$app): ?><div>
                    <?php echo ($app["title"]); ?>[<a href="<?php echo U('Rbac/addNode',array('pid'=>$app['id'],'level'=>2));?>">添加控制器</a>]<br>
                </div>
                <br>
                <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): echo ($action["title"]); ?>[<a href="<?php echo U('Rbac/addNode',array('pid'=>$action['id'],'level'=>3));?>">添加方法</a>]<br>
                    <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): echo ($method["title"]); ?>&#160;&#160;<?php if($method['status']!=1): ?><font style="color: red;">被禁用</font><?php endif; ?>&#160;&#160;[<a href='<?php echo U("Rbac/node_manage",array("node_id"=>$method["id"]));?>'>修改</a>][<a href="<?php echo U('Rbac/node_delete',array('node_id'=>$method['id']));?>">删除</a>]<br><?php endforeach; endif; ?>
                    <br><br><br><?php endforeach; endif; endforeach; endif; ?>
        </div>
    </body>
</html>