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
            <?php if(is_array($info)): foreach($info as $key=>$v): ?><h5>
                    <?php echo ($key); ?>---------<?php echo ($v); ?>
                </h5><?php endforeach; endif; ?>
        </div>
    </body>
</html>