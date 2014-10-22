<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT id, ime FROM volonter";

mysqli_query ($conn,"set character_set_results='utf8'");

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
$id = $row['id'];
$loc = strpos($row['ime']," ");
$ime = substr($row['ime'],0,$loc);
$prezime = substr($row['ime'],$loc);
//echo $id .  $ime . " razmak " . $prezime . "</br>";
$update_query = "
UPDATE volonter
SET ime='{$ime}', prezime='{$prezime}'
WHERE id = {$id};
";
if($id>1190){
mysqli_query($conn,$update_query);}
} 
?>
