<?php require_once"../php/konfiguracija.php"?>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

	if(isset($_POST['delete']) && !is_null($_POST['delete'])){
		$query = "DELETE FROM jezik WHERE id = " . $_POST['delete'];
		$result = mysqli_query($conn, $query);
		if($result){echo "<div class='alert alert-success' style='width: 100%'>Jezik je uspešno obrisan!</div>";}
		else{echo "<div class='alert alert-danger' style='width: 100%'>Došlo je do greške, pokušajte ponovo kasnije.</div>";
		 	 echo "<div class='alert alert-warning' style='width: 100%'>Brisanje jezika nije moguće, ako neko od korisnika govori dati jezik tj. ako postoji zapis u bazi, koji vezuje jezik i korisnika.</div>";
		 }
	}
	if(isset($_POST['insert']) && !is_null($_POST['insert'])){
		$query = $query = "INSERT INTO jezik(naziv) VALUES ('" . $_POST['insert'] . "');";
		$result = mysqli_query($conn, $query);
			if($result){echo "<div class='alert alert-success' style='width: 100%'>Jezik je uspešno upisan u bazu!</div>";}
			else{echo "<div class='alert alert-danger' style='width: 100%'>Došlo je do greške, pokušajte ponovo kasnije.</div>";
		 		 echo "<div class='alert alert-warning' style='width: 100%'>Da li već postoji taj jezik?</div>";}
	}
mysqli_close($conn);
?>