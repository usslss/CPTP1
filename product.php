<?php
include_once "php/connect.php";
$page = "product";
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

		<!--PageMain-->
		<div class="PageProduct">
			<div class="Top">
				<div class="title l"><?php echo $pageName; ?></div>
				<div class="crumbs r">当前位置：
					<a href="<?php echo $navArr[0]["url"]; ?>"><?php echo $navArr[0]["name"]; ?></a> >
					<a href="<?php echo $pageUrl; ?>" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
				</div>
			</div>
			<div class="ProductNav">
				<ul>
					<li class="on">
						<a href="product.html">全部产品</a>
					</li>
					<li>
						<a href="product.html">氮气云雾系列</a>
					</li>
					<li>
						<a href="product.html">冻果芝士系列</a>
					</li>
					<li>
						<a href="product.html">雾社奶茶系列</a>
					</li>
					<li>
						<a href="product.html">雾社益力多系列</a>
					</li>
					<li>
						<a href="product.html">鲜果高山茶系列</a>
					</li>
					<li>
						<a href="product.html">云雾芝士系列</a>
					</li>
				</ul>
			</div>
			<div class="ProductList">
				<ul>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/27.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">郁香乌龙</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/26.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">雾社红茶</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/25.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">雾社初露</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/24.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">清香桃桃乌龙</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/23.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">清芬茉莉</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/22.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">鲜果满杯</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/21.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">柠愿为你</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/20.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">茉莉红颜</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/19.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">满满诚意</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/18.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">赤颜红柚</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/17.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">赤橙之心</a>
						</div>
					</li>
					<li>
						<div class="Img">
							<a href="product-show.html"><img src="picture/15.jpg" /></a>
						</div>
						<div class="Title">
							<a href="product-show.html">芭乐鲜荔枝茉莉</a>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
				<div class="pages">
					<div id="pages">
						<a>共25条</a><span>1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">下一页</a>
						<a href="">最末页</a>
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