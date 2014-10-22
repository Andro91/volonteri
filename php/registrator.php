
<?php
	$errors = array();
    $_SESSION['error']=array();
	
    
	
    $prezime=trim($_POST['prezime']);
	$strLen = mb_strlen($prezime, 'utf8');
	if( $strLen < 1 ) 
	{
	$errors[] = 'Niste uneli prezime.';
	}
	
	$ime=trim($_POST['ime']);
	$strLen = mb_strlen($ime, 'utf8');
	// Check stripped string
	if( $strLen < 1 ) 
	{
	$errors[] = 'Niste uneli ime.';
	}
	
    $email=$_POST['email'];
	$e = FALSE;
	if (empty($_POST['email']))
	{
	$errors[] = 'Niste uneli email.';
	}
	
	if (filter_var((trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
	$email = $_POST['email'];
	}else{
	$errors[] = 'Vas email nije u odgovarajucem formatu.';
	}

    
	$user = trim($_POST['username']);
	$strlen = mb_strlen($user, 'utf8');
	if( $strlen < 1 ) {
	$errors[] = 'Niste uneli username.';
	} 
	
	
	
	if (empty($_POST['password'])){ 
	$errors[] ='Unesite validan password';
	}
	if(!preg_match('/^\w{8,12}$/', $_POST['password'])) {
	$errors[] = 'Neispravan password, koristite od 8 to 12 karaktera.';
	} else{
	$pass = $_POST['password'];
	} 
	if($_POST['password'] == $_POST['password1']) 
	{ 
	$pass = trim($_POST['password']);
	}else{
	$errors[] = 'Vase lozinke se ne poklapaju.';
	}
	
	
	
    
	$adresa = trim($_POST['adresa']);
	$strlen = mb_strlen($adresa, 'utf8');
	if( $strlen < 1 && $strlen>30 ) {
	$errors[] = 'Niste uneli adresu ili ste uneli previse karaktera.';
	}	
	
    	
	if (empty($_POST['telefon'])){
	$tel=($_POST['telefon']);
	}
	elseif (!empty($_POST['telefon'])) 
	{
	// Strip out everything that is not a number
	$phone = preg_replace('/\D+/', '', ($_POST['telefon']));
	$tel=$phone;
	}
	
    $pol=$_POST['pol'];
	
    $zanimanje=$_POST['zanimanje'];
	
	$sskola=$_POST['srednja_skola'];
	
	
    $faks= $_POST['fakultet'];
	
    $voli= $_POST['volontersko_iskustvo'];
	
    $radi=$_POST['radno_iskustvo'];
	$strlen = mb_strlen($radi, 'utf8');
	if($strlen>30 ) {
	$errors[] = 'Uneli ste previse karaktera.';
	}	
	
	
    $nag=$_POST['nagrade'];
	$strlen = mb_strlen($nag, 'utf8');
	if($strlen>30 ) {
	$errors[] = 'Uneli ste previse karaktera.';
	}	
	
	$jezik = isset($_POST['jezik']) ? $_POST['jezik'] : "";
    $conn = mysqli_connect("localhost","root","","volonteri");

    mysqli_query ($conn,"set character_set_results='utf8'");
    mysqli_query($conn,"SET @uime = " . "'" . mysqli_real_escape_string($conn,$ime) . "'");
    mysqli_query($conn,"SET @uprezime = " . "'" . mysqli_real_escape_string($conn,$prezime) . "'");
    mysqli_query($conn,"SET @uemail = " . "'" . mysqli_real_escape_string($conn,$email) . "'");
    mysqli_query($conn,"SET @uuser = " . "'" . mysqli_real_escape_string($conn,$user) . "'");
    mysqli_query($conn,"SET @upas = " . "'" . mysqli_real_escape_string($conn,$pass) . "'");
    mysqli_query($conn,"SET @uadresa = " . "'" . mysqli_real_escape_string($conn,$adresa) . "'");
    mysqli_query($conn,"SET @utel = " . "'" . mysqli_real_escape_string($conn,$tel) . "'");
    mysqli_query($conn,"SET @upol = " . "'" . mysqli_real_escape_string($conn,$pol) . "'");
    mysqli_query($conn,"SET @uzanimanje = " . "'" . mysqli_real_escape_string($conn,$zanimanje) . "'");
    mysqli_query($conn,"SET @usskola = " . "'" . mysqli_real_escape_string($conn,$sskola) . "'");
    mysqli_query($conn,"SET @faks = " . "'" . mysqli_real_escape_string($conn,$faks) . "'");
    mysqli_query($conn,"SET @voli = " . "'" . mysqli_real_escape_string($conn,$voli) . "'");
    mysqli_query($conn,"SET @radi = " . "'" . mysqli_real_escape_string($conn,$radi) . "'");
    mysqli_query($conn,"SET @nag = " . "'" . mysqli_real_escape_string($conn,$nag) . "'");
	
	if(empty($errors))
	{
    // Call sproc
	  // `register`(IN uprezime varchar(45), IN uime VARCHAR(45),IN uemail VARCHAR(45),IN uuser VARCHAR(45),IN upass VARCHAR(45),IN uadresa VARCHAR(45),IN utel 		VARCHAR(45),IN upol INT,IN uzanimanje TEXT,IN usskola TEXT,IN faks TEXT,IN voli TEXT,IN radi TEXT,IN nag TEXT)
		$result = mysqli_query($conn,"CALL register(@uprezime,@uime,@uemail,@uuser,@upas,@uadresa,@utel,@upol,@uzanimanje,@usskola,@faks,@voli,@radi,@nag)");
		echo $result;  
    //if(!$result) {die("GREŠKA: (" . mysqli_errno() . ") " . mysqli_error());}
		if(!($jezik===""))
		{
			mysqli_query($conn,"SET @id = LAST_INSERT_ID();");
			foreach($jezik as $jez)
			{
			mysqli_query($conn,"INSERT INTO govori(jezik_id, volonter_id) VALUES ({$jez},@id)");
			}
		}
		mysqli_close($conn);
	
		header("Location: ../index.php"); 
		exit;
	}else
		{	
			
			$err=serialize($errors);
			 header("Location: ../index.php?str=registracija&&err=$err"); 
			 
		
		}


?>    