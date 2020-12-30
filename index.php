<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>junior web test makho asanidze</title>
</head>
<body>

<div width='100%' style='position:relative;display:flex;margin-top:30px;font-size:30px;border-bottom:1px black solid'>Product List
<div style='position:absolute;right:0px'>
<a href='add.php'><button>ADD</button></a>
<input type='submit' name='del' form='delf' value='MASS DELETE'></div>
</div>

<?php
$db= mysqli_connect("localhost","id15795582_makho","250986maXuna_","id15795582_juniorwebtest");
$products="";
$sql="SELECT *FROM products ORDER BY id";  
$res=mysqli_query($db,$sql);
if(mysqli_num_rows($res)>0){
while($row=mysqli_fetch_assoc($res)){
$id=$row['id'];
$sku=$row['sku'];
$name=$row['name'];
$price=$row['price'];
$bytes=$row['bytes'];
$height=$row['height'];
$width=$row['width'];
$length=$row['length'];
$weight=$row['weight'];










$products .="<div style='position:relative;text-align: center;overflow:hidden;margin:20px;;width:150px;height:150px;border:solid 2px black;'>
<input style='position:absolute;top:1%;left:1%;' type='checkbox' value='$id' name='chb[]'>
<div style='margin:1px;'>$sku</div>
<div style='margin:1px;'>$name</div>
<div style='margin:1px;'>$price</div>
<div style='margin:1px;'>$bytes</div>
<div style='margin:1px;'>$height</div>
<div style='margin:1px;'>$width</div>
<div style='margin:1px;'>$length</div>
<div style='margin:1px;'>$weight</div>
</div>";
}

echo "<form id='delf' action='del.php' method='get'><div  style='width:100%;flex-wrap: wrap;display:flex;flex-direction:row;'>".$products."</div></form>";
}else{echo "no products!";}


?>


</body>
</html>