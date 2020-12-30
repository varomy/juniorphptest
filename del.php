<?php
$db= mysqli_connect("localhost","id15795582_makho","250986maXuna_","id15795582_juniorwebtest");
$name = $_GET['chb'];

foreach ($name as $chb){ 

    $sql=$db->prepare("DELETE FROM products WHERE id=?");
    $sql->bind_param("i",$chb);
    $sql->execute();
    
}
header("Location: index.php");
?>