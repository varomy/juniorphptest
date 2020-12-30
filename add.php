<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>junior web test add</title>
    <script>
  function validateForm() {
    document.getElementById("err").innerHTML=""
    if (document.forms["form)"]["sku"].value == "") {
     document.getElementById("err").innerHTML+="SKU is empty,";
    }
    if (document.forms["form)"]["name"].value == "") {
     document.getElementById("err").innerHTML+="Name is empty,";
    }
    if (document.forms["form)"]["price"].value == "") {
     document.getElementById("err").innerHTML+="Price is empty,";
    }
    if (document.forms["form)"]["bytes"]&&document.forms["form)"]["bytes"].value == "") {
        document.getElementById("err").innerHTML+="bytes is empty,";
    }
    if (document.forms["form)"]["height"]&&document.forms["form)"]["height"].value == "") {
        document.getElementById("err").innerHTML+="height is empty,";
    }
    if (document.forms["form)"]["width"]&&document.forms["form)"]["width"].value == "") {
        document.getElementById("err").innerHTML+="width is empty,";
    }
    if (document.forms["form)"]["length"]&&document.forms["form)"]["length"].value == "") {
        document.getElementById("err").innerHTML+="length is empty,";
    }
    if (document.forms["form)"]["weight"]&&document.forms["form)"]["weight"].value == "") {
        document.getElementById("err").innerHTML+="weight is empty,";
    }
    if (document.getElementById('err').innerHTML == ""){
        return true;
    }
    return false;




}
</script>
</head>
<body>


<?php


$db= mysqli_connect("localhost","id15795582_makho","250986maXuna_","id15795582_juniorwebtest");

if(isset($_POST['add'])){
    $sku=$_POST['sku'];
    $sql2 = $db->prepare("SELECT *FROM products WHERE sku=?");
    $sql2->bind_param("s", $sku);
    $sql2->execute();
    $res=$sql2->get_result();
    if(mysqli_num_rows($res)>0){
 $sku_err="There is such SKU!";
}else{


    $name=$_POST['name'];
    $price=$_POST['price'];
  
  if(isset($_POST['bytes'])){$bytes=$_POST['bytes'];}else$bytes="";
  if(isset($_POST['height'])){$height=$_POST['height'];}else$height="";
  if(isset($_POST['width'])){$width=$_POST['width'];}else$width="";
  if(isset($_POST['length'])){ $length=$_POST['length'];}else$length="";
  if(isset($_POST['weight'])){$weight=$_POST['weight'];}else$weight="";







  $sql = $db->prepare("INSERT INTO products (sku,name,price,bytes,height,width,length,weight) VALUES (?, ?, ?, ?, ?,?,?,?)");
  $sql->bind_param("ssssssss", $sku, $name,$price, $bytes, $height,$width,$length,$weight);
  $sql->execute();
 $sql->close();
 $db->close();
 echo"<script>location.href = 'https://makhojuniorwebtest.000webhostapp.com/index.php';</script>";

}
}
?>


<div width='100%' style='position:relative;display:flex;margin-top:30px;font-size:30px;border-bottom:1px black solid'>Product Add
<div style='position:absolute;right:0px'>
<input type='submit' name='add' form='addf' value='Add' />
<a href='index.php'><button>Cancel</button></a>
</div>
</div>
<div style="color:red" id="err"></div>
<form onsubmit="return validateForm()" name="form)" id='addf' action="" method="post"><br><br>
 SKU <input name='sku' type="text">
 <?php if (isset($sku_err)): ?>
	  	<span style="color:red"><?php echo $sku_err; ?></span>
	  <?php endif ?>
 <br><br>
 Name <input name='name' type="text"><br><br>
 Price ($) <input name='price' type="text"><br><br>

 <label for="dim">Choose Dimension:</label>

<select name="dim" id="dim">
  <option value="1">DVD-disc</option>
  <option value="2">Furniture</option>
  <option value="3">Book</option>
</select>
<div id='dimens'></div>
<script>
  document.getElementById("dim").onchange = changeListener;
  var ddiv= document.getElementById("dimens");
  function changeListener(){
  var value = this.value
    if (value == "1"){
       ddiv.innerHTML = "<br><div>Size (MB) <input name='bytes' type='text'></div><br><br>";
    }
     if (value == "2"){
        ddiv.innerHTML = "<br><div>Height <input name='height' type='text'><br><br>Width <input name='width' type='text'><br><br>Length <input name='length' type='text'></div><br><br>";
    }
    if (value == "3"){
        ddiv.innerHTML = "<br><div>Weight <input name='weight' type='text'><div><br><br>";
    }
  }

</script>





</form>










</body>
</html>