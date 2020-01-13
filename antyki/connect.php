<?php
  session_start();
    $connect = @new mysqli("localhost","root","","antyki");//dane do bazy
    $login = $_POST['login'];
    $haslo = $_POST['passwd'];
    @$login= htmlentities($login,ENT_QUOTES,UTF8);
    if ($connect->connect_errno!=0) {
      echo "error ".$connect->connect_error;
    }else {
      $sql= "SELECT * FROM uzytkownicy where login='$login'"; //zapytanie bez porownywania hasla daj
      if ($result = @$connect->query($sql)) {
        if ($result->num_rows) {
          $rekord = $result->fetch_assoc();
          $_SESSION['hash']=$rekord['haslo'];
        if(password_verify($haslo,$_SESSION['hash'])){
          $_SESSION['logged'] = true;
          header('Location: ../antyki/adminmenu.php');
          exit;
        }else{
            $_SESSION['error'] = "Nieprawidłowy login lub haslo";
            header('Location: ../antyki/adminmenu.php');
            exit;
        }

           //$rekord->close();
          header('Location: ../antyki/adminmenu.php');
        }else {
            $_SESSION['error'] = "Nieprawidłowy login lub haslo";
            header('Location:../antyki/adminmenu.php');

        }
      }

      $connect->close();
    }
 ?>
