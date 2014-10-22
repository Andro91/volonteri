<html>
<head>
<meta charset="utf-8" />
</head>
</html>
<body>
<?php

require_once"konfiguracija.php";
$con = new mysqli(HOST,USER,PASSWORD,DATABASE);

if(isset($_GET['email'])&&isset($_GET['zaboravljena']))
{
	$email=$_GET['email'];
	
	$upit=$con->query("call zaboravljenaSifra('{$email}')");
	$rezultat=$upit->fetch_object();
	echo BASE."php/zaboravljena-sifra.php?resetuj=".$rezultat->sha."&email=".$email;
	mail($email, "Zaboravljena pristupna šifra.", BASE."php/zaboravljena-sifra.php?resetuj=".$rezultat->sha."&email=".$email);
	
}
else
if(isset($_GET['resetuj'])&&isset($_GET['email']))
{
	$reset=$_GET['resetuj'];
	$email=$_GET['email'];
	
	$novaSifra = md5(TAJNI_STRING.$reset);
	if(!$con->query("call resetujSifru('{$reset}','{$novaSifra}')"))die("Greška, pokušajte ponovo.");
	mail($email, "Nova šifra.", "Vaša nova pristupna šifra je: ".$novaSifra);
	echo"Uspješno ste resetovali Vašu šifru, provjerite svoj email.";
	echo"<br><br>Radi testiranja, sifra: ".$novaSifra;
}

$con->close();
	
?>
</body>
</html>