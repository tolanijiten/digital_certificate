<?php
require_once("../../functions/db.php");
session_start();
//echo 'here';
//$admin_id = $_SESSION['user_id'];
$user_id = $_GET['user_id'];
echo $user_id;
$query = "UPDATE users SET deleted = 1 WHERE user_id =  $user_id";
    
//    echo $category_id;
//    echo $query;
mysqli_query($connection, $query);
echo "DELETED SUCCESSFULLY!!";
header("Location: http://localhost/ecertificate/classes/admin/view_issuer.php");

?>