<?php

// 按时间顺序显示的条数
$news_shownum = 6;

//判断跳转的页数

if (isset($_GET["page"])) {
	$page_jump = $_GET["page"];
	$news_start = ($page_jump - 1) * ($news_shownum) + 1;
} else {
	$page_jump = 1;
	$news_start = 1;
}
//搜索 按时间顺序前 $news_shownum 条

$page_shownum = $news_shownum;

//统计一下新闻条数
$sql_num = "SELECT count(*) FROM cptp_news WHERE news_website='{$website}'";
$news_sum = mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($news_sum[0] < $news_shownum) {
	$news_shownum = $news_sum[0];
}


$sql_news = "SELECT * FROM cptp_news WHERE news_website='{$website}' ORDER BY news_addtime DESC ";


$result = mysqli_query($link, $sql_news);
$i = 1;

while ($row = mysqli_fetch_assoc($result)) {
	$newsArr[$i]["news_id"] = $row["news_id"];
	$newsArr[$i]["news_title"] = $row["news_title"];
	$newsArr[$i]["news_summary"] = $row["news_summary"];
	$newsArr[$i]["news_img_url"] = $row["news_img_url"];
	$newsArr[$i]["news_addtime"] = substr($row["news_addtime"], 0, 10);
    //根据伪静态的定义重写转向url
	$newsArr[$i]["news_url"] = "news_show.php?news_id=" . $row["news_id"];

	$i++;
}

?>

				<div class="PageNews">
					<ul>



<?php

for ($i = ($news_start); (($i < ($news_start + $news_shownum)) & ($i <= $news_sum[0])); $i++) {
    //如果对标题的长度有限制
    //$news_title_short=mb_substr($newsarr[$i]["news_title"],0,22,'utf-8');
	echo <<< EOT
					<li>
							<div class="Img l">
								<a href="{$newsArr[$i]["news_url"]}"><img src="{$newsArr[$i]["news_img_url"]}" onerror="this.src='/schtml/default/images/news.jpg'" /></a>
							</div>
							<div class="Con r">
								<div class="Title">
									<a href="{$newsArr[$i]["news_url"]}">{$newsArr[$i]["news_title"]}</a>
								</div>
								<div class="Time">发布时间：{$newsArr[$i]["news_addtime"]}</div>
								<div class="Cont">{$newsArr[$i]["news_summary"]}</div>
							</div>
						</li>
EOT;

}
?>


						<div class="clear"></div>
					</ul>
					<div class="clear"></div>
					<div class="pages">
						<div id="pages">
<?php 
//分页 向前向后按钮
$page_max = ceil($news_sum[0] / $page_shownum);
?>

							<a>共<?php echo $news_sum[0]; ?>条</a>
							<a href="<?php echo "news.php?page=1"; ?>">首页</a>
<?php

for ($i = 1; $i <= $page_max; $i++) {
	if ($i == $page_jump) {
		echo '<span>' . $i . '</span>';
	} else {
		echo <<< EOT
										<a href="news.php?page=$i">$i</a>

EOT;
	}
}
?>									
						
							<a href="<?php echo "news.php?page=". $page_max; ?>">尾页</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>