<?php
$module_class = "join_text";

$sql_join = "SELECT * FROM cptp_others WHERE class='$module_class' AND website='$website'";
$result = mysqli_query($link, $sql_join);

while ($row = mysqli_fetch_assoc($result)) {
    $joinTextAll = $row["wap_text_all"];
}


?>
		<div class="crumbs">您当前的位置：
			<a href="index.php">首页</a><span>></span>
			<a href="join.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
		</div>

		<div class="pageAbout">
			<?php echo $joinTextAll;?>		
			<div class="clear"></div>
		</div>		