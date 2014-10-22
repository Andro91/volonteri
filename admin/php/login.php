<?php
function redirect_to($new_location){
   header("Location: " . $new_location); 
   exit; 
}
?>
<?php session_start()?>
<?php
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = isset($_POST['email']) ? $_POST['email'] : "q";
    $password = isset($_POST['password']) ? $_POST['password'] : "q";
 
    $conn = mysqli_connect("localhost","root","","volonteri");
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,"SET @em = " . "'" . mysqli_real_escape_string($conn,$email) . "'");
    mysqli_query($conn,"SET @pas = " . "'" . mysqli_real_escape_string($conn,$password) . "'");

    $result = mysqli_query($conn,"CALL login(@em,@pas)");
    if(!$result) {die("CALL failed: (" . mysqli_errno() . ") " . mysqli_error());}
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $_SESSION['userid']=$row['id'];
            $_SESSION['name']=$row['ime'];
        }
    }
}
?>