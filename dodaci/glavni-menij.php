<!--Glavni menij-->
    <div id="menij">
    	<div class="dugme prvo">naša misija |</div>
		<div class="dugme">aktivnosti |</div>
		<div class="dugme">događaji |</div>
		<div class="dugme">nađi volontere |</div>
		<div class="dugme">zakon o volontiranju |</div>
		<div class="dugme">info</div>
         
        <?php 
		if(isset($_SESSION['userid']) && isset($_SESSION['name']))
			if($_SESSION['userid']!="-1" && $_SESSION['name']!="none")
				echo "
				<div class='dugme_desno'>
					<img src='slike/user.png'/>
					<a href='?str=profil' class='userName'>{$_SESSION['name']}</a>
					<a href='session_destroyer.php'>
						<svg height='30' width='30' style='background: #993322; border-radius: 5pt;' onclick='prijavaa('none')'>
							<line x1='5' y1='5' x2='25' y2='25' style='stroke:rgb(230,230,230);stroke-width:3' />
							<line x1='25' y1='5' x2='5' y2='25' style='stroke:rgb(230,230,230);stroke-width:3' />
							Sorry, your browser does not support inline SVG.
						</svg>
					</a>
				</div>";
        ?>
      </div>
 
       

        <br clear="all" />