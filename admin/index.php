<?php require_once"../php/konfiguracija.php"?>
<?php //require_once"template/glavni-sadrzaj-pocetak.php"
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header('Location: '.BASE);
    die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volonteri srbije</title>
<link href="../css/stil.css" rel="stylesheet" type="text/css" />
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="heder">
  <div class="centriraj">
  	<a href="index.php"><img class="logo" src="slike/logo-volonteri-srbije.png" alt="Logo Volonteri srbije"/></a>
  	<img class="baner" src="slike/banner_sss.png" /> 
   </div>
</div>
<div class="centriraj"> 

<!--sadrzaj stranice START-->
<h1 style="text-align:center; color:#000">ADMIN strana Volonteri.rs</h1>

<?php
	if(!isset($_GET['str'])) require_once "admin_pocetna.php";
	else 
	{
		switch($_GET['str']){
			case"pretraga": 
				require_once"admin_pretraga.php";
			break;
			case"pretraga2": 
				require_once"admin_pretraga2.php";
			break;
			case"dogadjaji": 
				require_once"admin_dogadjaj_pregled.php";
			break;
			case"dodogadjaj": 
				require_once"content/novi-clanak.php";
			break;
			case"jezik": 
				require_once"jezik.php";
			break;
			default:
				require_once"content/greska.php";
		}
	}
?>

<!--sadrzaj stranice END-->
</div>
<div id="futer">
  <div class="centriraj">
  		<!--logo slika pocetak--><!--width="140" height="126"-->
        <div class="logo">
        <img src="slike/logo-bijeli.png" width="100%" height="100%" alt="Logo volonteri srbije" />
        </div>
<!--logo slika kraj-->
        
        <!--desni dio pocetak-->
		<div class="podjela desno">
        	<div class="meni">
            	<div class="dugme prvo pointer">O nama</div>
            	<div class="dugme pointer">Kontakt</div>
            	<div class="dugme pointer">Zakon o volontiranju</div>
            </div><br clear="all" />
            
            <div class="newsletter">
            	<input name="email" type="text" class="email" placeholder="Prijava za newsletter" />
                <div class="dugme pointer">Prijava</div>
            </div>
        </div>
    	<!--desni dio kraj-->
    <br clear="all" />
  </div>
</div>
</body>
</html>