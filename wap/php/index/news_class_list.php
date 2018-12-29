<?php

$sql_news = "SELECT DISTINCT news_class FROM cptp_news WHERE news_website='{$website}'";
$result = mysqli_query($link, $sql_news);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
	$newsListArr[$i] = $row["news_class"];
	$i++;
}

?>									
				<ul class="hd">
<?php

for ($i = 0; $i < 2; $i++) {
	echo <<< EOT
					<li>
						<a href="javascript:void(0);">{$newsListArr[$i]}</a>
					</li>	                       

EOT;

}
?>
				</ul>	