<form class="elegant-aero" action="index.php?str=pretraga" method="post" name="pretraga">
<label><span>IME:</span><input type="text" name="ime"></label></br>
<label><span>PREZIME:</span><input type="text" name="prezime"></label></br>
<label><span>EMAIL:</span><input type="text" name="email"></label></br>
<label><span>JEZICI:</span></label></br>

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
	echo"<label><span><input type=\"checkbox\" name=\"{$niz_idjezika[$i]}\">".$niz_jezika[$i]."</span></label></br>";
	$i++;
	} 
	mysqli_close($conn);
?>
</br></br></br>
<label><input type="submit" value="TRAŽI" name="submit"></label>
</form>
<?php
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
if(isset($_POST['submit'])){
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
//promenljiva indikator proverava da li kriterijum za pretragu ukljucuje i jezik
//ukoliko je indikator jednak 0, vrsi se pretraga samo po imenu, prezimenu i mailu
//indikator 1 pokazuje da kriterijum pretrage ukljucuje i jezik sta zahteva prosirenje upita
$indikator = 0;
foreach($niz_idjezika as $jid){
	if(isset($_POST[$jid])){$indikator = 1;}
	}
if($indikator == 0){
$query = "SELECT volonter.id, ime, prezime, email FROM volonter ";
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
		echo "<tr><a href=\"#\"><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td></a></tr>";
		}else{
		echo "<a href=\"#\"><tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>" . $row['naziv'] . "</td></tr></a>";	
		}
	} 
echo "</table></div>";
}
//mysqli_close($conn);
?>
