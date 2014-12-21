<!--Glavni meni-->
 <nav id="mynavbar" class="navbar navbar-default""  role="navigation">
 	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Naslovna</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >O nama <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
                <li><a href="#">Misija</a></li>
                <li><a href="#">Istorija</a></li>
                <li><a href="#">Članovi skupštine i tim</a></li>
                <li><a href="#">Glas volontera</a></li>
                <li><a href="#">Blog</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >Informacije za volontere <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
                <li><a href="#">Kako da se registrujete</a></li>
                <li><a href="#">Događaji</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Zakon o volonterizmu</a></li>
                <li><a href="#">Galerije</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >Pridružite nam se <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
                <li><a href="#">Volonteri</a></li>
                <li><a href="#">Organizatori događaja</a></li>
                <li><a href="#">Donatori i sponzori</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >Download sekcija <span class="caret"></span></a>
            	<ul class="dropdown-menu" role="menu">
                <li><a href="#">Brošure</a></li>
                <li><a href="#">Zakon o volonterizmu</a></li>
                </ul>
            </li>
            <li><a href="#contact">Kontakt</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <!-- Mesto za korisnicko ime i sliku -->
            <?php 
			if(isset($_SESSION['userid']) && isset($_SESSION['name'])){
				if($_SESSION['userid']!="-1" && $_SESSION['name']!="none"){
					echo "<li>
								<a style='padding: 9px 0px 0px 0px' href='?str=profil'>
									<!--<img height='35px' width='0px' style='padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px' src='#'/>-->
									<img  height='35px' width='35px' src='slike/user.png'/> {$_SESSION['name']}
								</a>
						</li>
						<li>
								<a href='session_destroyer.php'>Odjavi se</a>
						</li>";
				}
				else echo "<li><div style='padding-top: 15px; padding-bottom: 15px; color: #FFF;' class='pointer btn btn-primary' onclick=\"prijavaa('block')\">Prijavi se!</div></li>";
			}else echo "<li><div style='padding-top: 15px; padding-bottom: 15px; color: #FFF;' class='pointer' onclick=\"prijavaa('block')\">Prijavi se!</div></li>";
        	?>
            <li><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Lansiraj Modal</button></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>