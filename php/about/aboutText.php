<?php
$module_class = "about_text";

$sql_about = "SELECT * FROM cptp_others WHERE class='$module_class' AND website='$website'";
$result = mysqli_query($link, $sql_about);

while ($row = mysqli_fetch_assoc($result)) {
    $aboutTextAll = $row["text_all"];
}

echo $aboutTextAll;
?>