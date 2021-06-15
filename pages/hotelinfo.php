<!DOCTYPE html>
<html lang="en">
<style>
li {
    list-style-type: none;
    /* Убираем маркеры */
}

ul {
    margin-left: 0;
    /* Отступ слева в браузере IE и Opera */
    padding-left: 0;
    /* Отступ слева в браузере Firefox, Safari, Chrome */
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Info</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/info.css">

</head>

<body>
    <?php
include_once ("functions.php");
if(isset($_GET['hotel'])){

	$hotel=$_GET['hotel'];

	$link=connect();
	$sel='select * from hotels where id='.$hotel;
	$sel2 = 'select * from comments where hotelid='.$hotel;
	$res=mysqli_query($link,$sel);
	$res2=mysqli_query($link,$sel2);
	$row=mysqli_fetch_array($res,MYSQLI_NUM);
	$hname=$row[1];
	$hstars=$row[4];
	$hcost=$row[5];
	$hinfo=$row[6];
	mysqli_free_result($res);

	echo '<main><h2 class="text-uppercase text-center">'.$hname.'</h2>';
	echo '<div class="row"><div class="col-md-6 text-center">';

	connect();
	$sel='select imagepath from images where hotelid='.$hotel;
	$res=mysqli_query($link,$sel);

	echo '<span class="label label-info">Watch our pictures</span>';

	
	
	echo'<ul id="gallery">';
    $i=0;
	while($row=mysqli_fetch_array($res,MYSQLI_NUM)){
		echo ' <li><img src="../'.$row[0].'" width="200px"></li>';
	}
	mysqli_free_result($res);
	echo ' </ul>';

	for ($i=0; $i<$hstars; $i++) 
	{
		echo '<image src="../images/star.png" alt="star">';
	}
	echo '<h2 class="text-center">Cost&nbsp;<span class="label label-info">'
	.$hcost.' $</span>';

	echo '<a href="#" class="btn btn-success">Book This Hotel</a></h2>';

	echo '</div><div class="col-md-6"><p class="well">'.$hinfo.'</p></div>';

	echo '<h3>Comments</h3>';
	echo'<ul id="comments">';
    $i=0;
	while($row=mysqli_fetch_array($res2,MYSQLI_NUM)){
		echo ' <li>'.$row[1].'</li>';
	}
	mysqli_free_result($res2);
	echo ' </ul>';

	echo '</div></main>';
	
}
 ?>

    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js//gallery.js"></script>
</body>

</html>