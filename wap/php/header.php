<?php

$sql_nav = "SELECT * FROM cptp_nav WHERE website='{$website}'";

$result = mysqli_query($link, $sql_nav);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {

    $navArr[$i]["name"] = $row["name"];
    $navArr[$i]["page"] = $row["page"];
    $navArr[$i]["url"] = $row["url"];
    if ($row["page"] == $page) {
        $navArr[$i]["class"] = "on";
        $pageUrl=$row["url"];
        $pageName=$row["name"];
    } else {
        $navArr[$i]["class"] = "";
    }
    $i++;

}
$navArr[0]["class"] = "";
$nav_sum = $i;

//网站信息获取
$sql_info = "SELECT * FROM cptp_info WHERE website='{$website}'";

$result = mysqli_query($link, $sql_info);

while ($row = mysqli_fetch_assoc($result)) {

    $infoArr[$website]["tel"] = $row["tel"];
    $infoArr[$website]["email"] = $row["email"];
    $infoArr[$website]["address"] = $row["address"];
    $infoArr[$website]["copyright"] = $row["copyright"];
    $infoArr[$website]["mitbeian"] = $row["mitbeian"];
    $infoArr[$website]["jmsum"] = $row["jmsum"];
    $infoArr[$website]["53kf"] = $row["wap_53kf"];

}

?>
<!-- 移动适配JS脚本 -->
<!--
	<script type="text/javascript">
    if (window.location.toString().indexOf('pref=padindex') != -1) {
    } else {
        if (/AppleWebKit.*Mobile/i.test(navigator.userAgent) || /\(Android.*Mobile.+\).+Gecko.+Firefox/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
            if (window.location.href.indexOf("?mobile")<0){
                try {
                    if (/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                        window.location.href="/wap/<?php echo $page; ?>";
                    } else if (/iPad/i.test(navigator.userAgent)) {
                        //window.location.href="/wap/"
                    } else {
                        window.location.href="/wap/<?php echo $page; ?>"
                    }
                } catch (e) {}
            }
        }
    }
</script>
 -->
 <nav class="cbp-spmenu cbp-spmenu-right" id="cbp-right">
			<h3>快捷导航</h3>
			<div class="subNavBox">
				<?php
for ($i = 1; $i < $nav_sum; $i++) {
    //如果对标题的长度有限制
    echo <<< EOT
				<div class="subNav">
					<a href="{$navArr[$i]["url"]}">{$navArr[$i]["name"]}</a>
				</div>    
EOT;
}
?>
			</div>
		</nav>

		<div class="header">
			<div class="header_logo l">
				<a href="<?php echo $navArr[0]["url"];?>"><img src="picture/header_logo.png" height="26"></a>
			</div>
			<div class="header_nav r">
				<a id="showRight"></a>
			</div>
		</div>