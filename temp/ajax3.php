<?php
include_once('functions.php');
$link=connect();
$cid=$_POST['cid'];
$sel='select * from hotels where cityid='.$cid;
$res=mysqli_query($link,$sel);
echo '<option value="0">select hotel</option>';
while ($row=mysqli_fetch_array($res,MYSQLI_NUM)) {
echo '<option value="'.$row[0].'">'.$row[1].'</options>';
}
mysqli_free_result($res);

?>