<?php require_once"php/konfiguracija.php"?>
<?php
            session_start();
            header('Content-Type: text/html; charset=UTF-8');
            if($_SESSION['userid']<0){
            echo "<h2>Morate biti ulogovani da biste mogli da izvršite prijavu.</h2>";    
            }else{
            $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
			mysqli_query($conn,"SET NAMES 'utf8'");header("Content-Type: text/html; charset=utf-8");
            mysqli_query ($conn,"set character_set_results='utf8'");
			mysqli_query($conn,"SET NAMES 'utf8'");
            $query = "INSERT INTO prijava(volonter_id,dogadjaj_id) VALUES ({$_SESSION["userid"]},{$_GET["idd"]})";
            $result = mysqli_query($conn,$query);

            if($result){
            echo '<h2>Uspešno ste se prijavii za dogadaj.</h2><a href="index.php">Povratak na glavnu stranu</a>';   
            }else{
            echo "<h2>Došlo je do greške, molimo vas pokušajte kasnije.</br> Greška: ".mysqli_error($conn)."</h2>"; 
            }     
            mysqli_close($conn);}  
?>