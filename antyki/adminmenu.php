<html><head>
  <meta charset="utf-8">
  <link rel="stylesheet" href=" style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
  <?php
  session_start();
  ?>
  </head>
  <body>
    <div class='adminmenu'>
      <?php
      if(!isset($_SESSION['logged']))
      {echo "
      <form action='connect.php' method='post' id='register'>
        <label>Login:<br> <input type='text' name='login'></label><br>
        <label>Hasło:<br> <input type='password' name='passwd'></label><br>
        <label><br><input type='submit' value='Zaloguj' name='Zaloguj'></label>
      </form>";
    }
      ?>
      <?php
      if(isset($_SESSION['logged']))
      {
        echo "<a href='wyborpodkat.php'>Dodaj aukcje</a><br>
        <a href='kategoria.php'>Dodaj kategorie</a><br>
        <a href='podkat.php'>Dodaj podkategorie</a>";
      }
       ?>
</div>
</body>
</html>
