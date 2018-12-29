<?php
include_once "../php/connect.php";
$page = "index";
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
        <?php include_once "../php/keywords.php";?>
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

		<!--About-->
		<?php include_once "php/index/about.php";?>
		<!--About end-->

		<!--News-->
		<div class="news">
			<div class="top"><em></em><?php echo $website; ?>新闻<span><a href="news.php">更多>></a></span></div>
			<div id="newsList" class="newsList">
				<?php include_once "php/index/news_class_list.php";?>

				<div class="bd" id="newsbd">
					<?php include_once "php/index/news_list_l.php";?>
					<?php include_once "php/index/news_list_r.php";?>
				</div>
			</div>
		</div>
		<!--News end-->

		<!--Product-->
		<?php include_once "php/index/product_list.php";?>
		<!--Product end-->

		<!--Problem-->
		<?php include_once "php/index/problem_list.php";?>
		<!--Problem end-->

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