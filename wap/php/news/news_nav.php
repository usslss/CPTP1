<?php
if(isset($_GET["class"])){
    $showNewsClass=$_GET["class"];
    $allNewsClass='';
    if($showNewsClass==''){
        $allNewsClass='on';
    }
}else{
    $showNewsClass='';
    $allNewsClass='on';
}

$sql_news_nav = "SELECT DISTINCT news_class FROM cptp_news WHERE news_website='{$website}'";

$result = mysqli_query($link, $sql_news_nav);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $newsNavArr[$i]["className"] = $row["news_class"];
    $newsNavArr[$i]["url"]=$page.".php?class=".$row["news_class"];
    if ($row["news_class"] == $showNewsClass) {
        $newsNavArr[$i]["class"] = "on";
    } else {
        $newsNavArr[$i]["class"] = "";
    }
    $i++;

}

//$newsNavArr[0]["class"] = "";
$nav_sum = $i;

?>

		<div class="crumbs">您当前的位置：
			<a href="index.php">首页</a><span>></span>
			<a href="news.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
        </div>
        
		<div class="pageNav">
			<ul>
				<li class="<?php echo $allNewsClass;?>">
					<a href="news.php">全部产品</a>
				</li>
<?php
for ($i = 0; $i < $nav_sum; $i++) {
    //如果对标题的长度有限制
    echo <<< EOT
				<li class="{$newsNavArr[$i]["class"]}">
					<a href="{$newsNavArr[$i]["url"]}">{$newsNavArr[$i]["className"]}</a>
				</li>                    
EOT;
}
?>
			</ul>
			<div class="clear"></div>
		</div>