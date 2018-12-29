<?php
$module_class = "index_about";

$sql_about = "SELECT * FROM cptp_others JOIN cptp_img ON cptp_others.class=cptp_img.class WHERE cptp_others.class='$module_class' AND cptp_others.website='$website'";
$result = mysqli_query($link, $sql_about);

while ($row = mysqli_fetch_assoc($result)) {
	$about["img_url"] = $row["wap_url"];
	$about["text_all"] = $row["wap_text_all"];

    //根据伪静态的定义重写转向url
    //$imgArr[$i]["img_href"] = "news_show.php?news_id=".$row["news_id"];
}

?>
		<div class="about">
			<div class="top"><em></em>关于<?php echo $website; ?><span><a href="about.php">更多>></a></span></div>
			<div class="cont">
				<img src="<?php echo $about["img_url"]; ?>" />
				<?php echo $about["text_all"]; ?> 
			</div>
			<div class="clear"></div>
		</div>		