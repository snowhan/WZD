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
            <?php if(is_array($user)): foreach($user as $key=>$v): ?><div>
                    账号:<?php echo ($v["username"]); ?><br>
                    真名:<?php echo ($v["realname"]); ?><br>
                    邮箱:<?php echo ($v["email"]); ?><br>
                    状态:<?php if($v["status"]==1): ?>正常
                        <a href="<?php echo U('Rbac/user_manage',array('uid'=>$v['id'],'status'=>0,'ori'=>1));?>">关进小黑屋</a>
                        <?php else: ?>被关进小黑屋了
                        <a href="<?php echo U('Rbac/user_manage',array('uid'=>$v['id'],'status'=>1,'ori'=>0));?>">从小黑屋放出来</a><?php endif; ?><br>
                </div>
                <br><br><?php endforeach; endif; ?>
            
        </div>
    </body>
</html>