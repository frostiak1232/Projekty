<?php
  session_start();
    $connect = @new mysqli("localhost","root","","antyki");//dane do bazy
    $nazwa=$_POST['Usun'];

    $query = "SELECT * FROM produkty where id=$nazwa";
    $results=mysqli_query($connect,$query);
     while($row = mysqli_fetch_array($results)){
       $filename = $row['zdjecie'];
        unlink('uploads/'.$filename);
        $filename = $row['zdjecie2'];
         unlink('uploads/'.$filename);
         $filename = $row['zdjecie3'];
          unlink('uploads/'.$filename);
          $filename = $row['zdjecie4'];
           unlink('uploads/'.$filename);
           $filename = $row['zdjecie5'];
            unlink('uploads/'.$filename);
            $filename=$row['id'];
            unlink('aukcje/'.$nazwa.'.php');
     }
    $sql = "DELETE FROM produkty WHERE id=$nazwa";

if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: ../antyki/index.php');
} else {
    echo "Error deleting record: " . $connect->error;
  };

     ?>
