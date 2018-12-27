<?php
include_once "php/connect.php";
$page = "index";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="/favicon.ico">
        <?php include_once "php/keywords.php";?>
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

		<!--About-->
		<?php include_once "php/index/about.php";?>
		<!--About end-->

		<!--News-->
		<div class="News">
			<div class="NewsC c1200">
				<?php include_once "php/index/news_list_l.php";?>
				<?php include_once "php/index/news_list_r.php";?>
			</div>
			<div class="clear"></div>
		</div>	
		<!--News end-->

		<!--Product-->
		<?php include_once "php/index/product_list.php";?>
		<!--Product end-->

		<!--Problem-->
		<?php include_once "php/index/problem_list.php";?>

		<!--Problem end-->

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