</head>
<body>
<div id="sveobuhvatni">
  <div id="forma">
  	<h2 class="naslov">Prijavi se</h2>
    
    <svg height="50" width="50" class="izlaz pointer" onclick="prijavaa('none')">
        <line x1="15" y1="15" x2="35" y2="35" style="stroke:rgb(230,230,230);stroke-width:5" />
        <line x1="35" y1="15" x2="15" y2="35" style="stroke:rgb(230,230,230);stroke-width:5" />
        Sorry, your browser does not support inline SVG.
        </svg>
    
        <form action="index.php" method="post" id="submitovanje">
        <p><input type="text" name="email" placeholder="unesite e-mail" class="polja"/></p>
        <p><input type="password" name="password" placeholder="unesite pristupnu šifru" class="polja" /></p>
    <p class="kontrole">
    	<div class="dugme pointer" onClick="submit();">Prijava</div>
    	<div class="zaboravljeno pointer">Zaboravili ste šifru?</div><br clear="all" />
        <div class="registracija pointer" onClick="registracija()">Registracija</div>
        <br clear="all" />
    </p></form>
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
<?php require_once"dodaci/loginecho.php" ?>  
<?php require_once"dodaci/glavni-menij.php" ?>   