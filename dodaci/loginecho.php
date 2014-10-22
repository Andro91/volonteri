<?php
if(isset($_SESSION['userid']) && isset($_SESSION['name']))
	if($_SESSION['userid']=="-1" && $_SESSION['name']=="none")
		echo "<img id='prijava' class='pointer' src='slike/prijava-dugme.png' onclick=\"prijavaa('block')\"/>";
	else;
else echo"GRESKA_SESS1!";

?>  