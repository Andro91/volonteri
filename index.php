<?php require_once"php/konfiguracija.php"?>
<?php require_once"php/session.php"?>
<?php require_once"php/login.php"?>
<?php require_once"template/meta.php"?>
<?php require_once"js/funkcije.php"?>
<?php require_once"template/header.php"?>
<?php require_once"php/php-fje.php"?>
<?php if(!postojiGET('str'))require_once"dodaci/slajder.php"?>
<?php //require_once"template/glavni-sadrzaj-pocetak.php"?>
<!--sadrzaj stranice START-->
<div class="container">
<div class="row">
<?php
	if(!postojiGET('str'))require_once"content/pocetna.php";
	else 
	{
		switch($_GET['str']){
			case"dogadjaj": 
				require_once"content/dogadjaj.php";
			break;
			
			case"registracija":
				require_once"content/registracija.php";
			break;
			
			case"novi-clanak":
				require_once"content/novi-clanak.php";
			break;
			
			case"edit-profil":
				require_once"content/edit-profil.php";
			break;
			
			case"profil":
				require_once"content/et.php";
			break;
			
						
			default:
				require_once"content/greska.php";
		}
	}
?>


<!--sadrzaj stranice END-->
<?php //require_once"template/glavni-sadrzaj-kraj.php"?>
<?php require_once"template/footer.php"?>