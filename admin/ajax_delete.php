<?php require_once"../php/konfiguracija.php"?>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);

	if(isset($_POST['delete'])){
		$query = "DELETE FROM volonter WHERE id = " . $_POST['delete'];
		$result = mysqli_query($conn, $query);
	}
	if(isset($_POST['block'])){
		$query = $query = "UPDATE volonter SET blokiran = '1' WHERE id = " . $_POST['block'];
		$result = mysqli_query($conn, $query);
	}
	if(isset($_POST['unblock'])){
		$query = "UPDATE volonter SET blokiran = '0' WHERE id = " . $_POST['unblock'];
		$result = mysqli_query($conn, $query);
	}
	if(isset($_POST['activate'])){
		$query = "UPDATE volonter SET aktiviran = '1' WHERE id = " . $_POST['activate'];
		$result = mysqli_query($conn, $query);
	}
mysqli_close($conn);
?>