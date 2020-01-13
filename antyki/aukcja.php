<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href=" ../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/lightbox.min.css">
    <script src="../lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
    <title>Antyki-swarzędz</title>
    <?php
    session_start();
    ?>

  </head>
  <body>
    <div class="container">
      <div class="header">
      <img src="../img/logo.png">
      </div>
      <div class="menu1">
        <div class="left">
        <a class="ad" href='../index.php'>Przedmioty</a></div>
          <div class="right">
          <a class="ad2" href='../kontakt.php'>Kontakt</a></div>
          <div class="right2">
          <a class="ad3" href='../galeria.php'>Galeria</a></div>
      </div>
      <div class="boxauckcja">
        <table class='ddds'><tr><td class='lewytable'></td><td class='srodkowytable'>

<?php
$connect = @new mysqli("localhost","root","","antyki");
//$nazwa=@$_POST['xxx'];
$id=basename($_SERVER['SCRIPT_FILENAME']);
$id=substr($id,0,-4);
$query = "SELECT * FROM produkty where id=$id";
$results=mysqli_query($connect,$query);
 while($row = mysqli_fetch_array($results)){
   echo "<br><h1>".$row['nazwa']."</h1>";
   $miejsce="../uploads/";
   $miejsce .=$row['zdjecie'];
   echo "<br><img src='$miejsce'>";
   echo "<div class='row'>";
   $miejsce2="../uploads/";
   $miejsce2 .=$row['zdjecie2'];
   $miejsce3="../uploads/";
   $miejsce3 .=$row['zdjecie3'];
   $miejsce4="../uploads/";
   $miejsce4 .=$row['zdjecie4'];
   $miejsce5="../uploads/";
   $miejsce5 .=$row['zdjecie5'];
   if(!strlen($row['zdjecie2'])<1)
   {
     echo "<a href='$miejsce' data-lightbox='mygallery'><img class='ddd' src='$miejsce'></a>";
     echo "<a href='$miejsce2' data-lightbox='mygallery'><img class='ddd' src='$miejsce2'></a>";
   }
   if(!strlen($row['zdjecie3'])<1)
   {
     echo "<a href='$miejsce3' data-lightbox='mygallery'><img class='ddd' src='$miejsce3'></a>";
   }
   if(!strlen($row['zdjecie4'])<1)
   {
     echo "<a href='$miejsce4' data-lightbox='mygallery'><img class='ddd' src='$miejsce4'></a>";
   }
   if(!strlen($row['zdjecie5'])<1)
   {
     echo "<a href='$miejsce5' data-lightbox='mygallery'><img class='ddd' src='$miejsce5'></a>";
   }
  echo "</div><br><br><b>Cena: ".$row['cena']." zł</b><p>";
  echo "<br><br>".$row['opis']."</p>";

   //--

   //--
 }
  ?>
  <br><br>Kontakt:<br>tel. 61 651 10 19<br>email: wichur55@gmail.com<br><br>
  <?php
  if(isset($_SESSION['logged']))
  {
    echo "<form  action='../usuwanie.php' method='post'>
    <label><br><input type='submit' value='$id' name='Usun'></label>
  </form>";
  }
   ?>

</td><td class='prawytable'></td></tr></table>
      </div>
      <div class="stopka">
        <p>Wykonał: Arkadiusz Krupka</p>
    </div>
    </div>

  </body>
  </html>
