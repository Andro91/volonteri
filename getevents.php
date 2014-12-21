<?php require_once"php/konfiguracija.php"?>

<?php 
$p = 0;

$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$query = "SELECT * FROM dogadjaji";

$numres = mysqli_query($conn,$query);
$numpages =  ceil(mysqli_num_rows($numres)/5);

?>
<div id="glavniSadrzaj_vesti">
<?php
$q = intval($_GET['q']);

            $side = 5*(int)$q;
            $conn = mysqli_connect("localhost","root","","volonteri");
            mysqli_query ($conn,"set character_set_results='utf8'");
            $query = "SELECT * FROM dogadjaji LIMIT ".($side-5).",".($side);
            $result = mysqli_query($conn,$query);
   
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $title = $row["naslov"]; 
                    $date = $row["datum"];
                    $text = $row["kratakopis"];
                    echo '<div id="vest" class=\"container\"><img src="#" />';
                    echo "<h3><a href='index.php?str=dogadjaj&id={$id}'>{$title}</a></h3>";
                    $date = date_create($date);
                    echo "<p>".date_format($date, 'd-M-Y')."</p>";
                    echo "<article>".$text."</article>";
                    echo '<br clear="all" /><hr /></div>';
                } 

            mysqli_free_result($result);
            mysqli_close($conn);  
?>
</div>
<div class="text-center">
	<ul class="pagination">
        <?php 
		if($q==1){echo "<li class='disabled'><div onclick=\"\">&laquo;</div></li>";}
		else{echo "<li><div onclick=\"showEvent(".($q-1).")\">&laquo;</div></li>";}
		$a=0;
		while($a<$numpages){
			if($a==($q-1)){
			echo "<li class='active'><div onclick=\"showEvent(".($a+1).")\">".($a+1)."</div></li>";
			}else{
			echo "<li><div onclick=\"showEvent(".($a+1).")\">".($a+1)."</div></li>";
			}
			$a++;
			}
		if($q==$numpages){echo "<li class='disabled'><div onclick=\"\">&raquo;</div></li>";}
		else{echo "<li><div onclick=\"showEvent(".($q+1).")\">&raquo;</div></li>";} 
		?>

	</ul>
</div>