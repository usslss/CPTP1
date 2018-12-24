$(function () {
	
	//banner
		jQuery(".Banner").hover(function() {
	jQuery(this).find(".prev,.next").stop(true,true).fadeTo("show",1) }
	,function() {
		jQuery(this).find(".prev,.next").fadeOut() }
	);
		jQuery(".Banner").slide( {
		titCell:".hd ul", mainCell:".bd ul", effect:"fold", autoPlay:true, autoPage:true, trigger:"click",	startFun:function(i) {
		var curLi = jQuery(".Banner .bd li").eq(i);
		if( !!curLi.attr("_src") ) {
		curLi.css("background-image",curLi.attr("_src")).removeAttr("_src")	}
	}	}
	);
	

	//预约留言
	jQuery("#demand .txt").each(function(){
		var thisVal=jQuery(this).val();
	
		if(thisVal!=""){
				jQuery(this).siblings("span").hide();
			}else{
				jQuery(this).siblings("span").show();
			}
	
		jQuery(this).focus(function(){
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
	
	
	//float
	$('.floatCloseMenu').bind('click', function() {
		$(".floatBottom").animate({
			'left': '-100%'
		}, 500, function() {
			$(".floatClose").animate({
				'left': '0'
			}, 100);
			$.cookie('Stute', '0', { path: "/"});
		});
	});
	$(".floatClose").bind('click', function() {
		$(".floatClose").animate({
			'left': '-130px'
		}, 100, function() {
			$(".floatBottom").animate({
				'left': '0'
			}, 500);
			$.cookie('Stute', '1', { path: "/"});
		});
	});
    $(window).scroll(function() {
        var topBar = $(window).scrollTop();
        var bodyHeigth = (document.body.scrollHeight) * 0.01;
        if (topBar > bodyHeigth) {
            $(".floatBottom,.floatClose").fadeIn();
        } else {
            $(".floatBottom,.floatClose").fadeOut();
        }
	});
	




})

