<script>
$(document).ready(function() {
	$('div.btn-info').click(function(){
		var id = $(this).attr('id');
		var row = $(this).parent().parent();
		$ .ajax({
			type: 'post',
			url: 'ajax_delete.php',
			data: {delete: id},
			beforeSend: function(){row.css("background","#FF4A4F");},
			success: function(){row.remove();location.reload();},
			});
	});
});
$(document).ready(function() {
	$('div.btn-success').click(function(){
		var id = $(this).attr('id');
		var row = $(this).parent().parent();
		$ .ajax({
			type: 'post',
			url: 'ajax_delete.php',
			data: {activate: id},
			success: function(){row.css("background","lightgreen");location.reload();}
			});
	});
});
$(document).ready(function() {
	$('div.btn-warning').click(function(){
		var id = $(this).attr('id');
		var row = $(this).parent().parent();
		$ .ajax({
			type: 'post',
			url: 'ajax_delete.php',
			data: {unblock: id},
			success: function(){row.css("background","lightgreen");location.reload();}
			});
	});
});
$(document).ready(function() {
	$('div.btn-danger').click(function(){
		var id = $(this).attr('id');
		var row = $(this).parent().parent();
		$ .ajax({
			type: 'post',
			url: 'ajax_delete.php',
			data: {block: id},
			success: function(){row.css("background","#FF4A4F");location.reload();}
			});
	});
});
</script>
<form role="form" action="index.php?str=pretraga2" method="post" name="pretraga">
<div class="panel panel-default pull-left" style="width: 500px; margin-bottom: 50px">
<div class="panel-heading"><h4 style="margin: 3px 3px 3px 3px">Pretraga</h4></div>
<div class="panel-body">
<div class="form-group" style="width: 60%">
<label for="textboxime">Ime </label><input class="form-control" type="text" name="ime" id="textboxime"></br>
<label for="textboxime">Prezime </label><input class="form-control" type="text" name="prezime"></br>
<label for="textboxime">Email </label><input class="form-control" type="text" name="email"></br>
<input class="btn btn-default btn-lg" type="submit" value="TRAŽI SVE" name="submit">
</div></div></div>
<div class="panel panel-primary pull-left" style="width: 500px; margin-bottom: 50px">
<div class="panel-heading"><h4 style="margin: 3px 3px 3px 3px">Brza selekcija</h4></div>
<div class="panel-body">
<div class="form-group pull-left" style="margin: auto 50px auto auto; width: 150px;">
<label>Prikaz novih članova</label></br>
<label><input class="btn btn-primary" type="submit" value="NOVI" name="submit"></label>
</div>
<div class="form-group pull-left" style="margin: auto auto auto auto; width: 200px;">
<label><span>Prikaz blokiranih članova</span></label></br>
<label><input class="btn btn-primary" type="submit" value="BLOKIRANI" name="submit"></label>
</div></div></div>
</form>


