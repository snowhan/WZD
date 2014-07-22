$(document).ready(
	function(){
		$(".login_title").click(function(){
			$(".register_form").css({"display":"none"});
			$(".login_form").css({"display":"block"})
		})
		$(".register_title").click(function(){
			$(".register_form").css({"display":"block"});
			$(".login_form").css({"display":"none"})
		})
	}
);



	// $(".nav_top_profile, .dropdown-menu").mouseover(function(){
	// 	alert("okok");
	// 	$(".dropdown-menu").css("display","block");
	// });
