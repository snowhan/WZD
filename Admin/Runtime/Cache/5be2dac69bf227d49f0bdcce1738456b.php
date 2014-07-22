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
            <a href="<?php echo U('Rbac/role_list');?>">返回</a>
            <?php if($node!=false): ?><form action='<?php echo U("Rbac/accessManage");?>' method="post">
                <?php if(is_array($node)): foreach($node as $key=>$app): ?><div>
                        <?php echo ($app["title"]); ?><input type='checkbox' value="<?php echo ($app["id"]); ?>_1" name="access[]" <?php if($app['access']): ?>checked='checked'<?php endif; ?>><br>
                    </div>
                    <br>
                    <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): echo ($action["title"]); ?><input type="checkbox" name='access[]' value="<?php echo ($action["id"]); ?>_2" <?php if($action['access']): ?>checked='checked'<?php endif; ?>><br>
                        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): echo ($method["title"]); ?><input type='checkbox' name="access[]" value="<?php echo ($method["id"]); ?>_3" <?php if($method['access']): ?>checked='checked'<?php endif; ?>><br><?php endforeach; endif; ?>
                        <br><br><br><?php endforeach; endif; endforeach; endif; ?>
                    <input type="hidden" value="<?php echo ($role_id); ?>" name="role_id">

                    <input type='submit' value="保存">

                </form><?php endif; ?>
        </div>
    </body>
</html>