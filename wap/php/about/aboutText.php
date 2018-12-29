<?php
$module_class = "about_text";

$sql_about = "SELECT * FROM cptp_others WHERE class='$module_class' AND website='$website'";
$result = mysqli_query($link, $sql_about);

while ($row = mysqli_fetch_assoc($result)) {
    $aboutTextAll = $row["wap_text_all"];
}


?>
		<div class="crumbs">您当前的位置：
			<a href="index.php">首页</a><span>></span>
			<a href="about.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
		</div>

		<div class="pageAbout">
            <?php echo $aboutTextAll;?>
			<p><br /></p>
			<div class="clear"></div>
		</div>