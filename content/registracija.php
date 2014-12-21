<div class="container col-md-8">
<?PHP
if(isset($_GET['err']))
{
	$error=unserialize($_GET['err']);
	echo '<table style="color:red; margin:20px auto;">';
	foreach ($error as $e)
	{
		echo 
				'<tr>
					<td></td>
					<td>'.$e.'</td>
				</tr>';
  
	}
	echo'</table>';
}

?>
<form action="php/registrator.php" method="post" id="regforma" name="regforma" onSubmit="return validate(this)">
<div class="form-group">
<label>Ime</label>
<input class="form-control" name="ime" onKeyPress="samoSlova(event, 'ime', '40')" placeholder="ime" type="text">
</div>
<div class="form-group">
<label>Prezime</label>
<input class="form-control" name="prezime" onKeyPress="samoSlova(event, 'prezime', '40')" placeholder="prezime" type="text">
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" name="email" placeholder="email" type="email">
</div>
<div class="form-group">
<label>Username</label>
<input class="form-control" name="username" placeholder="username" type="text">
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" name="password" placeholder="password" type="password">
</div>
<div class="form-group">
<label>Ponovite password</label>
<input class="form-control" name="password1" placeholder="password" type="password">
</div>
<div class="form-group">
<label>Adresa</label>
<input class="form-control" name="adresa" placeholder="adresa" type="text">
</div>
<div class="form-group">
<label>Telefon</label>
<input class="form-control" name="telefon" onKeyPress="samoBrojevi(event, 'telefon', 13)" placeholder="telefon" type="text">
</div>
<div class="form-group">
<label>Pol</label>
<select class="form-control" name="pol">
      <option value="1">Muški</option>
      <option value="2">Ženski</option>
  </select>
</div>
<div class="form-group">
<label>Zanimanje</label>
<input class="form-control" name="zanimanje" onKeyPress="samoSlova(event, 'prezime', '45')" placeholder="zanimanje" type="text">
</div>
<div class="form-group">
<label>Srednja škola</label>
<input class="form-control" name="srednja_skola" onKeyPress="samoSlova(event, 'prezime', '45')" placeholder="srednja skola" type="text">
</div>
<div class="form-group">
<label>Fakultet</label>
<input class="form-control" name="fakultet" onKeyPress="samoSlova(event, 'prezime', '45')" placeholder="fakultet" type="text">
</div>
<div class="form-group">
<label>Volontersko iskustvo</label>
<textarea class="form-control" name="volontersko_iskustvo" onKeyPress="samoSlova(event, 'prezime', '80')"placeholder="volontersko iskustvo" type="text"></textarea>
</div>
<div class="form-group">
<label>Radno iskustvo</label>
<textarea class="form-control" name="radno_iskustvo" placeholder="radno iskustvo" type="text"></textarea>
</div>
<div class="form-group">
<label>Nagrade</label>
<textarea class="form-control" name="nagrade" placeholder="nagrade" type="text"></textarea>
</div>
<div class="form-group form-inline">
<label>Govorni jezici:</label></br>

<?php
//upit za bazu koji kupi sve jezike iz tabele jezik
//ovaj blok koda ispisuje sve jezike sa checkbox-om pored u polju za pretragu
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT * FROM jezik";
$niz_idjezika = array();
$niz_jezika = array();
mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);
$i = 0;
while($row = mysqli_fetch_assoc($result)){
	//niz u koji se stavljaju id iz BP vezane za jezik
	$niz_idjezika[$i] = $row["id"];
	
	//niz u koji se stavlja naziv jezika
	$niz_jezika[$i] = $row["naziv"];
	
	//preko POST globalne promenljive se prenosi samo id jezika koji ulazi u kriterijum
	echo"<div class=\"checkbox \"><label><input type=\"checkbox\" name=\"{$niz_idjezika[$i]}\">".$niz_jezika[$i]."</label></div>&nbsp;&nbsp;&nbsp;&nbsp;";
	$i++;
	if(($i % 5)==0){echo "</br></br>";}
	} 
	mysqli_close($conn);
?>
</div>
<div class="btn btn-default btn-lg" onclick="submitForm('regforma')">Registruj se</div>

<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>