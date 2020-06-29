<?php
require_once("../../functions/db.php");
if(isset($_GET['delete_btn'])){
    echo 'here';
    $user_id = $_GET['user_id'];
    $query = "UPDATE user SET deleted = 1 WHERE user_id =  $user_id";
    
//    echo $category_id;
//    echo $query;
    mysqli_query($connection, $query);
    echo "DELETED SUCCESSFULLY!!";
}
?>