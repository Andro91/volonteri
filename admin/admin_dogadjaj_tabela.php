<script>
function showDogadjaj(str)
{
if (str==="")
  {
  document.getElementById("glavniSadrzaj").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    document.getElementById("glavniSadrzaj").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","getdogadjaj.php?q="+str,true);
xmlhttp.send();
}

function Potvrda(str,str2)// str volonter str2 dogadjaj
{ 
if (str==="")
  {
  document.getElementById("glavniSadrzaj").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {

  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    //document.getElementById("glavniSadrzaj").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","AJAXpotvrda.php?q1="+str+"&q2="+str2,true);
xmlhttp.send();
var dz =0;
while(dz < 10000000){dz++;}
}
function asd(){
	var a=0;
}

function Otkaz(str,str2)// str volonter str2 dogadjaj
{ 
if (str==="")
  {
  document.getElementById("glavniSadrzaj").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {

  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    //document.getElementById("glavniSadrzaj").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","AJAXOtkaz.php?q1="+str+"&q2="+str2,true);
xmlhttp.send();
}

$(document).ready( function(){
	$("#jqgrid_table").jqGrid({
		url: "jqgridDogadjaji.php",
		datatype: "json",
		mtype: "GET",
		colNames: ["DogadjajID","Naslov","Kratak Opis","Opis"],
		colModel: [{name: "id", hidden: true},{name: "naslov", editable: true },{name: "kratakopis", editable: true },{name: "opis", editable: true }],
		pager: "#pager",
		rowNum: 10,
		rowList: [10,20,30,50,100],
		sortname: "id",
		sortorder: "asc",
		height: "auto",
		width: "800px",
		viewrecords: true,
		gridview: true,
		caption: ""
	});	
});
</script>

<table id="jqgrid_table"><tr><td></td></tr></table>
<div id="pager"></div>


<div style="width: 25%; float:left">
<h1>Pregled aktuelnih događaja</h1>
<div id="list5">
 <ul>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT * FROM dogadjaji";
mysqli_query ($conn,"set character_set_results='utf8'");
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
	$row["id"];
	$row["naslov"];
	echo"<li><div onclick=\"showDogadjaj({$row['id']})\"><strong>{$row['naslov']}</li>";
	} 
?>
</ul>
</div>
</div>
<div id="glavniSadrzaj" style="width: 70%; float:left"></div>
<?php
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
if(isset($_POST['submit'])){
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
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

echo $query;
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
}
mysqli_free_result($result);
//mysqli_close($conn);
?>
