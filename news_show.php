<?php
include_once "php/connect.php";
$page="news";

if (isset($_POST["news_id"])){
    $news_id=$_POST["news_id"];
}

if (isset($_GET["news_id"])){
    $news_id=$_GET["news_id"];
}


//本条新闻内容
$sql_hot="SELECT * FROM cptp_news WHERE news_id='{$news_id}'";
$result=mysqli_query($link, $sql_hot);

while ($row=mysqli_fetch_assoc($result)){
    $show_news_class=$row["news_class"];
    $show_news_title=$row["news_title"];
    $show_news_click=$row["news_click"];
    $show_news_all=$row["news_all"];
    $show_news_addtime=substr($row["news_addtime"],0,20);
	//伪静态?
	$show_news_url="news_show.php?news_id=".$news_id;
}


//关键词 标题 description
$sql_key="SELECT * FROM page WHERE page_class='{$page}_{$website}'";

$result=mysqli_query($link, $sql_key);

while ($row=mysqli_fetch_assoc($result)){
    $page_title=$row["page_title"];
    $page_keywords=$row["page_keywords"];
    $page_description=$row["page_description"];
}
//点击数+1
$show_news_click=$show_news_click+1;
$sql_click="UPDATE cptp_news SET news_click={$show_news_click} WHERE news_id='{$news_id}'";

$result=mysqli_query($link, $sql_click);



//上一条新闻
$sql_prev="SELECT * FROM cptp_news WHERE news_id<{$news_id} AND news_class='{$show_news_class}' AND news_website='{$website}' ORDER BY news_id DESC LIMIT 1";
$result=mysqli_query($link, $sql_prev);
while ($row=mysqli_fetch_assoc($result)){
    $prev_news_id=$row["news_id"];
    //$prev_news_url="news_show_".$row["news_id"].".html";
    $prev_news_url="news_show.php?news_id=".$row["news_id"];
    $prev_news_title=mb_substr($row["news_title"],0,20,"utf-8");
}
if ((isset($prev_news_id)==false)){
    $prev_news_id="无内容";
    $prev_news_url="#";
    $prev_news_title="没有了";
}


//下一条新闻
$sql_next="SELECT * FROM cptp_news WHERE news_id>{$news_id} AND news_class='{$show_news_class}' AND news_website='{$website}' ORDER BY news_id ASC LIMIT 1";
$result=mysqli_query($link, $sql_next);
while ($row=mysqli_fetch_assoc($result)){
    $next_news_id=$row["news_id"];
    //$next_news_url="news_show_".$row["news_id"].".html";
    $next_news_url="news_show.php?news_id=".$row["news_id"];
    $next_news_title=mb_substr($row["news_title"],0,20,"utf-8");
}

if ((isset($next_news_id)==false)){
    $next_news_id="无内容";
    $next_news_url="#";
    $next_news_title="没有了";
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="/favicon.ico">
		<title><?php echo $page_title;?> - <?php echo $show_news_title;?></title>
		<meta name="keywords" content="<?php echo $page_keywords;?>" />
		<meta name="description" content="<?php echo $page_description;?>">	
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/suncher.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/jquery.superslide.2.1.2.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/suncher.js"></script>
	</head>

	<body>

		<!--header-->
		<?php include_once "php/header.php";?>
		<!--header end-->

		<!--banner-->
		<?php include_once "php/banner.php";?>
		<!--banner end-->

		<!--PageMain-->
		<div class="PageMain">
			<div class="PageLeft l">
			<?php include_once "php/pageNav.php";?>
				<?php include_once "php/pageRecommend.php";?>
				<div class="PageContact">
					<div class="title">咨询热线</div>
					<div class="tel"><?php echo $infoArr[$website]["tel"]; ?></div>
					<div class="mailbox">邮箱：<?php echo $infoArr[$website]["email"]; ?></div>
				</div>
			</div>
			<div class="PageRight r">
				<div class="Top">
					<div class="title l"><?php echo $show_news_class; ?></div>
					<div class="crumbs r">当前位置：
						<a href="<?php echo $navArr[0]["url"]; ?>"><?php echo $navArr[0]["name"]; ?></a> >
						<a href="<?php echo $pageUrl; ?>" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a> >
						<a href="<?php echo $show_news_url; ?>" title="<?php echo $show_news_class; ?>"><?php echo $show_news_class; ?></a>
					</div>
				</div>
				<div class="PageNewsD">
					<div class="Title"><?php echo $show_news_title;?></div>
					<div class="Time">发布时间：<?php echo $show_news_addtime;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阅读次数：<?php echo $show_news_click;?>
						
					</div>
					<div class="Cont">
						<?php echo $show_news_all;?>
					    <p style="text-indent:0;margin: 8px 5px;padding: 8px 10px;line-height: 22px;border: 1px solid #ccc;background: #F5F5F5;"><b style="color:#e0901e;">分享地址：</b><?php echo $show_news_url;?></p>
					</div>
					<div class="Share">
						<div class="bdsharebuttonbox r">
							<a href="#" class="bds_more" data-cmd="more"></a>
							<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
							<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
							<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
							<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
							<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						</div>
						<script>
							window._bd_share_config = {
								"common": {
									"bdSnsKey": {},
									"bdText": "",
									"bdMini": "2",
									"bdPic": "",
									"bdStyle": "0",
									"bdSize": "16"
								},
								"share": {}
							};
							with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
						</script>
					</div>
				</div>
				<div class="pages1">
					<div class="pages1_l l">
					上一篇：<a href="<?php echo $prev_news_url;?>"><?php echo $prev_news_title;?></a>
					</div>
					<div class="pages1_r r">
					下一篇：<a href='<?php echo $next_news_url;?>'><?php echo $next_news_title;?></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!--PageMain end-->

		<!--Footer-->
		<?php include_once("php/footer.php");?>
		<!--Footer end-->

		<!--floatBottom-->
		<?php include_once("php/floatBottom.php");?>
		<!--floatBottom end-->

	</body>

</html>
<?php
mysqli_close($link);
?>