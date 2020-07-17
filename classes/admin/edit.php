<?php
require_once("../../functions/db.php");
session_start();
if(isset($_POST['update_record'])){
//    $generation_id = $_POST['generation_id'];
    $student_id = $_POST['student_id'];
    $student_name=$_POST['name'];
//    $year=$_POST['year'];
//    $department=$_POST['dept'];
//    $class=$_POST['class'];
//    $rank=$_POST['rank'];
//    $field=$_POST['field'];
//    $score=$_POST['score'];
    $email=$_POST['email']; 
    $password = $_POST['password'];
    $hashed_password = openssl_encrypt($password,"AES-128-ECB", 'digicert');
    
//    $student_name=
    $query= "UPDATE users SET user_name = '$student_name', email_id = '$email', password='$hashed_password' WHERE user_id = $student_id";
//    echo $query;
//    exit();
    $result = mysqli_query($connection, $query);
    if($result){
        echo "Updates SUCCESSFULLY!!";
        $_SESSION['update']=1;
        header("Location: view_issuer.php");
    }
}   

?>