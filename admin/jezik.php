<script>
$(document).ready(function() {
	$('#dugmeBrisi').click(function(){
		var id = $('#Select1').val();
		$ .ajax({
			type: 'post',
			url: 'ajax_jezik.php',
			data: {delete: id},
			success: function(data){$('#odgovor').html(data); $('#Select1 option:selected').remove();
			},
			});
	});
});
$(document).ready(function() {
	$('#dugmeDodaj').click(function(){
		var naziv = $('#textDodaj').val();
		$ .ajax({
			type: 'post',
			url: 'ajax_jezik.php',
			data: {insert: naziv},
			success: function(data){$('#odgovor').html(data); location.reload();},
			});
	});
});
</script>
<div id="listJezik" class="container-fluid">
<form action="index.php?str=jezik" method="post" name="pretraga">
<div class="form-group">
<label>JEZICI</label></br>
<?php
echo "<select class='form-control' name='drop1' id='Select1' size='15'>";
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
	echo "</select></br>";
?>
<div id="dugmeBrisi" class="btn btn-danger btn-lg">BRIŠI</div></br>
</div>
<div class="form-group">
<label>Dodavanje novog jezika</label>
<input id="textDodaj" class="form-control" type = "text" name = "jezik"></input>
<div id="dugmeDodaj" class="btn btn-default">Dodaj jezik</div>
</div>
</form>

<div id="odgovor" style="min-height:80px"></div>

</div>