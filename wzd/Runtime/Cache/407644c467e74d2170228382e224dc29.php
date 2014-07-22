<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script src="__PUBLIC__/js/jquery.js"></script>
</head>
<script>
	function reportask(ask_id){		
		$.post("__APP__/report/add",{type:"ask",ask_id:ask_id},
			function(data){
				alert(data)
		},"json");
	}

	function reportanswer(answer_id){		
		$.post("__APP__/report/add",{type:"answer",answer_id:answer_id},
			function(data){
				alert(data)
		},"json");
	}

	function focusask(ask_id){
		$.post("__APP__/focus/add",{type:"ask",ask_id:ask_id},
				function(data){
					alert(data)
			},"json");
	}

	function follow(obj,answer_id){
		$.post("__APP__/answers/followlist",{answer_id:answer_id},
				function(data){
					if(data==0){
						$(obj).after('<div style="border:1px solid red"><h4>暂时没有评论</h4>评论:<input type="text"><button onclick="fol(this,'+answer_id+',0)">提交</button></div>');
					}else{
						var str="";
						var center="";
						for(var i=0; i<data.length;i++){
							if(data[i].othername==null){
								center="说:"				
							}else{
								center="评论:"+data[i].othername;	
							}
							str +=data[i].realname+center+'<br>'+data[i].content+'<input type="text"><button onclick="fol(this,'+answer_id+','+data[i].id+')">回复</button><hr>';
						}
						$(obj).after("<br><hr>"+str+'评论:<input id="fol" type="text"><button onclick="fol(this,'+answer_id+',0)">提交</button></div>');
					}
			},"json");
	}	

	function fol(obj,answer_id,pid){
		var val = $(obj).prev("input").val();
		
		$.post("__APP__/answers/followadd",{answer_id:answer_id,pid:pid,content:val},
				function(data){
					alert(data);
			},"json");
	}
</script>
<body>
	你好<?php echo $_SESSION['username']; ?>
	<a href="__APP__/public/login">登陆</a>
	<a href="__APP__/public/logout">登出</a>
	<a href="__APP__/number/index">个人中心</a>
	<a href="__APP__/Index/askinfo">问题广场</a>
	<hr><p>
		<button onclick="reportask(<?php echo ($question['id']); ?>)">举报该问题</button>
		<button onclick="focusask(<?php echo ($question['id']); ?>)">关注该问题</button>
		id:<h1 id="question"><?php echo ($question['id']); ?></h1>
		标题:<?php echo ($question['title']); ?><br>
		是否匿名:<?php echo ($question['anonymous']); ?><br>
		用户id:<?php echo ($question['uid']); ?><br>
		查看次数:<?php echo ($question['view']); ?><br>
		回答数:<?php echo ($question['replys']); ?><br>
		名字:<?php echo ($question['realname']); ?><br>
		头像:<?php echo ($question['logo']); ?><br>	
		<p>答案:<?php echo ($question['content']); ?></p>	
		标签：
		<?php if(is_array($question['tags'])): $i = 0; $__LIST__ = $question['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; echo ($tag["tagname"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
   		 所属话题:<br>
   		 <?php if(is_array($question['topics'])): $i = 0; $__LIST__ = $question['topics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i; echo ($tag["topicname"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
   		 <?php if(is_array($question['answers'])): $i = 0; $__LIST__ = $question['answers'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$answer): $mod = ($i % 2 );++$i;?><hr>
   		 	<div>
   		 		答案：<?php echo ($answer['content']); ?> <br>
   		 		名字：<?php echo ($answer['realname']); ?><br>
   		 		<img src="<?php echo ($answer['logo']); ?>"><br>
   		 		点赞数：<?php echo ($answer['praise']); ?><button onclick="review('praise',<?php echo ($answer['id']); ?>)">点赞</button><br>
   		 		点踩数：<?php echo ($answer['hate']); ?><button onclick="review('hate',<?php echo ($answer['id']); ?>)">点踩</button><br>
   		 		没有帮助：<?php echo ($answer['useless']); ?><button onclick="review('useless',<?php echo ($answer['id']); ?>)">点没有帮助</button><br>
   		 		回答时间：<?php echo ($answer['createtime']); ?><br>
   		 		评论数:<?php echo ($answer['follows']); ?><button onclick="follow(this,<?php echo ($answer['id']); ?>)">评论</button><br>   
   		 		<button onclick="testshow(<?php echo ($answer['id']); ?>)">收藏</button>
   		 		<button onclick="reportanswer(<?php echo ($answer['id']); ?>)">举报</button>   		 				  		 	
   		 	</div><?php endforeach; endif; else: echo "" ;endif; ?>
   		 </p>	
   		 <hr>
   		 是否匿名:<input id="anonymous" type="checkbox" name="anonymous">
   		 <textarea id="answer" name="answer"></textarea>
   		 <button onclick="answer()">提交</button>
   		 
   		 <div id="test" style="display:none;border:red 1px solid;position:absolute;top:100px;left:400px;width:500px;height:500px;">
   		 	<a href="javascript:void(0)" style="float:right" onclick="testhide()">X关闭</a><br>
   		 	请选择收藏夹<br>
   		 	<?php if(is_array($fav)): $k = 0; $__LIST__ = $fav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fav): $mod = ($k % 2 );++$k; echo ($fav['ftitle']); ?><input type="checkbox" name="favorite_id" value="<?php echo ($fav['fid']); ?>"><br><?php endforeach; endif; else: echo "" ;endif; ?>
   		 	<input id="answer_id" type="hidden" value="" name="answer_id">
   		 	<button onclick="favorite()">收藏</button>
   		 </div>
</body>
<script>
	function testshow(answer_id){
		$("#answer_id").val(answer_id);		
		$("#test").show();		
	}

	function testhide(){
		$("#test").hide();
		return false;
	}
	
	function favorite(){
		var answer_id = $("#answer_id").val();
		var favorite_id = [];
		var i = 0;
		$("input[name='favorite_id']").each(function(){
			if($(this).prop("checked")){
				favorite_id[i] = $(this).val();
				i++;		
			}	
		});
		
		$.post("__APP__/favorite/add",{answer_id:answer_id,favorite_id:favorite_id},
				function(data){
					alert(data);				
			},"json");
	}

	function answer(){
		var val = $("#answer").val();
		var anonymous = $("#anonymous").prop("checked") ? 1:0;		
		var askid = $("#question").text();
		$.post("__APP__/answers/add",{ask_id:<?php echo ($question['id']); ?>,answer:val,anonymous:anonymous},
			function(data){
				alert(data.uid);				
		},"json");
	}

	function review(type,answer_id){		
		$.post("__APP__/answers/evaluate",{type:type,answer_id:answer_id},
			function(data){
				alert(data);				
		},"json");
	}	
</script>
</html>