$(function(){
	    $('.dept_select').chosen();	   	   
				
		//全选
		$("#searchall").click(function(){
			$("#tablediv :checkbox").prop("checked", true);
		});	
		//反选
		$("#serachreall").click(function(){
			$("#tablediv :checkbox").each(function () { 				
                $(this).prop("checked", !$(this).prop("checked"));  
            });  
		});	
		//删除
		$("#searchdel").click(function(){
			del();
		});
		function del(){
			if(confirm('你确定要删除选中项?')){
				var form = document.getElementById("delForm");
				form.submit();
			}
		}
		//新增
			
	});	