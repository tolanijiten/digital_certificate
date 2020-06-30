<?php
require_once('../../functions/db.php');
session_start();
$user_id=$_SESSION['user_id'];
if(isset($_POST['submit_generation'])){
    $previous_password=$_POST['previous_password'];
//    echo $previous_password;
    $new_password=$_POST['new_password'];
    $query="select * from users where user_id=$user_id";
    $result=mysqli_query($connection,$query);
    $result_set=mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) ==1)
    {   
        $password=$result_set['password'];
        $db_dehased_password = openssl_decrypt($password, "AES-128-ECB", 'digicert'); 
//        echo $db_dehased_password;
        if($db_dehased_password==$previous_password){
            echo "match";
            $hashed_new_password = openssl_encrypt($new_password, "AES-128-ECB", 'digicert'); 
            $query="Update users set password='$hashed_new_password',logged_in=1 where user_id=$user_id";
            $result=mysqli_query($connection,$query);
            if(!$result){
                die("Query failed". mysqli_error($connection));
            }else{
                 header("Location: ../issuer/select_template.php");
            }
            
        }else{                          //Previous password doesnot match
            die("Password not match");
        }
    }else{
        die( "Invalid email id");
    }
}
?>