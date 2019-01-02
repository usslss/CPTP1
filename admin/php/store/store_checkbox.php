<?php

include_once("php/connect.php");


$sql_store="SELECT * FROM store WHERE store_show=1";
$result=mysqli_query($link, $sql_store);

$sql_num="SELECT count(*) FROM store WHERE store_show=1";
$store_sum=mysqli_fetch_array(mysqli_query($link, $sql_num));

$i=1;

while ($row=mysqli_fetch_assoc($result)){
    $switchShowArr[$i]["store_id"] = $row["store_id"];   
    $i++;
}

?>


  <input type="checkbox" name="show" value="{{d.store_id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="showCheckbox" {{ (

<?php 

if($store_sum[0]==0){
    echo <<< EOT
  (d.store_id == 0)
EOT;
    
}else{

for ($i=1;$i<=$store_sum[0];$i++){
    //如果对标题的长度有限制

if($i==1){
    echo <<< EOT
    (d.store_id == {$switchShowArr[$i]["store_id"]}) 
EOT;
} else {
    echo <<< EOT
|(d.store_id == {$switchShowArr[$i]["store_id"]})      
EOT;
}

}
    }
?>
  ) ? 'checked' : '' }}>