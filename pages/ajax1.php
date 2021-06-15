<?php
include_once('functions.php');
$link=connect();
$cid=$_GET['cid'];
$sel='select * from cities where countryid='.$cid;
$res=mysqli_query($link,$sel);
echo '<option value="0">select city</option>';
while ($row=mysqli_fetch_array($res,MYSQLI_NUM)) {
echo '<option value="'.$row[0].'">'.$row[1].'</options>';
}
mysqli_free_result($res);
?>