<?php
$problem_class = "qaq";
// 按时间顺序显示的条数
$problem_shownum = 4;

//搜索 按时间顺序前 $problem_shownum 条
$problem_shownum++;

//统计一下新闻条数
$sql_num = "SELECT count(*) FROM cptp_others WHERE class='{$problem_class}' AND website='{$website}'";
$problem_sum = mysqli_fetch_array(mysqli_query($link, $sql_num));

//如果想显示的比实际的多,则只显示实际条数
if ($problem_sum[0] < $problem_shownum) {
    $problem_shownum = $problem_sum[0];
}

$sql_problem = "SELECT * FROM cptp_others WHERE class='{$problem_class}' AND website='{$website}' ORDER BY addtime DESC LIMIT {$problem_shownum}";
$result = mysqli_query($link, $sql_problem);
$i = 0;

while (($row = mysqli_fetch_assoc($result)) & ($i <= $problem_shownum)) {
    $problemArr[$i]["problem_id"] = $row["id"];
    $problemArr[$i]["problem_title"] = $row["title"];
    $problemArr[$i]["problem_summary"] = $row["summary"];
    $problemArr[$i]["problem_img_url"] = $row["img_url"];
    $problemArr[$i]["problem_addtime"] = substr($row["addtime"], 5, 5);
    ////////////////////////////////根据伪静态的定义重写转向url
    $problemArr[$i]["problem_url"] = "qaq_show.php?qaq_id=" . $row["id"];

    $i++;
}

?>

									<div class="Problem">
			<div class="ProblemTop"><?php echo $website; ?>加盟常见问题</div>
			<div class="ProblemList">
				<ul>
<?php
$problem_shownum--;
for ($i = 0; $i < $problem_shownum;) {
    //如果对标题的长度有限制
    $problem_title_short = mb_substr($problemArr[$i]["problem_title"], 0, 14, 'utf-8');
    $problem_summary_short = mb_substr($problemArr[$i]["problem_summary"], 0, 87, 'utf-8');
    echo <<< EOT
					<li>
						<div class="Img l">
							<a href="{$problemArr[$i]["problem_url"]}"><img src="{$problemArr[$i]["problem_img_url"]}" onerror="this.src='/schtml/default/images/QA.jpg'" /></a>
						</div>
						<div class="Con r">
							<div class="Title">
								<a href="{$problemArr[$i]["problem_url"]}"><span>Q：</span>{$problem_title_short}</a>
							</div>
							<div class="Cont"><span>A：</span>{$problem_summary_short}
								<a href="{$problemArr[$i]["problem_url"]}">查看详细>></a>
							</div>
						</div>
					</li>
EOT;
    $i = $i + 1;
}
?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>