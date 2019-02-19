<?php

// 按时间顺序显示的条数
$product_shownum=4;

//搜索 按时间顺序前 $product_shownum 条
$product_shownum++;

//统计一下新闻条数
$sql_num="SELECT count(*) FROM cptp_product WHERE product_website='{$website}'";
$product_sum=mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($product_sum[0]<$product_shownum){
    $product_shownum=$product_sum[0];
}

$sql_product="SELECT * FROM cptp_product WHERE product_website='{$website}' ORDER BY product_addtime DESC LIMIT {$product_shownum}";
$result=mysqli_query($link, $sql_product);
$i=0;

while (($row=mysqli_fetch_assoc($result))&($i<=$product_shownum)){
    $productarr[$i]["product_id"] = $row["product_id"];
    $productarr[$i]["product_name"] = $row["product_name"];
    $productarr[$i]["product_summary"] = $row["product_summary"];
    $productarr[$i]["product_img_url"] = $row["product_img_url"];
    $productarr[$i]["product_addtime"] = substr($row["product_addtime"],5,5);
    ////////////////////////////////根据伪静态的定义重写转向url
    $productarr[$i]["product_url"] = "product_show.php?product_id=".$row["product_id"];
    
    $i++;
}

?>
									
                                    <div class="Product">
			<div class="ProductTop"><?php echo $website;?>产品</div>
			<div class="ProductList">
				<ul>
<?php

for ($i=0;$i<$product_shownum;){
    //如果对标题的长度有限制
    //$product_title_short=mb_substr($productarr[$i]["product_title"],0,22,'utf-8');
    echo <<< EOT
					<li>
						<div class="Img">
							<a href="{$productarr[$i]["product_url"]}"><img src="{$productarr[$i]["product_img_url"]}" /></a>
						</div>
						<div class="Title">
							<a href="{$productarr[$i]["product_url"]}">{$productarr[$i]["product_name"]}</a>
						</div>
					</li>
EOT;
    $i=$i+1;
}
?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>


		
		
		
		
		
		
		
		
		
		
		
		
		
		