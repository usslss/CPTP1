<?php

$sql_link = "SELECT * FROM link WHERE link_website='{$website}'";
$result = mysqli_query($link, $sql_link);

$i = 1;

while ($row = mysqli_fetch_assoc($result)) {

    $linkArr[$i]["link_name"] = $row["link_name"];
    $linkArr[$i]["link_url"] = $row["link_url"];
    $i++;

}
$link_sum = $i;

?>



<?php

for ($i = 1; $i < $link_sum; $i++) {
    if (($i % ($link_sum - 1)) == 0) {
        echo <<< EOT
<p><a title="{$linkArr[$i]["link_name"]}" href="{$linkArr[$i]["link_url"]}" target="_blank">{$linkArr[$i]["link_name"]}</a></p>

EOT;

    } else {
        echo <<< EOT
<p><a title="{$linkArr[$i]["link_name"]}" href="{$linkArr[$i]["link_url"]}" target="_blank">{$linkArr[$i]["link_name"]}</a><span>|</span></p>

EOT;
    }

}

?>