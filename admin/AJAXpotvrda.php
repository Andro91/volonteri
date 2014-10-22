<?php require_once"../php/konfiguracija.php"?>
<?php 
$q1 = $_GET['q1'];
$q2 = $_GET['q2'];
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "UPDATE prijava
SET potvrda=1
WHERE volonter_id = " . $q1 . " AND dogadjaj_id = " . $q2;
mysqli_query($conn,$query);
mysqli_close($conn);
?>