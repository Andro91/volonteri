<?php require_once"../php/konfiguracija.php"?>
<?php 
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 

if(!$sidx) $sidx =1; 

$result = mysqli_query($conn,"SELECT COUNT(*) AS count FROM dogadjaji"); 
$row = mysqli_fetch_array($result,MYSQL_ASSOC); 

$count = $row['count']; 
if( $count > 0 && $limit > 0) { 
$total_pages = ceil($count/$limit); 
} else { 
$total_pages = 0; 
} 
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0; 

$SQL = "SELECT * FROM dogadjaji ORDER BY $sidx $sord LIMIT $start , $limit"; 
$result = mysqli_query($conn,$SQL) or die("Couldn't execute query.".mysqli_error()); 

$i=0;
while($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
$responce->rows[$i]['id']=$row['id'];
$responce->rows[$i]['cell']=array($row['id'],$row['naslov'],$row['kratakopis'],$row['opis']);
$i++;
}
echo json_encode($responce);
?>