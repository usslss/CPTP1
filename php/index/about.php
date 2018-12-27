<?php
$module_class = "index_about";

$sql_about = "SELECT * FROM cptp_others JOIN cptp_img ON cptp_others.class=cptp_img.class WHERE cptp_others.class='$module_class' AND cptp_others.website='$website'";
$result = mysqli_query($link, $sql_about);

while ($row = mysqli_fetch_assoc($result)) {
	$about["img_url"] = $row["url"];
	$about["text_all"] = $row["text_all"];

    //根据伪静态的定义重写转向url
    //$imgArr[$i]["img_href"] = "news_show.php?news_id=".$row["news_id"];
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