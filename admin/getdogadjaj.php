<?php require_once"../php/konfiguracija.php"?>
<?php
$q = $_GET['q'];
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT dogadjaji.id as id, naslov, kratakopis, volonter.id as volid, ime, prezime, email, potvrda FROM dogadjaji INNER JOIN prijava ON prijava.dogadjaj_id = dogadjaji.id INNER JOIN volonter ON volonter.id = prijava.volonter_id WHERE dogadjaji.id = " . $q;
mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
echo"<div style='padding: 5px 5px 15px 5px;'><h2>{$row['naslov']}</h2>";
echo"<p>{$row['kratakopis']}</p>";
switch ($row['potvrda']){
		case NULL: $pot = "?";break;
		case 0: $pot = "?";break;
		case 1: $pot = "DA";break;
		case 2: $pot = "NE";break;
		}
echo"<div><h3>Volonteri prijavljeni za dogadjaj:</h3></br>";
echo "<div><table id=\"tabela\"><thead><tr><th>Ime</th><th>Prezime</th><th>email</th><th>Prisustvo</th><th>Potvrdi</th><th>Otkazi</th></tr></thead>";
echo "<tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>{$pot}</td><td><div onclick=\"Potvrda({$row['volid']},{$row['id']});showDogadjaj({$row['id']});\"><img src=\"slike/checkyes.png\" class='slicicaPot'></div></td><td><div onclick=\"Otkaz({$row['volid']},{$row['id']});showDogadjaj({$row['id']});\"><img src=\"slike/checkno.png\" class='slicicaPot'></div></td></tr>";
while($row = mysqli_fetch_assoc($result)){
	switch ($row['potvrda']){
		case NULL: $pot = "?";break;
		case 0: $pot = "?";break;
		case 1: $pot = "DA";break;
		case 2: $pot = "NE";break;
		}
	echo "<tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>{$pot}</td><td><div onclick=\"Potvrda({$row['volid']},{$row['id']});showDogadjaj({$row['id']});\" class='slicicaPot'><img src=\"slike/checkyes.png\"></div></td><td><div onclick=\"Otkaz({$row['volid']},{$row['id']});showDogadjaj({$row['id']});\"><img src=\"slike/checkno.png\" class='slicicaPot'></div></td></tr></div>";
	}
	mysqli_close($conn);
?>