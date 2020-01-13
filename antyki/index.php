<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href=" style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
    <title>Antyki-swarzędz</title>
    <?php
    session_start();
    $connect = @new mysqli("localhost","root","","antyki");
    if(!strlen(@$_POST['sort'])<1){
      $_SESSION["sort"]=$_POST['sort'];
    }
    if(!strlen(@$_POST['kategoria'])<1){
      $_SESSION["kategoria"]=$_POST['kategoria'];
      $_SESSION["podkategoriaa"]='';
      $_SESSION["search"]='';
    }
    if(!strlen(@$_POST['podkategoria'])<1){
      $_SESSION["podkategoriaa"]=$_POST['podkategoria'];
    }
    if(!strlen(@$_POST['search'])<1){
      $_SESSION["search"]=$_POST['search'];
      $_SESSION["podkategoriaa"]='';
      $_SESSION["kategoria"]='';
      $_SESSION["sort"]='';
    }

            $sortowanie=@$_SESSION["sort"];
            $kategoriaaa=@$_SESSION["kategoria"];
            $podkategoria=@$_SESSION["podkategoriaa"];
            $search=@$_SESSION["search"];
    ?>
  </head>
  <body>
    <div class="container">
      <div class="header">
      <img src="img/logo.png">
      </div>
      <div class="menu">
        <div class="left">
        <a class="ad" href='index.php'>Przedmioty</a></div>
          <div class="right">
          <a class="ad2" href='kontakt.php'>Kontakt</a></div>
          <div class="right2">
          <a class="ad3" href='galeria.php'>Galeria</a></div>
      </div>
      <div class="box">
        <form  action="index.php" method="post" enctype='multipart/form-data'>
          <br><label>Czego szukasz?<br><br> <input type="text" name="search"></label><br>
          <label><br><input class="myButton" type="submit" value="Szukaj" name="Szukaj"></label>
        </form>
        <form  action="index.php" method="post" enctype='multipart/form-data'>
        <label><br>Kategoria:<br><br> <select name='kategoria'>
          <option value="Brak">Brak</option>;
        <?php
        $query = "SELECT kategoria FROM kategorie where kategoria!='Brak' order by kategoria";
        $results=mysqli_query($connect,$query);
        while ($dddd = mysqli_fetch_array($results)) {
          echo "<option value=".$dddd['kategoria']." >".$dddd['kategoria']."</option>";
        }
        ?>
        </select></label><br>
        <label><br><input class="myButton" type="submit" value="Wybierz" name="Wybierz"></label>
      </form><br>
      <?php
      $query = "SELECT podkategoria FROM podkategorie where kategoria='$kategoriaaa' order by podkategoria";
      $results=mysqli_query($connect,$query);
      if(!strlen(@$_SESSION['kategoria'])<1&&@$_SESSION['kategoria']!='Brak'){
        echo "<form  action='index.php' method='post' enctype='multipart/form-data'>
        <label><br>Podkategoria:<br><br> <select name='podkategoria'>
          <option value='Brak'>Brak</option>";
        while ($dddd = mysqli_fetch_array($results)) {
          echo "<option value=".$dddd['podkategoria']." >".$dddd['podkategoria']."</option>";
        }
        echo "</select></label><br>
        <label><br><input class='myButton' type='submit' value='Wybierz' name='Wybierz'></label>
      </form><br>";
      }
      if(strlen(@$_SESSION['search'])<1){
      echo "<form  action='index.php' method='post' enctype='multipart/form-data'>
      <label><br>Sortuj według:<br><br> <select name='sort'>
        <option value='cenasmall'>Cena: od najniżej</option>;
        <option value='cenamax'>Cena: od najwyżej</option>;
        <option value='nowe'>Najnowsze</option>;
        <option value='stare'>Najstarsze</option>;
      </select></label><br>
      <label><br><input class='myButton' type='submit' value='Wybierz' name='Wybierz'></label>
    </form>";
  }
      ?>
      <br>
      </div>
      <div class="mid">
      </div>
      <div class="box2">
        <?php

        if(!isset($results_per_page)){
        $results_per_page = 20;}
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * $results_per_page;
        $datatable="produkty";
        //$query = "SELECT * FROM ".$datatable." where kategoria=$kategoriaaa ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
        //$query = "SELECT nazwa,cena,opis,zdjecie FROM produkty order by nazwa ASC LIMIT '".$start_from."', '".$results_per_page."'";
        //$results=mysqli_query($connect,$query);

        if(!strlen(@$_SESSION['search'])<1){
          $search=trim($search);
          $query = "SELECT * FROM ".$datatable." Where nazwa Like '%$search%' Or opis Like '%$search%' Or kategoria Like '%$search%' or podkategoria Like '%$search%' LIMIT $start_from, ".$results_per_page ;
          $results=mysqli_query($connect,$query);
          echo "<table>";
          while ($row = mysqli_fetch_array($results)) {
            $miejsce="uploads/";
            $miejsce .=$row['zdjecie'];
            $adres='aukcje/'.$row['id'].'.php';
            echo "<tr class='zzz'>";
            echo "<td class='obraz'><img src=".$miejsce."></td>";
            echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
            echo "<td class='cena'>".$row['cena']."zł.</td>";
            echo "</tr>";
          }
          echo "</table>";
          if(mysqli_num_rows($results)==0){
            echo "<p>Nie znaleziono wyników</p>";
          }



        $query = "SELECT COUNT(*) AS total FROM ".$datatable." Where nazwa Like '%$search%' Or opis Like '%$search%' Or kategoria Like '%$search%' or podkategoria Like '%$search%'" ;
        $results=mysqli_query($connect,$query);
        $row = mysqli_fetch_array($results);
        $total_pages = ceil($row["total"] / $results_per_page);
        echo "<div class='strony'>";
        for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='index.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> ";
}echo "</div>";
        }else{
        switch(@$sortowanie){
          case 'cenasmall':
          if(!strlen($kategoriaaa)<1){
            if($kategoriaaa=="Brak"){
              goto a;
            }
            if(!strlen(@$_SESSION['podkategoriaa'])<1){
              $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' and podkategoria='".$podkategoria."' ORDER BY cena ASC LIMIT $start_from, ".$results_per_page;
            }else{
            $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' ORDER BY cena ASC LIMIT $start_from, ".$results_per_page;
          }
            $results=mysqli_query($connect,$query);
            echo "<table>";
            while ($row = mysqli_fetch_array($results)) {
              $miejsce="uploads/";
              $miejsce .=$row['zdjecie'];
              echo "<tr class='zzz'>";
              echo "<td class='obraz'><img src=".$miejsce."></td>";
              $adres='aukcje/'.$row['id'].'.php';
              echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
              echo "<td class='cena'>".$row['cena']."zł.</td>";
              echo "</tr>";
            }
            echo "</table>";


          $query = "SELECT COUNT(*) AS total FROM ".$datatable." where kategoria='$kategoriaaa' and podkategoria='$podkategoria'" ;
          $results=mysqli_query($connect,$query);
          $row = mysqli_fetch_array($results);
          $total_pages = ceil($row["total"] / $results_per_page);
          echo "<div class='strony'>";
          for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
              echo "<a href='index.php?page=".$i."'";
              if ($i==$page)  echo " class='curPage'";
              echo ">".$i."</a> ";
  }echo "</div>";}else{
    a:
    $query = "SELECT * FROM ".$datatable." ORDER BY cena ASC LIMIT $start_from, ".$results_per_page;
    $results=mysqli_query($connect,$query);
    //$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
    echo "<table>";
    while ($row = mysqli_fetch_array($results)) {
      $miejsce="uploads/";
      $miejsce .=$row['zdjecie'];
      echo "<tr class='zzz'>";
      echo "<td class='obraz'><img src=".$miejsce."></td>";
      $adres='aukcje/'.$row['id'].'.php';
      echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
      //echo "<td class='tytul'>".$row['nazwa']."</td>";
      echo "<td class='cena'>".$row['cena']."zł.</td>";
      echo "</tr>";
    }
    echo "</table>";


  $query = "SELECT COUNT(*) AS total FROM ".$datatable;
  $results=mysqli_query($connect,$query);
  $row = mysqli_fetch_array($results);
  $total_pages = ceil($row["total"] / $results_per_page);
  echo "<div class='strony'>";
  for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
      echo "<a href='index.php?page=".$i."'";
      if ($i==$page)  echo " class='curPage'";
      echo ">".$i."</a> ";
  };
  echo "</div>";
  }
  break;
  case 'cenamax':
  if(!strlen($kategoriaaa)<1){
    if($kategoriaaa=="Brak"){
      goto c;
    }
    if(!strlen(@$_SESSION['podkategoriaa'])<1){
      $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' and podkategoria='".$podkategoria."' ORDER BY cena DESC LIMIT $start_from, ".$results_per_page;
    }else{
    $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' ORDER BY cena DESC LIMIT $start_from, ".$results_per_page;
  }
    $results=mysqli_query($connect,$query);
    echo "<table>";
    while ($row = mysqli_fetch_array($results)) {
      $miejsce="uploads/";
      $miejsce .=$row['zdjecie'];
      echo "<tr class='zzz'>";
      echo "<td class='obraz'><img src=".$miejsce."></td>";
      $adres='aukcje/'.$row['id'].'.php';
      echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
      echo "<td class='cena'>".$row['cena']."zł.</td>";
      echo "</tr>";
    }
    echo "</table>";


  $query = "SELECT COUNT(*) AS total FROM ".$datatable." where kategoria='$kategoriaaa' and podkategoria='$podkategoria'";
  $results=mysqli_query($connect,$query);
  $row = mysqli_fetch_array($results);
  $total_pages = ceil($row["total"] / $results_per_page);
  echo "<div class='strony'>";
  for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
      echo "<a href='index.php?page=".$i."'";
      if ($i==$page)  echo " class='curPage'";
      echo ">".$i."</a> ";
}echo "</div>";}else{
c:
$query = "SELECT * FROM ".$datatable." ORDER BY cena DESC LIMIT $start_from, ".$results_per_page;
$results=mysqli_query($connect,$query);
//$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
echo "<table>";
while ($row = mysqli_fetch_array($results)) {
$miejsce="uploads/";
$miejsce .=$row['zdjecie'];
echo "<tr class='zzz'>";
echo "<td class='obraz'><img src=".$miejsce."></td>";
$adres='aukcje/'.$row['id'].'.php';
echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
//echo "<td class='tytul'>".$row['nazwa']."</td>";
echo "<td class='cena'>".$row['cena']."zł.</td>";
echo "</tr>";
}
echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable;
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
echo "<a href='index.php?page=".$i."'";
if ($i==$page)  echo " class='curPage'";
echo ">".$i."</a> ";
};
echo "</div>";
}
break;
case 'nowe':
if(!strlen($kategoriaaa)<1){
  if($kategoriaaa=="Brak"){
    goto d;
  }
  if(!strlen(@$_SESSION['podkategoriaa'])<1){
    $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' and podkategoria='".$podkategoria."' ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;
  }else{
  $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;
}
  $results=mysqli_query($connect,$query);
  echo "<table>";
  while ($row = mysqli_fetch_array($results)) {
    $miejsce="uploads/";
    $miejsce .=$row['zdjecie'];
    echo "<tr class='zzz'>";
    echo "<td class='obraz'><img src=".$miejsce."></td>";
    $adres='aukcje/'.$row['id'].'.php';
    echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
    echo "<td class='cena'>".$row['cena']."zł.</td>";
    echo "</tr>";
  }
  echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable." where kategoria='$kategoriaaa' and podkategoria='$podkategoria'";
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
    echo "<a href='index.php?page=".$i."'";
    if ($i==$page)  echo " class='curPage'";
    echo ">".$i."</a> ";
}echo "</div>";}else{
d:
$query = "SELECT * FROM ".$datatable." ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;
$results=mysqli_query($connect,$query);
//$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
echo "<table>";
while ($row = mysqli_fetch_array($results)) {
$miejsce="uploads/";
$miejsce .=$row['zdjecie'];
echo "<tr class='zzz'>";
echo "<td class='obraz'><img src=".$miejsce."></td>";
$adres='aukcje/'.$row['id'].'.php';
echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
//echo "<td class='tytul'>".$row['nazwa']."</td>";
echo "<td class='cena'>".$row['cena']."zł.</td>";
echo "</tr>";
}
echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable;
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
echo "<a href='index.php?page=".$i."'";
if ($i==$page)  echo " class='curPage'";
echo ">".$i."</a> ";
};
echo "</div>";
}
break;
case 'stare':
if(!strlen($kategoriaaa)<1){
  if($kategoriaaa=="Brak"){
    goto e;
  }
  if(!strlen(@$_SESSION['podkategoriaa'])<1){
    $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' and podkategoria='".$podkategoria."' ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
  }else{
  $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
}
  $results=mysqli_query($connect,$query);
  echo "<table>";
  while ($row = mysqli_fetch_array($results)) {
    $miejsce="uploads/";
    $miejsce .=$row['zdjecie'];
    echo "<tr class='zzz'>";
    echo "<td class='obraz'><img src=".$miejsce."></td>";
    $adres='aukcje/'.$row['id'].'.php';
    echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
    echo "<td class='cena'>".$row['cena']."zł.</td>";
    echo "</tr>";
  }
  echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable." where kategoria='$kategoriaaa' and podkategoria='$podkategoria'";
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
    echo "<a href='index.php?page=".$i."'";
    if ($i==$page)  echo " class='curPage'";
    echo ">".$i."</a> ";
}echo "</div>";}else{
e:
$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
$results=mysqli_query($connect,$query);
//$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
echo "<table>";
while ($row = mysqli_fetch_array($results)) {
$miejsce="uploads/";
$miejsce .=$row['zdjecie'];
echo "<tr class='zzz'>";
echo "<td class='obraz'><img src=".$miejsce."></td>";
$adres='aukcje/'.$row['id'].'.php';
echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
//echo "<td class='tytul'>".$row['nazwa']."</td>";
echo "<td class='cena'>".$row['cena']."zł.</td>";
echo "</tr>";
}
echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable;
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
echo "<a href='index.php?page=".$i."'";
if ($i==$page)  echo " class='curPage'";
echo ">".$i."</a> ";
};
echo "</div>";
}
break;
  default:
  if(!strlen($kategoriaaa)<1){
    if($kategoriaaa=="Brak"){
      goto b;
    }
    if(!strlen($podkategoria)<1){
      $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' and podkategoria='".$podkategoria."' ORDER BY nazwa asc LIMIT $start_from, ".$results_per_page;
    }else{
    $query = "SELECT * FROM ".$datatable." where kategoria='".$kategoriaaa."' ORDER BY nazwa asc LIMIT $start_from, ".$results_per_page;
  }
    $results=mysqli_query($connect,$query);
    echo "<table>";
    while ($row = mysqli_fetch_array($results)) {
      $miejsce="uploads/";
      $miejsce .=$row['zdjecie'];
      echo "<tr class='zzz'>";
      echo "<td class='obraz'><img src=".$miejsce."></td>";
      $adres='aukcje/'.$row['id'].'.php';
      echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
      echo "<td class='cena'>".$row['cena']."zł.</td>";
      echo "</tr>";
    }
    echo "</table>";


  $query = "SELECT COUNT(*) AS total FROM ".$datatable." where kategoria='$kategoriaaa' and podkategoria='$podkategoria'";
  $results=mysqli_query($connect,$query);
  $row = mysqli_fetch_array($results);
  $total_pages = ceil($row["total"] / $results_per_page);
  echo "<div class='strony'>";
  for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
      echo "<a href='index.php?page=".$i."'";
      if ($i==$page)  echo " class='curPage'";
      echo ">".$i."</a> ";
}echo "</div>";}else{
b:
$query = "SELECT * FROM ".$datatable." ORDER BY nazwa asc LIMIT $start_from, ".$results_per_page;
$results=mysqli_query($connect,$query);
//$query = "SELECT * FROM ".$datatable." ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
echo "<table>";
while ($row = mysqli_fetch_array($results)) {
$miejsce="uploads/";
$miejsce .=$row['zdjecie'];
echo "<tr class='zzz'>";
echo "<td class='obraz'><img src=".$miejsce."></td>";
$adres='aukcje/'.$row['id'].'.php';
echo "<td class='tytul'><form  action='$adres' method='post'><label><input type='submit' value='".$row['nazwa']."' name='xxx'></label></form></td>";
//echo "<td class='tytul'>".$row['nazwa']."</td>";
echo "<td class='cena'>".$row['cena']."zł.</td>";
echo "</tr>";
}
echo "</table>";


$query = "SELECT COUNT(*) AS total FROM ".$datatable;
$results=mysqli_query($connect,$query);
$row = mysqli_fetch_array($results);
$total_pages = ceil($row["total"] / $results_per_page);
echo "<div class='strony'>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
echo "<a href='index.php?page=".$i."'";
if ($i==$page)  echo " class='curPage'";
echo ">".$i."</a> ";
};
echo "</div>";
}
break;

        }
      }

        //-----

         ?>
      </div>
      <div class="stopka">
        <p>Wykonał: Arkadiusz Krupka</p>
    </div>
    </div>
  </body>
  </html>
