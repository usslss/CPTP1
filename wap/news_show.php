<?php
include_once "../php/connect.php";
$page = "news";

if (isset($_POST["news_id"])) {
    $news_id = $_POST["news_id"];
}

if (isset($_GET["news_id"])) {
    $news_id = $_GET["news_id"];
}

//本条新闻内容
$sql_hot = "SELECT * FROM cptp_news WHERE news_id='{$news_id}'";
$result = mysqli_query($link, $sql_hot);

while ($row = mysqli_fetch_assoc($result)) {
    $show_news_class = $row["news_class"];
    $show_news_title = $row["news_title"];
    $show_news_click = $row["news_click"];
    $show_news_all = $row["news_all"];
    $show_news_addtime = substr($row["news_addtime"], 0, 20);
    //伪静态?
    $show_news_url = "news_show.php?news_id=" . $news_id;
}

//关键词 标题 description
$sql_key = "SELECT * FROM page WHERE page_class='{$page}_{$website}'";

$result = mysqli_query($link, $sql_key);

while ($row = mysqli_fetch_assoc($result)) {
    $page_title = $row["page_title"];
    $page_keywords = $row["page_keywords"];
    $page_description = $row["page_description"];
}
//点击数+1
$show_news_click = $show_news_click + 1;
$sql_click = "UPDATE cptp_news SET news_click={$show_news_click} WHERE news_id='{$news_id}'";

$result = mysqli_query($link, $sql_click);

//上一条新闻
$sql_prev = "SELECT * FROM cptp_news WHERE news_id<{$news_id} AND news_class='{$show_news_class}' AND news_website='{$website}' ORDER BY news_id DESC LIMIT 1";
$result = mysqli_query($link, $sql_prev);
while ($row = mysqli_fetch_assoc($result)) {
    $prev_news_id = $row["news_id"];
    //$prev_news_url="news_show_".$row["news_id"].".html";
    $prev_news_url = "news_show.php?news_id=" . $row["news_id"];
    $prev_news_title = mb_substr($row["news_title"], 0, 10, "utf-8");
}
if ((isset($prev_news_id) == false)) {
    $prev_news_id = "无内容";
    $prev_news_url = "#";
    $prev_news_title = "没有了";
}

//下一条新闻
$sql_next = "SELECT * FROM cptp_news WHERE news_id>{$news_id} AND news_class='{$show_news_class}' AND news_website='{$website}' ORDER BY news_id ASC LIMIT 1";
$result = mysqli_query($link, $sql_next);
while ($row = mysqli_fetch_assoc($result)) {
    $next_news_id = $row["news_id"];
    //$next_news_url="news_show_".$row["news_id"].".html";
    $next_news_url = "news_show.php?news_id=" . $row["news_id"];
    $next_news_title = mb_substr($row["news_title"], 0, 10, "utf-8");
}

if ((isset($next_news_id) == false)) {
    $next_news_id = "无内容";
    $next_news_url = "#";
    $next_news_title = "没有了";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/icon_57x57.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/icon_72x72.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/icon_114x114.png" />
		<title><?php echo $page_title; ?> - <?php echo $show_news_title; ?></title>
		<meta name="keywords" content="<?php echo $page_keywords; ?>" />
		<meta name="description" content="<?php echo $page_description; ?>">
		<link rel="stylesheet" type="text/css" href="css/suncher.css" />
		<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/TouchSlide.1.1.js"></script>
		<script type="text/javascript" src="js/jquery.superslide.2.1.1.js"></script>
		<script type="text/javascript" src="js/classie.js"></script>
		<script type="text/javascript" src="js/suncher.js"></script>

	</head>

	<body>
		<!--header-->
		<?php include_once "php/header.php";?>
		<!--header end-->

		<!--banner-->
		<?php include_once "php/banner.php";?>
		<!--banner end-->

		<div class="crumbs">您当前的位置：
			<a href="index.html">首页</a><span>></span>
			<a href="news.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a><span>></span>
			<a href="" title="<?php echo $show_news_class; ?>"><?php echo $show_news_class; ?></a>
		</div>

		<div class="pageNewsDetail">
			<div class="title"><?php echo $show_news_title; ?></div>
			<div class="time"><span>发布时间：<?php echo $show_news_addtime; ?></span><span>阅读次数：<?php echo $show_news_click; ?></span></div>
			<div class="cont">
			<?php echo $show_news_all; ?>

			</div>
			<div class="paging">
				<span><a href="<?php echo $prev_news_url; ?>">上一篇:<?php echo $prev_news_title; ?></a></span>
				<span><a href="<?php echo $next_news_url; ?>">下一篇:<?php echo $next_news_title; ?></a></span>
			</div>
			<div class="clear"></div>
		</div>

		<!--Apply end-->
		<?php include_once "php/msgList.php";?>
		<!--Apply end-->

		<!--Footer-->
		<?php include_once "php/footer.php";?>
		<!--Footer end-->

		<script type="text/javascript">
			//返回顶部
			$(document).ready(function() {
				$(window).scroll(function() {
					var scrollHeight = $(document).height();
					var scrollTop = $(window).scrollTop();
					var $windowHeight = $(window).innerHeight();
					scrollTop > 75 ? $(".gotop").fadeIn(200).css("display", "block") : $(".gotop").fadeOut(200).css({
						"background-image": "url(picture/icon_top_up.png)"
					});
				});
				$('.backtop').click(function(e) {
					$(".gotop").css({
						"background-image": "url(picture/icon_top_up.png)"
					});
					e.preventDefault();
					$('html,body').animate({
						scrollTop: 0
					});
				});
			});
		</script>

	</body>

</html>

<?php
mysqli_close($link);
?>