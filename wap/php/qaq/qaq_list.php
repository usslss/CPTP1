<?php
$qaq_class="qaq";
// 按时间顺序显示的条数
$qaq_shownum = 4;

//判断跳转的页数

if (isset($_GET["page"])) {
    $page_jump = $_GET["page"];
    $qaq_start = ($page_jump - 1) * ($qaq_shownum) + 1;
} else {
    $page_jump = 1;
    $qaq_start = 1;
}
//搜索 按时间顺序前 $qaq_shownum 条

$page_shownum = $qaq_shownum;

//统计一下条数
$sql_num = "SELECT count(*) FROM cptp_others WHERE class='$qaq_class' AND website='{$website}'";

$qaq_sum = mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($qaq_sum[0] < $qaq_shownum) {
    $qaq_shownum = $qaq_sum[0];
}

$sql_qaq = "SELECT * FROM cptp_others WHERE class='$qaq_class' AND website='{$website}' ORDER BY addtime DESC ";

$result = mysqli_query($link, $sql_qaq);
$i = 1;

while ($row = mysqli_fetch_assoc($result)) {
    $qaqArr[$i]["qaq_id"] = $row["id"];
    $qaqArr[$i]["qaq_title"] = $row["title"];
    $qaqArr[$i]["qaq_summary"] = $row["summary"];
    $qaqArr[$i]["qaq_img_url"] = $row["wap_img_url"];
    $qaqArr[$i]["qaq_addtime"] = substr($row["addtime"], 5, 5);
    //根据伪静态的定义重写转向url
    $qaqArr[$i]["qaq_url"] = "qaq_show.php?qaq_id=" . $row["id"];

    $i++;
}

?>
		<div class="crumbs">您当前的位置：
			<a href="index.php">首页</a><span>></span>
			<a href="qaq.php" title="<?php echo $pageName; ?>"><?php echo $pageName; ?></a>
        </div>
        
		<div class="pageNews">
			<ul>
<?php

for ($i = ($qaq_start); (($i < ($qaq_start + $qaq_shownum)) & ($i <= $qaq_sum[0])); $i++) {
    //如果对标题的长度有限制
    $qaq_title_short=mb_substr($qaqArr[$i]["qaq_title"],0,18,'utf-8');
    $qaq_summary_short=mb_substr($qaqArr[$i]["qaq_summary"],0,20,'utf-8');
    echo <<< EOT
				<li>
                    <a href="{$qaqArr[$i]["qaq_url"]}">
						<div class="Img l"><img src="{$qaqArr[$i]["qaq_img_url"]}" onerror="this.src='picture/qaq.jpg'" /></div>
						<div class="Cont r">
							<p class="title">{$qaq_title_short}</p>
							<p class="time">发布时间：2018-09-19</p>
							<p class="con">{$qaq_summary_short}</p>
						</div>
                    </a> 
                </li>               
EOT;

}
?>
			</ul>
			<div class="clear"></div>
<?php
//分页 向前向后按钮
$page_max = ceil($qaq_sum[0] / $page_shownum);
?>
			<div class="pages">
				<div id="pages">
					<a>共<?php echo $qaq_sum[0]; ?>条</a>
					<a href="<?php echo "qaq.php?page=1"; ?>">首页</a>
<?php
for ($i = 1; $i <= $page_max; $i++) {
    if ($i == $page_jump) {
        echo '<span>' . $i . '</span>';
    } else {
        echo <<< EOT
										<a href="qaq.php?page=$i">$i</a>

EOT;
    }
}
?>
						<a href="<?php echo "qaq.php?page=" . $page_max; ?>">尾页</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>