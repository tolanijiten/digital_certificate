<?php
include_once('../../functions/db.php');
session_start();
//$admin_id=$_SESSION['user_id'];
$admin_id=1;
if(isset($_POST['submit_generation'])){
//    echo 'here';
    $issuer_name = $_POST['issuer_name'];
//    echo $issuer_name;
    $issuer_name = $_POST['issuer_name'];
    $issuer_email = $_POST['issuer_email'];
    $issuer_password = mysqli_real_escape_string($connection,$_POST['issuer_password']);
    $hashed_password = openssl_encrypt($issuer_password,"AES-128-ECB", 'digicert');

    $query1 = "SELECT * FROM users WHERE email_id = '$issuer_email'";
//    echo $query1;
    $result1 = mysqli_query($connection, $query1);
    $row = mysqli_fetch_assoc($result1);
//    echo mysqli_num_rows($result1);
    
    if(mysqli_num_rows($result1)>=1){
//        echo 'here';
//        echo mysqli_num_rows($result1);
        $_SESSION['failure']=1;
        header("Location: http://localhost/ecertificate/classes/admin/add_issuer.php");
    }
    else{
        
    $query = "INSERT INTO users(user_id,email_id,password,role,logged_in,user_name,deleted) VALUES('','$issuer_email','$hashed_password',1,0,'$issuer_name',0)";
    $result = mysqli_query($connection,$query);
    if(!$result)
    {
        die("Query Failed : ". mysqli_error($connection));
        echo $query;
    }
    $_SESSION["add_user"]=1;
    header("Location: http://localhost/ecertificate/classes/admin/view_issuer.php");
    }
    
}
?>