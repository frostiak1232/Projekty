<?php
session_start();
$connect = @new mysqli("localhost","root","","antyki");
$fff=$_POST['kategoriaaukcja'];
$query = "SELECT podkategoria FROM podkategorie where kategoria='$fff' order by podkategoria";
$results=mysqli_query($connect,$query);
$_SESSION['kategoriaaukcja']=$_POST['kategoriaaukcja'];
//$dddd = mysqli_fetch_array($results,MYSQLI_ASSOC);
?>
<html><head>
  <meta charset="utf-8">
  <link rel="stylesheet" href=" style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
</head>
<body>
  <div class='wysylanie'>
  <form  action="upload.php" method="post" enctype='multipart/form-data'>
    <label>Nazwa:<br> <input type="text" name="nazwa"></label>
    <?php
      if (isset($_SESSION['nazwa_e'])) echo $_SESSION['nazwa_e'];
      unset($_SESSION['nazwa_e']);
     ?><br>
    <label>Opis:<br> <textarea name='opis'></textarea></label>
    <?php
      if (isset($_SESSION['opis_e'])) echo $_SESSION['opis_e'];
      unset($_SESSION['opis_e']);
     ?><br>
     <label>Cena:<br> <input type="number" name="cena"></label>
     <?php
       if (isset($_SESSION['cena_e'])) echo $_SESSION['cena_e'];
       unset($_SESSION['cena_e']);
      ?><br><br>
      <select name='podkategoria'>
      <?php
      while ($dddd = mysqli_fetch_array($results)) {
        echo "<option value=".$dddd['podkategoria']." >".$dddd['podkategoria']."</option>";
      }
      ?>
      </select>
      <br><br>
      Zdjecie:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>(Opcjonalne kolejne zdjęcie)
    <input type="file" name="fileToUpload2" id="fileToUpload2"><br>(Opcjonalne kolejne zdjęcie)
    <input type="file" name="fileToUpload3" id="fileToUpload3"><br>(Opcjonalne kolejne zdjęcie)
    <input type="file" name="fileToUpload4" id="fileToUpload4"><br>(Opcjonalne kolejne zdjęcie)
    <input type="file" name="fileToUpload5" id="fileToUpload5">
    <br>
    <?php
    if(isset($_SESSION['logged']))
    {
    echo "<label><br><input type='submit' value='Dodaj' name='dodaj'></label>";
  }
    ?>
  </form>
</div>
</body>
</html>
