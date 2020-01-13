<html><head>
  <meta charset="utf-8">
  <link rel="stylesheet" href=" style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
</head><body>
  <div class='wysylanie'>
  <form  action="katupload.php" method="post" enctype='multipart/form-data'>
    <label><br>Kategoria:<br><br> <input type="text" name="kategoria"></label><br>
    <?php
    session_start();
    if(isset($_SESSION['logged']))
    {
    echo "<label><br><input type='submit' value='Dodaj' name='dodaj'></label>";
  }
    ?>
  </form>
  </div>
</body></html>
