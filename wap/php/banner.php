<?php
$img_class="index_banner";


//统计一下本类别图片条数
$sql_num="SELECT count(*) FROM cptp_img WHERE class='{$img_class}' AND website='{$website}'";
$img_sum=mysqli_fetch_array(mysqli_query($link, $sql_num));

$sql_img="SELECT * FROM cptp_img WHERE class='{$img_class}' AND website='{$website}'";
$result=mysqli_query($link, $sql_img);
$i=0;

while ($row=mysqli_fetch_assoc($result)){
    $imgArr[$i]["img_url"] = $row["wap_url"];

    //根据伪静态的定义重写转向url
    //$imgArr[$i]["img_href"] = "news_show.php?news_id=".$row["news_id"];
    $i++;
}

?>									
		<div id="banner" class="banner">
			<div class="bd">
				<ul>
		
<?php

for ($j=0;$j<$img_sum[0];$j++){
	echo <<< EOT
					<li>
						<a href="javascript:;"><img src="{$imgArr[$j]["img_url"]}" width="100%" /></a>
					</li>
                                         
EOT;

}
?>
				</ul>
			</div>
			<div class="hd">
				<ul>
					<li></li>
				</ul>
			</div>
		</div>	