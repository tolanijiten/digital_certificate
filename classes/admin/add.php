<?php
include_once('../../functions/db.php');
if(isset($_POST['submit_generation'])){
//    echo 'here';
    $issuer_name = $_POST['issuer_name'];
//    echo $issuer_name;
    $issuer_name = $_POST['issuer_name'];
    $issuer_email = $_POST['issuer_email'];
    $issuer_password = mysqli_real_escape_string($connection,$_POST['issuer_password']);
    $hashed_password = openssl_encrypt($issuer_password,"AES-128-ECB", 'digicert');

    
    $query = "INSERT INTO users(user_id,email_id,password,role,logged_in,user_name,deleted) VALUES('','$issuer_email','$hashed_password',1,0,'$issuer_name',0)";
//    echo $query;
    $result = mysqli_query($connection,$query);
    if(!$result)
    {
        die("Query Failed : ". mysqli_error($connection));
    }
    header("Location: http://localhost/ecertificate/classes/admin/add_issuer.php");
        
}
?>