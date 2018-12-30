<?php
include_once "../php/connect.php";
$page = "product";

if (isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
}

if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
}

//本条内容
$sql_hot = "SELECT * FROM cptp_product WHERE product_id='{$product_id}'";
$result = mysqli_query($link, $sql_hot);

while ($row = mysqli_fetch_assoc($result)) {
    $show_product_class = $row["product_class"];
    $show_product_title = $row["product_name"];
    $show_product_click = $row["product_click"];
    $show_product_all = $row["product_all"];
    $show_product_addtime = substr($row["product_addtime"], 0, 20);
    //伪静态?
    $show_product_url = "product_show.php?product_id=" . $product_id;
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
$show_product_click = $show_product_click + 1;
$sql_click = "UPDATE cptp_product SET product_click={$show_product_click} WHERE product_id='{$product_id}'";

$result = mysqli_query($link, $sql_click);

//上一条新闻
$sql_prev = "SELECT * FROM cptp_product WHERE product_id<{$product_id} AND product_class='{$show_product_class}' AND product_website='{$website}' ORDER BY product_id DESC LIMIT 1";
$result = mysqli_query($link, $sql_prev);
while ($row = mysqli_fetch_assoc($result)) {
    $prev_product_id = $row["product_id"];
    //$prev_product_url="product_show_".$row["product_id"].".html";
    $prev_product_url = "product_show.php?product_id=" . $row["product_id"];
    $prev_product_title = mb_substr($row["product_name"], 0, 10, "utf-8");
}
if ((isset($prev_product_id) == false)) {
    $prev_product_id = "无内容";
    $prev_product_url = "#";
    $prev_product_title = "没有了";
}

//下一条新闻
$sql_next = "SELECT * FROM cptp_product WHERE product_id>{$product_id} AND product_class='{$show_product_class}' AND product_website='{$website}' ORDER BY product_id ASC LIMIT 1";
$result = mysqli_query($link, $sql_next);
while ($row = mysqli_fetch_assoc($result)) {
    $next_product_id = $row["product_id"];
    //$next_product_url="product_show_".$row["product_id"].".html";
    $next_product_url = "product_show.php?product_id=" . $row["product_id"];
    $next_product_title = mb_substr($row["product_name"], 0, 10, "utf-8");
}

if ((isset($next_product_id) == false)) {
    $next_product_id = "无内容";
    $next_product_url = "#";
    $next_product_title = "没有了";
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
		<title><?php echo $page_title; ?> - <?php echo $show_product_title; ?></title>
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
			<a href="product.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a><span>></span>
			<a href="" title="<?php echo $show_product_class; ?>"><?php echo $show_product_class; ?></a>
		</div>

		<div class="pageNewsDetail">
			<div class="title"><?php echo $show_product_title; ?></div>
			<div class="time"><span>发布时间：<?php echo $show_product_addtime; ?></span><span>阅读次数：<?php echo $show_product_click; ?></span></div>
			<div class="cont">
			<?php echo $show_product_all; ?>

			</div>
			<div class="paging">
				<span><a href="<?php echo $prev_product_url; ?>">上一篇:<?php echo $prev_product_title; ?></a></span>
				<span><a href="<?php echo $next_product_url; ?>">下一篇:<?php echo $next_product_title; ?></a></span>
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