<?php
session_start();
$connect = @new mysqli("localhost","root","","antyki");
if(!strlen($_POST['podkategoria'])<1){
  $kat=$_SESSION['dasd'];
$podkategoria=$_POST['podkategoria'];
mysqli_query($connect,"INSERT INTO `podkategorie` (`podkategoria`, `kategoria`)
    VALUES ('".$podkategoria."', '".$kat."');");
    header('Location: adminmenu.php');
  }
 ?>
