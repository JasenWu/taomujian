/// <reference path="../Core/jquery-1.8.2.min.js" />
// CREAT BY 吴兴省    13127952680
//=======================================
  	$(function(){
		$(".JS_products_nav li").each(function(){
			$(this).click(function(){
					var index = $(this).index();
					$(this).siblings().find("a").removeClass("on");
					$(this).find("a").addClass("on");
					
					
					$(".JS_show_products li").removeClass("on");
					$(".JS_show_products li").eq(index).addClass("on");
					//alert(index);
				
				});
			
			});
		});
		
		
		
		//处理后台上传上来的图片路长问题
		//$(function(){
		//	$(".JS_show_products img").each(function(){
		//		var src = $(this).attr("src");
		//			src =src.split("/");
		//			src = src[1] + "/"+ src[2] + "/"+ src[3];
		//			$(this).attr("src",src);
		//
		//
		//	});
		//
		//	});
		