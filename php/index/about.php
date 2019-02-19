<?php

$sql_about_img = "SELECT * FROM cptp_img  WHERE class='index_about' AND website='$website'";
$result = mysqli_query($link, $sql_about_img);

while ($row = mysqli_fetch_assoc($result)) {
	$about["img_url"] = $row["url"];
}

$sql_about_text = "SELECT * FROM cptp_others  WHERE class='index_text' AND website='$website'";
$result = mysqli_query($link, $sql_about_text);

while ($row = mysqli_fetch_assoc($result)) {
	$about["text_all"] = $row["text_all"];
}

?>
		<div class="About c1200">
			<div class="AboutTop">关于<?php echo $website; ?></div>
			<div class="AboutC">
				<div class="Details l">
				<?php echo $about["text_all"]; ?>
				</div>
				<div class="Img r"><img src="<?php echo $about["img_url"]; ?>" /></div>
			</div>
			<div class="clear"></div>
		</div>