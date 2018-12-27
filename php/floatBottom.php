			<script type="text/javascript" >
			//留言
			$(function(){
 			$("#msg").click(function(){
  			var cont1 = $("#msgform").serialize();
 	 		$.ajax({
  		  		url:'php/msg.php',
  		  		type:'post',
  		  		dataType:'text',
  		  		data:cont1,
  		  		success:function(result){
  		  	  		alert(result);
  	 	 	  		}
  			});
  			});
  			});
  		    </script>
<div class="floatBottom">
			<div class="floatCont">
				<div class="tltle l">
					<div class="img"></div>
					<div class="con">
						<p><?php echo $website; ?>加盟招商会</p>
						<span>登记预约将在24小时内回电确认并发资料<br/>加盟咨询热线<i><?php echo $infoArr[$website]["tel"]; ?></i></span>
					</div>
				</div>
				<div class="erweima r">
					<img src="picture/erweima.jpg" width="120px" height="120px" />
					<p>扫<br/>码<br/>关<br/>注<br/>我<br/>们</p>
				</div>
				<div class="floatForm r" id="demand">
					<div class="top">今日已有<span><?php echo $infoArr[$website]["jmsum"]; ?></span>人获得<?php echo $website; ?>招商资料</div>
					<form id="msgform">
						<div class="row l">
							<input type="text" class="txt" name="username_h" placeholder="填写您的姓名">
							<input type="text" class="txt" name="tel_h" placeholder="填写您的联系方式">
						</div>
						<p><a href="javascript:void(0)" class="buttonX" id="msg">立刻提交</a></p>
						
					</form>
				</div>
			</div>
			<div class="floatCloseMenu">
				<a href="javascript:;"></a>
			</div>
		</div>
		<div class="floatClose"></div>