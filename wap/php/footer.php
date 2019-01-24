		<div class="footer">
			<p>加盟热线：<?php echo $infoArr[$website]["tel"]; ?></p>
			<p>官方邮箱：<?php echo $infoArr[$website]["email"]; ?></p>
			<p>总部地址：<?php echo $infoArr[$website]["address"]; ?></p>
			<p><?php echo $infoArr[$website]["copyright"]; ?>&nbsp;&nbsp;
				<a href="http://www.miitbeian.gov.cn/" target="_blank"> <?php echo $infoArr[$website]["mitbeian"]; ?></a>
			</p>
		</div>

		<div class="gotop backtop" style="display:none;"></div>

		<div class="mui-bar footernav">
			<a class="footernavli" href="<?php echo $navArr[0]["url"]; ?>">
				<span class="footernavimg"><img src="picture/icon_index.png"></span>
				<span class="footernavtxt"><?php echo $navArr[0]["name"]; ?></span>
			</a>
			<a class="footernavli" href="tel:<?php echo $infoArr[$website]["tel"]; ?>">
				<span class="footernavimg"><img src="picture/icon_tel.png"></span>
				<span class="footernavtxt">电话咨询</span>
			</a>
			<a class="footernavli" href="">
				<span class="footernavimg"><img src="picture/icon_join.png"></span>
				<span class="footernavtxt">在线咨询</span>
			</a>
			<a class="footernavli" href="apply.php">
				<span class="footernavimg"><img src="picture/icon_map.png"></span>
				<span class="footernavtxt">申请加盟</span>
			</a>
		</div>

<?php 
if($infoArr[$website]["53kf_status"]==1){
echo $infoArr[$website]["53kf"];
}
?>