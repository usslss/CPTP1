		<script type="text/javascript" >
			//留言
			$(function(){
 			$("#applyMsg").click(function(){
  			var cont1 = $("#applyForm").serialize();
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
		  
		<div class="fillinCon" id="demand">
			<form id="applyForm">
				<div class="rowTitle">
					<p><i></i><span>加盟<?php echo $website; ?></span></p>
				</div>
				<div class="rowInput"><label><span>请填写您的姓名</span><input type="text" class="txt w1 name"  name="dataYourName"></label></div>
				<div class="rowInput"><label><span>请填写您的联系方式</span><input type="text" class="txt w1 phone"  name="dataYourTel"></label></div>
				<div class="rowInput"><label><span>请填写您的邮箱地址</span><input type="text" class="txt w1 phone"  name="dataMailBox"></label></div>
				<div class="rowInput"><label><span>请填写您的QQ/微信</span><input type="text" class="txt w1 phone"  name="dataQQ"></label></div>
				<div class="rowInput"><label><span>请填写您的加盟需求！</span><textarea style="resize:none"  class="txt w3" name="dataContent"></textarea></label></div>
				<div class="row">
					<a href="javascript:void(0)" class="btn" style="text-align:center" id="applyMsg">立即预约</a>	
				</div>
				<div class="clear"></div>
			</form>
		</div>