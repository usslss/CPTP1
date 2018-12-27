<div class="Footer">

<div class="FooterC">
    <div class="Bottom l">
        <div class="FooterNav">

            <?php
for ($i = 0; $i < ($nav_sum ); $i++) {
    if ($i == ($nav_sum - 1)) {
        echo <<< EOT
        <p>
        <a href="{$navArr[$i]["url"]}">{$navArr[$i]["name"]}</a></p>
    <p>

EOT;

    } else {
        echo <<< EOT
        <p>
        <a href="{$navArr[$i]["url"]}">{$navArr[$i]["name"]}</a><span>|</span></p>
    <p>

EOT;
    }

}
?>
        </div>
        <div class="FooterContact">
            <p>加盟热线：<?php echo $infoArr[$website]["tel"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;官方邮箱：<?php echo $infoArr[$website]["email"]; ?></p>
            <p>总部地址：<?php echo $infoArr[$website]["address"]; ?></p>
        </div>
        <div class="FooterCopy"><?php echo $infoArr[$website]["copyright"]; ?>
            <a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $infoArr[$website]["mitbeian"]; ?></a>
        </div>
    </div>
    <div class="Erweima r">
        <img src="picture/erweima.jpg" width="120px" height="120px" />
        <p>扫一扫关注<?php echo $website; ?></p>
    </div>
    <div class="clear"></div>
</div>

<div class="FooterLink">
    <div class="c1200">
        <div class="l">友情链接：</div>
        <div class="l">
        <?php include_once "link.php";?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php //最后记得恢复这里的53客服 
/*<script>(function() {var _53code = document.createElement("script");_53code.src = "https://tb.53kf.com/code/code/10180534/4";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>*/
?>