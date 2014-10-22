<?php require_once"template/glavni-sadrzaj-pocetak.php"?>
<?php
    $q = intval($_GET['id']);

        $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
        mysqli_query ($conn,"set character_set_results='utf8'");
        mysqli_query($conn,"INSERT INTO");
        $query = "SELECT * FROM dogadjaji WHERE id = " . $q;
        $result = mysqli_query($conn,$query);

        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        $title = $row["naslov"]; 
        $text = $row["opis"];
        $date = $row["datum"];
        echo '<div id="vest"><img src="#" />';
        echo "<h2>{$title}</h2>";
        $date = date_create($date);
        if(isset($date)){echo "<p>".date_format($date, 'd-M-Y')."</p>";}
        echo $text."</br>";
        if($row["tip"]==="1"){
        echo "<div onclick='showApplication({$id})' class='osnovnoDugme'>Prijavi se!</div></br>";
        }
        echo '<br clear="all" /><hr /></div>';

        mysqli_free_result($result);
        mysqli_close($conn);
?>	

<?php require_once"template/glavni-sadrzaj-kraj.php"?>