<?php
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
echo "<div id='dglavniSadrzaj'>";
if(isset($_POST['submit'])){
	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	if($_POST['submit']=="TRAŽI SVE"){
		//VAZNO! Proveri da li se kolone u tabeli volonter zovu blokiran i aktiviran
		$query = "SELECT volonter.id, ime, prezime, email, blokiran, aktiviran FROM volonter ";
		
		$uime = "ime like ";
		$uprezime = "prezime like ";
		$uemail = "email like ";
		$and = " ";
		if((isset($_POST['ime'])&&!empty($_POST['ime']))||(isset($_POST['prezime'])&&!empty($_POST['prezime']))||(isset($_POST['email'])&&!empty($_POST['email']))){$query = $query . "WHERE ";}
		
		if(!empty($_POST['ime'])){$query = $query . $uime . "'%" . $_POST['ime'] . "%'"; $and = " AND "; }
		
		if(!empty($_POST['prezime'])){$query = $query . $and . $uprezime . "'%" . $_POST['prezime'] . "%'"; $and = " AND ";}
		
		if(!empty($_POST['email'])){$query = $query . $and . $uemail . "'%" . $_POST['email'] . "%'"; $and = " AND ";}
		
		$query = $query . " ORDER BY prezime ASC, ime ASC ";
		//echo $query;
		
		mysqli_query ($conn,"set character_set_results='utf8'");
		$result = mysqli_query($conn,$query);
		
		echo "<div><table id=\"tabela\">";
		echo "<thead>
				<tr><th>Ime</th><th>Prezime</th><th>email</th><th>blokiran</th><th>aktivan</th><th>akcija</th><th>brisanje</th></tr>
			  </thead><tbody>";
		$akcija = "";
		while($row = mysqli_fetch_assoc($result)){
		if($row['aktiviran']=='0'){$akcija = "<div id=\"{$row['id']}\" class=\"btn btn-success\" >Aktiviraj</div>";}
		else if ($row['blokiran']=='0'){$akcija = "<div id=\"{$row['id']}\"  class=\"btn btn-danger\" >Blokiraj</div>";}
		else{$akcija = "<div id=\"{$row['id']}\"  class=\"btn btn-warning\">Odblokiraj</div>";}
		echo "<tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>". $row['blokiran'] ."</td><td>". $row['aktiviran'] ."</td><td>". $akcija ."</td><td><div id=\"{$row['id']}\" class=\"btn btn-info\">Brisanje</div></td></tr>";
		//onclick=\"akcijaKorisnik('delete',".$row['id'].");showKorisnik('1');asd()\"
		}	
		echo "</tbody></table></div>";
	}
	else if($_POST['submit']=="NOVI"){
		//Akcija koja vraca sve nove korisnike (rezultat pritiska na dugme "novi" na formi)
		//NAPOMENA novi korisnici su korisnici kojima je u tabeli volonteri polje aktiviran = 0, tj. korisnici koji jos nisu aktivirani
		//VAZNO! Proveri da li se kolone u tabeli volonter zovu blokiran i aktiviran
		$query = "SELECT volonter.id, ime, prezime, email, blokiran, aktiviran FROM volonter WHERE aktiviran = '0'";
	
		$query = $query . " ORDER BY prezime ASC, ime ASC ";
		//echo $query;
		
		mysqli_query ($conn,"set character_set_results='utf8'");
		$result = mysqli_query($conn,$query);
		
		echo "<div><table id=\"tabela\">";
		echo "<thead>
				<tr><th>Ime</th><th>Prezime</th><th>email</th><th>blokiran</th><th>aktivan</th><th>akcija</th><th>brisanje</th></tr>
			  </thead><tbody>";
		
		while($row = mysqli_fetch_assoc($result)){

		echo "<tr><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>". $row['blokiran'] ."</td><td>". $row['aktiviran'] ."</td><td><div id=\"{$row['id']}\" class=\"btn btn-success\">Aktiviraj</div></td><td><div id=\"{$row['id']}\" class=\"btn btn-info\">Brisanje</div></td></tr>";
		}	
		echo "</tbody></table></div>";
	}
	else if($_POST['submit']=="BLOKIRANI"){
		//Akcija koja vraca sve blokirane korisnike (rezultat pritiska na dugme "blokirani" na formi)
		//VAZNO! Proveri da li se kolone u tabeli volonter zovu blokiran i aktiviran
		$query = "SELECT volonter.id, ime, prezime, email, blokiran, aktiviran FROM volonter WHERE blokiran = '1'";
	
		$query = $query . " ORDER BY prezime ASC, ime ASC ";
		//echo $query;
		
		mysqli_query ($conn,"set character_set_results='utf8'");
		$result = mysqli_query($conn,$query);
		
		echo "<div><table id=\"tabela\">";
		echo "<thead>
				<tr><th>Ime</th><th>Prezime</th><th>email</th><th>blokiran</th><th>aktivan</th><th>akcija</th><th>brisanje</th></tr>
			  </thead><tbody>";
		
		while($row = mysqli_fetch_assoc($result)){

		echo "<tr><a href=\"#\"><td>" . $row['ime'] . "</td><td>" . $row['prezime'] . "</td><td>" . $row['email'] . "</td><td>". $row['blokiran'] ."</td><td>". $row['aktiviran'] ."</td><td><div id=\"{$row['id']}\"  class=\"btn btn-warning\">Odblokiraj</div></td><td><div id=\"{$row['id']}\" class=\"btn btn-info\">Brisanje</div></td></a></tr>";
		}	
		echo "</tbody></table></div>";
	}
}
//mysqli_close($conn);
?>
<script>
$(document).ready(function() {
    $('#tabela').DataTable();
} );
</script>
</div>