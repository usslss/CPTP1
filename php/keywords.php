<?php

$sql_key="SELECT * FROM page WHERE page_class='{$page}_{$website}'";

$result=mysqli_query($link, $sql_key);

while ($row=mysqli_fetch_assoc($result)){
    $page_title=$row["page_title"];
    $page_keywords=$row["page_keywords"];
    $page_description=$row["page_description"];
}

?>
<title><?php echo $page_title;?></title>
<meta name="keywords" content="<?php echo $page_keywords;?>" />
<meta name="description" content="<?php echo $page_description;?>">
