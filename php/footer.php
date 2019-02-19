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
            <p>总部地址：<?php echo $infoArr[$website]["address"]; ?></p>
        </div>
        <div class="FooterCopy"><?php echo $infoArr[$website]["copyright"]; ?>
            <a href="http://www.miitbeian.gov.cn            nk"><?php echo $infoArr[$website]["mitbeian"]; ?></a>
            <br>投资有风险,选择需谨慎
        </div>
    </div>

    <div class="clear"></div>
</div>

<div class="FooterLink">
    <div class="c1200">
    
        <div class="l">友情链接：</div>
        <div class="l">
        <h6>
        <?php include_once "link.php";?>
        </h6>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php 
if($infoArr[$website]["53kf_status"]==1){
echo $infoArr[$website]["53kf"];
}
?>