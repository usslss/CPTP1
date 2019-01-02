<?php

include_once "php/connect.php";

$sql_switch = "SELECT * FROM cptp_info WHERE website='雾社茶町'";
$result = mysqli_query($link, $sql_switch);

while ($row = mysqli_fetch_assoc($result)) {
    $switchStatus = $row["53kf_status"];
    $switchId = $row["id"];

}

?>


  <input type="checkbox" name="show" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="showCheckbox" {{ (

<?php

if ($switchStatus == 1) {
    echo <<< EOT
    (d.id == {$switchId})
EOT;
} else {
    echo <<< EOT
    (d.id == 0)
EOT;
}

?>
) ? 'checked' : '' }}>
