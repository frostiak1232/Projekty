<?php
session_start();
$connect = @new mysqli("localhost","root","","antyki");
$nazwa=$_SESSION['dokop'];
$query = "SELECT * FROM produkty where nazwa='$nazwa'";
$results=mysqli_query($connect,$query);
$nowyplik='aukcje/';
 while($row = mysqli_fetch_array($results)){
   $file = 'aukcja.php';
   $nowyplik.=$row['id'];
   $nowyplik.='.php';
   $newfile = $nowyplik;
   if (!copy($file, $newfile)) {
    echo "failed to copy";
}
 }
 header('Location: adminmenu.php');
  ?>
