<html><head>
  <meta charset="utf-8">
  <link rel="stylesheet" href=" style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
  <?php
  session_start();
  $connect = @new mysqli("localhost","root","","antyki");
  $query = "SELECT kategoria FROM kategorie where kategoria!='Brak' order by kategoria";
  $results=mysqli_query($connect,$query);
  ?>
  </head>
  <body>
    <div class="podkat">
    <form  action="podkategoria.php" method="post" enctype='multipart/form-data'>
    <label><br>Wybierz do jakiej kategorii chcesz dodać podkategorie:<br><br> <select name='kategoria'>
      <?php
      while ($dddd = mysqli_fetch_array($results)) {
        echo "<option value=".$dddd['kategoria']." >".$dddd['kategoria']."</option>";
      }
      ?>
      </select></label><br>
      <?php
      if(isset($_SESSION['logged']))
      {
      echo "<label><br><input type='submit' value='Dodaj' name='dodaj'></label>";
    }
      ?>
    </form><br></div>
  </body></html>
