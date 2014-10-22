<?php
function redirect_to($new_location){
   header("Location: " . $new_location); 
   exit; 
}

?>
<?php
session_start();
?>

<?php
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = isset($_POST['email']) ? $_POST['email'] : "q";
    $password = isset($_POST['password']) ? $_POST['password'] : "q";
    echo "bilo sta";
    $conn = mysqli_connect("localhost","root","","volonteri");
    
    mysqli_query($conn,"SET @em = " . "'" . mysqli_real_escape_string($conn,$email) . "'");
    mysqli_query($conn,"SET @pas = " . "'" . mysqli_real_escape_string($conn,$password) . "'");
    // Call sproc
    // login(IN uemail varchar(45), IN upass VARCHAR(45))
    $result = mysqli_query($conn,"CALL login(@em,@pas)");
    if(!$result) {die("CALL failed: (" . mysqli_errno() . ") " . mysqli_error());}

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
        $_SESSION['user']=$row['id'];
        $_SESSION['imei']=$row['ime'];
        //redirect_to("index.php"); 
        }
    }
    else {
        // No rows returned
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Volonteri srbije</title>
<link href="css/stil.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
var meni=0;
function skrol(){
	if($(document).scrollTop()>170 && meni===0)
	{
		var menij=document.getElementById("menij").style;
		menij.position="fixed";
		menij.top="0px";
		
		meni=1;
	}else
	if($(document).scrollTop()<170 && meni===1){
		var menij=document.getElementById("menij").style;
		menij.position="relative";
		menij.top="";
		
		meni=0;
	}
}
window.addEventListener('scroll', skrol);
function prijavaa(kako){
	document.getElementById("sveobuhvatni").style.display=kako;
}

function showEvent(str)
{
if (str==="")
  {
  document.getElementById("glavniSadrzaj_vesti").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    document.getElementById("glavniSadrzaj_vesti").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","getevents.php?q="+str,true);
xmlhttp.send();
}
function page(c){
    var p=0;
    if(c==='+'){
    p = parseInt(document.getElementById("textinputer").innerHTML)+1;
    if(p>0){document.getElementById("textinputer").innerHTML=p;}
    if(p===0){return 1;}
    return p;}
    if(c==='-'){
    p = parseInt(document.getElementById("textinputer").innerHTML)-1;
    if(p>0){document.getElementById("textinputer").innerHTML=p;}
    if(p===0){return 1;}
    return p;}
}
function submit(){
    document.getElementById("submitovanje").submit();
}

</script>
</head>

<body>
<div id="sveobuhvatni">
  <div id="forma">
    <h2 class="naslov">Prijavi se</h2><div class="izlaz pointer" onclick="prijavaa('none')">X</div>
        <form action="index.php" method="post" id="submitovanje">
        <p><input type="text" name="email" placeholder="unesite e-mail" class="polja"/></p>
        <p><input type="password" name="password" placeholder="unesite pristupnu ifru" class="polja" /></p>
        <p class="kontrole">
        <div class="dugme pointer" onclick="submit();">Prijava</div>
    	<div class="zaboravljeno pointer">Zaboravili ste ifru?</div><br clear="all" />
        <div class="registracija pointer">Registracija</div>
        </form>
        <br clear="all" />
    </p>
    <br clear="all" />
  </div>
</div>

<div id="drustveneMreze">
	<div><img src="slike/facebook.jpg" width="100%" height="100%" alt="facebook" /></div>
	<div><img src="slike/twitter.jpg" width="100%" height="100%" alt="twitter" /></div>
	<div><img src="slike/youtube.jpg" width="100%" height="100%" alt="youtube" /></div>
	<div><img src="slike/mail.jpg" width="100%" height="100%" alt="mail" /></div>
</div>
<div id="heder">
  <div class="centriraj">
  	<a href="index.php"><img class="logo" src="slike/logo-volonteri-srbije.png" alt="Logo Volonteri srbije"/></a>
  	<img class="baner" src="slike/banner_sss.png" /> 
   </div>
</div>

<div class="centriraj">
<img id="prijava" class="pointer" src="slike/prijava-dugme.png" onclick="prijavaa('block')" />

<?php require_once"dodaci/glavni-menij.html"?>
    
  <div id="slajder">
  	<img src="slike/slider_1.jpg" width="100%" height="100%" /> 
  </div>
    
    
<div id="glavniSadrzaj">
<?php
            if(!isset($_SESSION['user'])){
            die("Morate biti ulogovani da bi mogli da izvrsite prijavu.");    
            }else{

            $conn = mysqli_connect("localhost","root","","volonteri");
            mysqli_query ($conn,"set character_set_results='utf8'");
            $query = "INSERT INTO prijava(korisnikid,dogadjajid) VALUES ({$_SESSION["user"]},{$_GET["idd"]})";
            $result = mysqli_query($conn,$query);

            if($result){
            echo '<h2>Uspeno ste se prijavii za doga?aj.</h2><a href="index.php">Povratak na glavnu stranu</a>';   
            }else{
            echo "<h2>Dolo je do greke, molimo vas pokuajte kasnije.</br> Greka: ".mysqli_error($conn)."</h2>"; 
            }
                    
            mysqli_close($conn);}  
?>
</div>

  	<div id="prijatelji">
        <img src="#" />
        <img src="#" />
        <img src="#" />
  </div>
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