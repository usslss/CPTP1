$(function () {

	//nav
	var menuRight = document.getElementById('cbp-right'),
	body = document.body;
	showRight.onclick = function() {
		classie.toggle(this, 'active');
		classie.toggle(menuRight, 'cbp-spmenu-open');
		disableOther('showRight')
	};
	function disableOther(button) {
		if (button !== 'showRight') {
			classie.toggle(showRight, 'disabled')
		}
	}
	
	
	//nav
	$(".subNav").click(function(){
		$(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(300);
	})	
	
	
	//newsList
	TouchSlide({ slideCell:"#newsList",
		endFun:function(i){ //高度自适应
			var bd = document.getElementById("newsbd");
			bd.parentNode.style.height = bd.children[i].children[0].offsetHeight+"px";
			if(i>0)bd.parentNode.style.transition="200ms";//添加动画效果
		}
	});
	
	//banner
	TouchSlide({ 
        slideCell:"#banner" ,
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul", 
        effect:"leftLoop", 
        autoPage:true,//自动分页
        autoPlay:true,//自动播放
		interTime : 5000
    });
		

	
		
	$.fn.myScroll = function(options){
	var defaults = {
		speed:100,  
		rowHeight:30 
	};
	
	var opts = $.extend({}, defaults, options),intId = [];
	
	function marquee(obj, step){
	
		obj.find("ul").animate({
			marginTop: '-=1'
		},0,function(){
				var s = Math.abs(parseInt($(this).css("margin-top")));
				if(s >= step){
					$(this).find("li").slice(0, 1).appendTo($(this));
					$(this).css("margin-top", 0);
				}
			});
		}
		
		this.each(function(i){
			var sh = opts["rowHeight"],speed = opts["speed"],_this = $(this);
			intId[i] = setInterval(function(){
				if(_this.find("ul").height()<=_this.height()){
					clearInterval(intId[i]);
				}else{
					marquee(_this, sh);
				}
			}, speed);

			_this.hover(function(){
				clearInterval(intId[i]);
			},function(){
				intId[i] = setInterval(function(){
					if(_this.find("ul").height()<=_this.height()){
						clearInterval(intId[i]);
					}else{
						marquee(_this, sh);
					}
				}, speed);
			});
		
		});

	}
	
	
	
	//
	$("#demand .txt").each(function(){
	var thisVal=jQuery(this).val();
	
	if(thisVal!=""){
			jQuery(this).siblings("span").hide();
		}else{
			jQuery(this).siblings("span").show();
		}
	
	$(this).focus(function(){
			jQuery(this).siblings("span").hide();
		}).blur(function(){
				var val=jQuery(this).val();
				if(val!=""){
					jQuery(this).siblings("span").hide();
				}else{
					jQuery(this).siblings("span").show();
				}	
		});
	})
	


})









