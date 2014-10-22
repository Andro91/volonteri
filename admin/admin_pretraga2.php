<form class="elegant-aero" action="index.php?str=pretraga2" method="post" name="pretraga">
<label><span>IME:</span><input type="text" name="ime"></label></br>
<label><span>PREZIME:</span><input type="text" name="prezime"></label></br>
<label><span>EMAIL:</span><input type="text" name="email"></label></br>

</br></br></br>
<label><input type="submit" value="TRAŽI" name="submit"></label>
</form>
<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
if(isset($_POST['submit'])){
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

$query = "SELECT volonter.id, ime, prezime, email FROM volonter ";

$uime = "ime like ";
$uprezime = "prezime like ";
$uemail = "email like ";
$and = " ";
if((isset($_POST['ime'])&&!empty($_POST['ime']))||(isset($_POST['prezime'])&&!empty($_POST['prezime']))||(isset($_POST['email'])&&!empty($_POST['email']))){$query = $query . "WHERE ";}

if(!empty($_POST['ime'])){$query = $query . $uime . "'%" . $_POST['ime'] . "%'"; $and = " AND "; }

if(!empty($_POST['prezime'])){$query = $query . $and . $uprezime . "'%" . $_POST['prezime'] . "%'"; $and = " AND ";}

if(!empty($_POST['email'])){$query = $query . $and . $uemail . "'%" . $_POST['email'] . "%'"; $and = " AND ";}



$query = $query . " ORDER BY prezime ASC, ime ASC ";
echo $query;

mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);

echo "<div class=\"CSSTableGenerator\"><table><tr><td>Ime</td><td>Prezime</td><td>email</td></tr>";

while($row = mysqli_fetch_assoc($result)){

echo "<tr><a href=\"#\"><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td></a></tr>";
		}
	
echo "</table></div>";
}
//mysqli_close($conn);
?>
