<?php

// 按时间顺序显示的条数
$product_shownum = 8;

//判断跳转的页数

if (isset($_GET["page"])) {
	$page_jump = $_GET["page"];
	$product_start = ($page_jump - 1) * ($product_shownum) + 1;
} else {
	$page_jump = 1;
	$product_start = 1;
}
//搜索 按时间顺序前 $product_shownum 条

$page_shownum = $product_shownum;

//统计一下新闻条数
if ($showProductClass == '') {
	$sql_num = "SELECT count(*) FROM cptp_product WHERE product_website='{$website}'";
} else {
	$sql_num = "SELECT count(*) FROM cptp_product WHERE product_class='$showProductClass' AND product_website='{$website}'";
}

$product_sum = mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($product_sum[0] < $product_shownum) {
	$product_shownum = $product_sum[0];
}

if ($showProductClass == '') {
	$sql_product = "SELECT * FROM cptp_product WHERE product_website='{$website}' ORDER BY product_addtime ";
} else {
	$sql_product = "SELECT * FROM cptp_product WHERE product_class='$showProductClass' AND product_website='{$website}' ORDER BY product_addtime ";
}

$result = mysqli_query($link, $sql_product);
$i = 1;

while ($row = mysqli_fetch_assoc($result)) {
	$productArr[$i]["product_id"] = $row["product_id"];
	$productArr[$i]["product_name"] = $row["product_name"];
	$productArr[$i]["product_summary"] = $row["product_summary"];
	$productArr[$i]["product_img_url"] = $row["product_img_url"];
	$productArr[$i]["product_addtime"] = substr($row["product_addtime"], 5, 5);
    //根据伪静态的定义重写转向url
	$productArr[$i]["product_url"] = "product_show.php?product_id=" . $row["product_id"];

	$i++;
}

?>

<div class="ProductList">
				<ul>


<?php

for ($i = ($product_start); (($i < ($product_start + $product_shownum)) & ($i <= $product_sum[0])); $i++) {
    //如果对标题的长度有限制
    //$product_title_short=mb_substr($productarr[$i]["product_title"],0,22,'utf-8');
	echo <<< EOT
					<li>
						<div class="Img">
							<a href="{$productArr[$i]["product_url"]}"><img src="{$productArr[$i]["product_img_url"]}" /></a>
						</div>
						<div class="Title">
							<a href="{$productArr[$i]["product_url"]}">{$productArr[$i]["product_name"]}</a>
						</div>
					</li>
EOT;

}
?>

				</ul>
				<div class="clear"></div>
				<?php 
				//分页 向前向后按钮

			$page_max = ceil($product_sum[0] / $page_shownum);


			?>
				<div class="pages">
					<div id="pages">
						<a>共<?php echo $product_sum[0]; ?>条</a>

						<a href="<?php echo "product.php?class=" . $showProductClass . "&page=1"; ?>">首页</a>
<?php

for ($i = 1; $i <= $page_max; $i++) {

	if ($i == $page_jump) {
		echo '<span>' . $i . '</span>';
	} else {
		echo <<< EOT
										<a href="product.php?class=$showProductClass&page=$i">$i</a>

EOT;
	}
}
?>
						
						
						
						<a href="<?php echo "product.php?class=" . $showProductClass . "&page=" . $page_max; ?>">尾页</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>