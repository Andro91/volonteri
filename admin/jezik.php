<form class="elegant-aero" action="index.php?str=jezik" method="post" name="pretraga">
<label><span style="font-size:16px">JEZICI:</span></label></br>

<?php
echo "<select name='drop1' id='Select1' size='15' multiple='multiple'>";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT * FROM jezik";
$niz_idjezika = array();
$niz_jezika = array();
mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);
$i = 0;
while($row = mysqli_fetch_assoc($result)){
	$niz_idjezika[$i] = $row["id"];
	$niz_jezika[$i] = $row["naziv"];
	echo"<option value=\"{$niz_idjezika[$i]}\">".$niz_jezika[$i]."</option>";
	$i++;
	} 
	mysqli_close($conn);
	echo "</select>";
?>
</br>
<label><input type="submit" value="BRIŠI" name="brisi"></label>
<label><span style="font-size:16px">Dodavanje novog jezika</span></label>
<input type = "text" name = "jezik"></input>
<label><input type="submit" value="Dodaj jezik" name="dodaj"></label>
</form>
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
if(isset($_POST['brisi']) && isset($_POST['drop1'])){
	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	$query = "DELETE FROM jezik WHERE id = " . $_POST['drop1'] . " ;";
	echo $query;
	//mysqli_query ($conn,"set character_set_results='utf8'");
	$result = mysqli_query($conn,$query);
	if($result){echo "<span style='font-size:25pt'>Jezik je uspešno obrisan!<span>";}
	else{echo "<span style='font-size:25pt'>Došlo je do greške, pokušajte ponovo kasnije.<span>";}
	mysqli_close($conn);
}
if(isset($_POST['jezik']) && isset($_POST['dodaj'])){
	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	$query = "INSERT INTO jezik (naziv) VALUES ('" . $_POST['jezik'] . "');";
	echo $query;
	//mysqli_query ($conn,"set character_set_results='utf8'");
	$result = mysqli_query($conn,$query);
	if($result){echo "<span style='font-size:25pt'>Jezik je uspešno upisan u bazu!<span>";}
	else{echo "<span style='font-size:25pt'>Došlo je do greške, pokušajte ponovo kasnije.<span>";}
	mysqli_close($conn);
}
/*foreach($niz_idjezika as $jid){
	if(isset($_POST[$jid])){$indikator = 1;}
	}
if($indikator == 0){

}else{$query = "SELECT volonter.id, ime, prezime, email, naziv FROM volonter INNER JOIN govori on govori.volonter_id = volonter.id INNER JOIN jezik ON jezik.id = govori.jezik_id ";}

$uime = "ime like ";
$uprezime = "prezime like ";
$uemail = "email like ";
$and = " ";
if( isset($_POST['ime'])  || isset($_POST['prezime']) || isset($_POST['email']) ) {$query = $query . "WHERE ";}

if(!empty($_POST['ime'])){$query = $query . $uime . "'%" . $_POST['ime'] . "%'"; $and = " AND "; }

if(!empty($_POST['prezime'])){$query = $query . $and . $uprezime . "'%" . $_POST['prezime'] . "%'"; $and = " AND ";}

if(!empty($_POST['email'])){$query = $query . $and . $uemail . "'%" . $_POST['email'] . "%'"; $and = " AND ";}

foreach($niz_idjezika as $jid){
	if(isset($_POST[$jid])){$query = $query . $and . " govori.jezik_id = " . $jid; $and = " OR ";}
	} 


$query = $query . " ORDER BY prezime ASC, ime ASC ";
//echo $query;

mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);
if($indikator == 0){
echo "<div class=\"CSSTableGenerator\"><table><tr><td>Ime</td><td>Prezime</td><td>email</td></tr>";
}else{
echo "<div class=\"CSSTableGenerator\"><table><tr><td>Ime</td><td>Prezime</td><td>email</td><td>Jezik</td></tr>";	
}
while($row = mysqli_fetch_assoc($result)){
	if($indikator == 0){
		echo "<a href=\"#\"><tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td></tr></a>";
		}else{
		echo "<a href=\"#\"><tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>" . $row['naziv'] . "</td></tr></a>";	
		}
	} 
echo "</table></div>";
*/
//mysqli_close($conn);
?>
