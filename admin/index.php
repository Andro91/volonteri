<?php require_once"../php/konfiguracija.php"?>
<?php require_once"template/meta.php"?>
<?php 
//require_once"template/glavni-sadrzaj-pocetak.php"
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header('Location: '.BASE);
    die();
}
?>

<script type="text/javascript">
/*$(function () {
    $("#list").jqGrid({
        url: "testxml.php",
        datatype: "xml",
        mtype: "GET",
        colNames: ["Id", "Ime", "Prezime", "Juzernejm"],
        colModel: [
            { name: "id", width: 55 },
            { name: "ime", width: 90 },
            { name: "prezime", width: 80, align: "right" },
            { name: "username", width: 150, sortable: false }
        ],
        pager: "#pager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "invid",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "My first grid"
    }); 
}); */
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
<div id="heder">
  <div class="container centriraj">
  	<a href="index.php"><img class="logo" src="slike/logo-volonteri-srbije.png" alt="Logo Volonteri srbije"/></a>
  	<img class="baner" src="slike/banner_sss.png" /> 
   </div>
</div>
<div class="container"> 

<!--sadrzaj stranice START-->
<h1 style="text-align:center; color:#000">ADMIN strana Volonteri.rs</h1>
</br>
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
			case"pretraga3": 
				require_once"admin_pretraga - Copy.php";
				break;
			case"dogadjaji": 
				require_once"admin_dogadjaj_pregled.php";
				break;
			case"dogadjaji_tabela": 
				require_once"admin_dogadjaj_tabela.php";
				break;
			case"dodogadjaj": 
				require_once"content/novi-clanak.php";
				break;
			case"jezik": 
				require_once"jezik.php";
				break;
			case"test": 
				require_once"testxml.php";
				break;
			default:
				require_once"content/greska.php";
		}
	}
?>
<!--sadrzaj stranice END-->
</div>
<div id="futer" class="footer">
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