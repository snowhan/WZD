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
            <?php if(is_array($manager)): foreach($manager as $key=>$v): ?><div>
                    ID:<?php echo ($v["id"]); ?><br>
                    用户名:<?php echo ($v["username"]); ?><br>
                    用户所属组别:
                        <?php if($v['username']==C('RBAC_SUPERADMIN')): ?>superadmin     |       超级管理员
                        <?php else: ?>
                            <?php if(is_array($v["role"])): foreach($v["role"] as $key=>$value): echo ($value["name"]); ?>     |       <?php echo ($value["remark"]); endforeach; endif; endif; ?>
                    
                    <br>
                    状态:
                    <?php if($v['username']!=C('RBAC_SUPERADMIN')): if($v["status"]==1): ?>正常
                            <?php else: ?>禁用<?php endif; ?>
                        <a href="<?php echo U('Rbac/manager_manage',array('uid'=>$v['id']));?>">编辑用户</a>
                        <br>
                    <?php else: ?>
                    正常<?php endif; ?>
                </div>
                <br><br><?php endforeach; endif; ?>
            <a href="<?php echo U('Rbac/addManager');?>">添加管理员</a>
        </div>
    </body>
</html>