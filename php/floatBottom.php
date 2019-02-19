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
				</div>
				<div class="floatForm r" id="demand">				
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