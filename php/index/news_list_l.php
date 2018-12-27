<?php
$news_class="最新资讯";

// 按时间顺序显示的条数
$news_shownum=3;

//搜索最热门
$sql_hot="SELECT * FROM cptp_news WHERE news_class='{$news_class}' AND news_website='{$website}' ORDER BY news_click DESC LIMIT 1";

$result=mysqli_query($link, $sql_hot);

while ($row=mysqli_fetch_assoc($result)){
    $hot_news_id=$row["news_id"];
	$hot_news_title=$row["news_title"];
	$hot_news_summary=$row["news_summary"];
    $hot_news_img_url=$row["news_img_url"];
    $hot_news_addtime=substr($row["news_addtime"],0,10);
    ////////////////////////////////根据伪静态的定义重写转向url
    $hot_news_url = "news_show.php?news_id=".$row["news_id"];
    
}

//统计一下新闻条数
$sql_num="SELECT count(*) FROM cptp_news WHERE news_class='{$news_class}' AND news_website='{$website}'";
$news_sum=mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($news_sum[0]<$news_shownum){
    $news_shownum=$news_sum[0];
}

$sql_news="SELECT * FROM cptp_news WHERE news_class='{$news_class}' AND news_website='{$website}' ORDER BY news_addtime DESC LIMIT {$news_shownum}";
$result=mysqli_query($link, $sql_news);
$i=0;

while (($row=mysqli_fetch_assoc($result))&($i<=$news_shownum)){
    $newsarr[$i]["news_id"] = $row["news_id"];
    $newsarr[$i]["news_title"] = $row["news_title"];
    $newsarr[$i]["news_summary"] = $row["news_summary"];
    $newsarr[$i]["news_addtime"] = substr($row["news_addtime"],0,10);
    ////////////////////////////////根据伪静态的定义重写转向url
    $newsarr[$i]["news_url"] = "news_show.php?news_id=".$row["news_id"];
    
    $i++;
}

?>
									
				<div class="Latest l">
					<div class="NewsNav"><span class="l"><?php echo $website;?>最新资讯</span>
						<a class="r" href="news.html">更多 >></a>
					</div>
					<div class="NewsTop">
						<div class="Img l">
							<a href="<?php echo $hot_news_url;?>"><img src="<?php echo $hot_news_img_url;?>" onerror="this.src='/schtml/default/images/news.jpg'" /></a>
						</div>
						<div class="Con r">
							<div class="Title">
								<a href="<?php echo $hot_news_url;?>"><?php echo $hot_news_title;?></a>
							</div>
							<div class="Time">发布时间：<?php echo $hot_news_addtime;?></div>
							<div class="Cont"><?php echo $hot_news_summary;?></div>
						</div>
					</div>
					<ul>		

<?php

for ($i=0;$i<$news_shownum;$i++){
    //如果对标题的长度有限制
    //$news_title_short=mb_substr($newsarr[$i]["news_title"],0,20,'utf-8');
    echo <<< EOT
                        <li><a href="{$newsarr[$i]["news_url"]}" class="l">{$newsarr[$i]["news_title"]}</a><span class="r">[{$newsarr[$i]["news_addtime"]}]</span></li>

EOT;

}
?>
						
                        </ul>
				</div>