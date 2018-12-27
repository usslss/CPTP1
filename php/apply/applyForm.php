			<script type="text/javascript" >
			//留言
			$(function(){
 			$("#applyMsg").click(function(){
  			var cont1 = $("#applyForm").serialize();
 	 		$.ajax({
  		  		url:'php/apply/applyMsg.php',
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
					<div class="Title">如果您对该项目感兴趣,请<span>留言咨询</span>！</div>
					<form id="applyForm">
						<div class="rowCon">
							<div class="rowInput" style=" margin-right:30px;">
								<div class="rowLeft">您的姓名：</div>
								<div class="rowRight"><label><span>请填写您的姓名</span><input type="text" class="txt w1"  name="dataYourName"></label></div>
								<div class="clear"></div>
							</div>
							<div class="rowInput">
								<div class="rowLeft">联系方式：</div>
								<div class="rowRight"><label><span>请填写您的联系方式</span><input type="text" class="txt w1"  name="dataYourTel"></label></div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="rowCon">
							<div class="rowInput" style=" margin-right:30px;">
								<div class="rowLeft">您的邮箱：</div>
								<div class="rowRight"><label><span>请填写您的邮箱地址</span><input type="text" class="txt w1"  name="dataMailBox"></label></div>
								<div class="clear"></div>
							</div>
							<div class="rowInput">
								<div class="rowLeft">QQ/微信：</div>
								<div class="rowRight"><label><span>请填写您的QQ/微信</span><input type="text" class="txt w1"  name="dataQQ"></label></div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="rowInput">
							<div class="rowLeft">您的需求：</div>
							<div class="rowRight"><label><span>请填写您的加盟需求！</span><textarea style="resize:none" class="txt w3" name="dataContent"></textarea></label></div>
						</div>
						
						<div class="row">
						<a href="javascript:void(0)" class="buttonApply" id="applyMsg">立刻提交</a>	
							<p class="con">信息提交后，我们会在24小时内联系您!</p>
						</div>
						<div class="clear"></div>
					</form>		