<?php
if(isset($_GET["class"])){
    $showProductClass=$_GET["class"];
    $allProductClass='';
    if($showProductClass==''){
        $allProductClass='on';
    }
}else{
    $showProductClass='';
    $allProductClass='on';
}

$sql_product_nav = "SELECT DISTINCT product_class FROM cptp_product WHERE product_website='{$website}'";

$result = mysqli_query($link, $sql_product_nav);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $productNavArr[$i]["className"] = $row["product_class"];
    $productNavArr[$i]["url"]=$page.".php?class=".$row["product_class"];
    if ($row["product_class"] == $showProductClass) {
        $productNavArr[$i]["class"] = "on";
    } else {
        $productNavArr[$i]["class"] = "";
    }
    $i++;

}

//$productNavArr[0]["class"] = "";
$nav_sum = $i;

?>

		<div class="crumbs">您当前的位置：
			<a href="index.php">首页</a><span>></span>
			<a href="product.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
        </div>
        
		<div class="pageNav">
			<ul>
				<li class="<?php echo $allProductClass;?>">
					<a href="product.php">全部产品</a>
				</li>
<?php
for ($i = 0; $i < $nav_sum; $i++) {
    //如果对标题的长度有限制
    echo <<< EOT
				<li class="{$productNavArr[$i]["class"]}">
					<a href="{$productNavArr[$i]["url"]}">{$productNavArr[$i]["className"]}</a>
				</li>                    
EOT;
}
?>
			</ul>
			<div class="clear"></div>
		</div>