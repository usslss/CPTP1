<?php
include_once "php/connect.php";
$page = "news";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="/favicon.ico">
		<?php include_once "php/keywords.php";?>
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

		<!-- pagebanner -->
		<div class="pagebanner" style="background: url() center center no-repeat;">
			<div class="clear"></div>
		</div>
		<!-- END pagebanner -->

		<!--PageMain-->
		<div class="PageMain">
			<div class="PageLeft l">
				<?php include_once "php/pageNav.php";?>
				<?php include_once "php/pageRecommend.php";?>
			</div>
			<div class="PageRight r">
				<div class="Top">
					<div class="title l"><?php echo $pageName; ?></div>
					<div class="crumbs r">当前位置：
						<a href="<?php echo $navArr[0]["url"]; ?>"><?php echo $navArr[0]["name"]; ?></a> >
						<a href="<?php echo $pageUrl; ?>" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
					</div>
				</div>
				<?php include_once "php/news/news_list.php";?>

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