<script>

$(document).ready(function() {
	$('div.dogadjaj').click(function(){
		var id = $(this).attr('iddog');
		$ .ajax({
			type: 'get',
			url: 'getdogadjaj.php',
			data: {q: id},
			beforeSend: function(){},
			success: function(data){document.getElementById("glavniSadrzaj").innerHTML = data; tabela();},
			});
	});
});

function dogadjaj(){
	
	}

$(document).ready(function() {
		$ .ajax({
			type: 'post',
			url: 'ajax_delete.php',
			data: {block: id},
			success: function(){row.css("background","#FF4A4F");location.reload();}
			});
});

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
function tabela(){
	$('#tabela').DataTable();
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
</script>
<div class="row">
<div class="col-md-4">
<h2>Pregled aktuelnih događaja</h2>
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
	echo"<li><div class='dogadjaj' idDog=" . $row['id'] . ">{$row['naslov']}</li>";
	} 
?>
</ul>
</div>
</div>
<div id="glavniSadrzaj" class="col-md-8 pull-left"></div>
</div>
<script>
$(document).ready(function() {
    $('#tabela').DataTable();
} );
</script>