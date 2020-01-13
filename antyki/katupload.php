  <?php
  session_start();
  $connect = @new mysqli("localhost","root","","antyki");
  if(!strlen($_POST['kategoria'])<1){
  $kategoriaa=$_POST['kategoria'];
  mysqli_query($connect,"INSERT INTO `kategorie` (`kategoria`)
      VALUES ('".$kategoriaa."');");
      header('Location: adminmenu.php');
    }
   ?>
