
<?php
session_start();
$connect = @new mysqli("localhost","root","","antyki");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadOk2 = 1;
$uploadOk3 = 1;
$uploadOk4 = 1;
$uploadOk5 = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["dodaj"])) {
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Plik 1 jest zdjeciem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "plik 1 nie jest zdjeciem.";
        $uploadOk = 0;
    }
}
//drugi
if(isset($_POST["dodaj"])) {
    $check = @getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if($check !== false) {
        echo "Plik 2 jest zdjeciem - " . $check["mime"] . ".";
        $uploadOk2 = 1;
    } else {
        echo "plik 2 nie jest zdjeciem.";
        $uploadOk2 = 0;
    }
}
//trzeci
if(isset($_POST["dodaj"])) {
    $check = @getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
    if($check !== false) {
        echo "Plik 3 jest zdjeciem - " . $check["mime"] . ".";
        $uploadOk3 = 1;
    } else {
        echo "plik 3 nie jest zdjeciem.";
        $uploadOk3 = 0;
    }
}
//czwarty
if(isset($_POST["dodaj"])) {
    $check = @getimagesize($_FILES["fileToUpload4"]["tmp_name"]);
    if($check !== false) {
        echo "Plik 4 jest zdjeciem - " . $check["mime"] . ".";
        $uploadOk4 = 1;
    } else {
        echo "plik 4 nie jest zdjeciem.";
        $uploadOk4 = 0;
    }
}
//piaty
if(isset($_POST["dodaj"])) {
    $check = @getimagesize($_FILES["fileToUpload5"]["tmp_name"]);
    if($check !== false) {
        echo "Plik 5 jest zdjeciem - " . $check["mime"] . ".";
        $uploadOk5 = 1;
    } else {
        echo "plik 5 nie jest zdjeciem.";
        $uploadOk5 = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Zdjecie 1 o takiej nazwie juz istnieje.";
    $uploadOk = 0;
}
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
//drugi
if (file_exists($target_file)) {
    echo "Zdjecie 2 o takiej nazwie juz istnieje.";
    $uploadOk2 = 0;
}
$target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
//trzeci
if (file_exists($target_file)) {
    echo "Zdjecie 3 o takiej nazwie juz istnieje.";
    $uploadOk3 = 0;
}
$target_file = $target_dir . basename($_FILES["fileToUpload4"]["name"]);
//czwarty
if (file_exists($target_file)) {
    echo "Zdjecie 4 o takiej nazwie juz istnieje.";
    $uploadOk4 = 0;
}
$target_file = $target_dir . basename($_FILES["fileToUpload5"]["name"]);
//piaty
if (file_exists($target_file)) {
    echo "Zdjecie 5 o takiej nazwie juz istnieje.";
    $uploadOk5 = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Zdjecie 1 zajmuje zbyt duzo miejsca.";
    $uploadOk = 0;
}
//drugi
if ($_FILES["fileToUpload2"]["size"] > 5000000) {
    echo "Zdjecie 2 zajmuje zbyt duzo miejsca.";
    $uploadOk2 = 0;
}
//trzeci
if ($_FILES["fileToUpload3"]["size"] > 5000000) {
    echo "Zdjecie 3 zajmuje zbyt duzo miejsca.";
    $uploadOk3 = 0;
}
//czwarty
if ($_FILES["fileToUpload4"]["size"] > 5000000) {
    echo "Zdjecie 4 zajmuje zbyt duzo miejsca.";
    $uploadOk4 = 0;
}
//piaty
if ($_FILES["fileToUpload5"]["size"] > 5000000) {
    echo "Zdjecie 5 zajmuje zbyt duzo miejsca.";
    $uploadOk5 = 0;
}
// Allow certain file formats
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko taki foramt zdjecia jak JPG, JPEG, PNG & GIF jest dozwolony. zdjecie 1";
    $uploadOk = 0;
}
//drugi
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko taki foramt zdjecia jak JPG, JPEG, PNG & GIF jest dozwolony. zdjecie 2";
    $uploadOk2 = 0;
}
//trzeci
$target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko taki foramt zdjecia jak JPG, JPEG, PNG & GIF jest dozwolony. zdjecie 3";
    $uploadOk3 = 0;
}
//czwarty
$target_file = $target_dir . basename($_FILES["fileToUpload4"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko taki foramt zdjecia jak JPG, JPEG, PNG & GIF jest dozwolony. zdjecie 4";
    $uploadOk4 = 0;
}
//piaty
$target_file = $target_dir . basename($_FILES["fileToUpload5"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko taki foramt zdjecia jak JPG, JPEG, PNG & GIF jest dozwolony. zdjecie 5";
    $uploadOk5 = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Aukcja nie zostala dodana";
// if everything is ok, try to upload file
} else {
  if(!strlen($_POST['nazwa'])<1&&!strlen($_POST['cena'])<1&&!strlen($_POST['podkategoria'])<1&&!strlen($_SESSION['kategoriaaukcja'])<1)
  {
  $nazwa=$_POST['nazwa'];
  $opis=$_POST['opis'];
  $cena=$_POST['cena'];
  $podkategoria=$_POST['podkategoria'];
  $kategoria=$_SESSION['kategoriaaukcja'];
  $zdjecie=basename( $_FILES["fileToUpload"]["name"]);
  $zdjecie2='';
  $zdjecie3='';
  $zdjecie4='';
  $zdjecie5='';



      //drugi
      if ($uploadOk2 == 0) {
          echo "Zdjecie 2 nie zostalo dodane, blad.";}else{
            $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
              $zdjecie2=basename( $_FILES["fileToUpload2"]["name"]);
            }
          }
          //trzeci
          if ($uploadOk3 == 0) {
              echo "Zdjecie 3 nie zostalo dodane, blad.";}else{
                $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);

                if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
                  $zdjecie3=basename( $_FILES["fileToUpload3"]["name"]);
                }
              }
              //czwarty
              if ($uploadOk4 == 0) {
                  echo "Zdjecie 4 nie zostalo dodane, blad.";}else{
                    $target_file = $target_dir . basename($_FILES["fileToUpload4"]["name"]);

                    if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file)) {
                      $zdjecie4=basename( $_FILES["fileToUpload4"]["name"]);
                    }
                  }
                  //piaty
                  if ($uploadOk5 == 0) {
                      echo "Zdjecie 5 nie zostalo dodane, blad.";}else{
                        $target_file = $target_dir . basename($_FILES["fileToUpload5"]["name"]);

                        if (move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file)) {
                          $zdjecie5=basename( $_FILES["fileToUpload5"]["name"]);
                        }
                      }
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                          echo "Zakonczone sukcesem";
                          mysqli_query($connect,"INSERT INTO `produkty` (`nazwa`, `opis`, `cena`, `kategoria`, `podkategoria`, `zdjecie`, `zdjecie2`, `zdjecie3`, `zdjecie4`, `zdjecie5`)
                              VALUES ('".$nazwa."', '".$opis."', '".$cena."','".$kategoria."','".$podkategoria."','".$zdjecie."','".$zdjecie2."','".$zdjecie3."','".$zdjecie4."','".$zdjecie5."');");
                              $_SESSION['dokop']=$nazwa;
                          header('Location: kopiuje.php');
                        }

    } else {
        echo "Wystapil blad podczas dodawania zdjecia.";
    }
}
?>
