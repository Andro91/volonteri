</head>
<body>
 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labeledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Prijavite se</h4>
            </div> 
                <div class="modal-body">
                    <form action="index.php" method="post" id="submitovanje" role="form">
                    <div class="form-group">
                    	<label for="mojEmail">Email adresa</label>
                        <input type="email" name="email" placeholder="unesite e-mail" class="form-control" id="mojEmail"/>
                    </div>
                    <div class="form-group">
                    	<label for="mojEmail">Šifra</label>	
                        <input type="password" name="password" placeholder="unesite pristupnu šifru" class="form-control" />
                    </div>
                        <div class="btn btn-primary btn-lg pointer" onClick="submit();" data-dismiss="modal">Prijava</div>
                        <div class="zaboravljeno pointer" onClick="zaboravljenaSifra()">Zaboravili ste šifru?</div><br clear="all" />
                        <div class="btn btn-default btn-lg pointer" onClick="registracija()" data-dismiss="modal">Registracija</div>
                    
                    </form>
                </div>
            	<div class="modal-footer"> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Prijava</button>
                </div>
        </div>
    </div>
</div>

 
 
 
<div id="sveobuhvatni" class="container">
  <div id="forma" class="container ">
  	<h2 class="naslov">Prijavi se</h2>
    
    <svg height="50" width="50" class="izlaz pointer" onclick="prijavaa('none')">
        <line x1="15" y1="15" x2="35" y2="35" style="stroke:rgb(230,230,230);stroke-width:5" />
        <line x1="35" y1="15" x2="15" y2="35" style="stroke:rgb(230,230,230);stroke-width:5" />
        Sorry, your browser does not support inline SVG.
        </svg>
    
        <form action="index.php" method="post" id="submitovanje">
        <p><input type="email" name="email" placeholder="unesite e-mail" class="polja"/></p>
        <p><input type="password" name="password" placeholder="unesite pristupnu šifru" class="polja" /></p>
    <p class="kontrole">
    	<div class="dugme pointer" onClick="submit();">Prijava</div>
    	<div class="zaboravljeno pointer" onClick="zaboravljenaSifra()">Zaboravili ste šifru?</div><br clear="all" />
        <div class="registracija pointer" onClick="registracija()">Registracija</div>
        <br clear="all" />
    </p></form>
    <br clear="all" />
  </div>
</div>

<div id="drustveneMreze" class="hidden-xs hidden-sm hidden-md">
	<div><img src="slike/facebook.jpg" width="100%" height="100%" alt="facebook" /></div>
	<div><img src="slike/twitter.jpg" width="100%" height="100%" alt="twitter" /></div>
	<div><img src="slike/youtube.jpg" width="100%" height="100%" alt="youtube" /></div>
	<div><img src="slike/mail.jpg" width="100%" height="100%" alt="mail" /></div>
</div>
<div id="heder" class="container">
  <div class="container centriraj" >
  	<a href="index.php"><img class="logo" src="slike/logo-volonteri-srbije.png" alt="Logo Volonteri srbije"/></a>
  	<img class="baner hidden-xs" src="slike/banner_sss.png" /> 
    <?php /*require_once"dodaci/loginecho.php"*/ ?> 
    
   </div>
</div>

<div>
<?php /*require_once"dodaci/loginecho.php"*/ ?> 
  <?php require_once"dodaci/glavni-meni.php"?>