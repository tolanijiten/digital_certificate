<?php
require_once("../../functions/db.php");
if(isset($_POST['delete_record'])){
    $generation_id = $_POST['generation_id'];
    $student_id = $_POST['student_id'];
    $query = "Select commitee_name from generation where generation_id = $generation_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $commitee_name = $row['commitee_name'];
    $query = "delete from $commitee_name WHERE student_id =  $student_id";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "DELETED SUCCESSFULLY!!";
        header("Location: view_detail_history.php?generation_id=$generation_id");
    }
}
if(isset($_POST['delete_certi'])){
    $generation_id = $_POST['generation_id'];
    echo $generation_id;
    //$student_id = $_POST['student_id'];
    $query = "Select commitee_name from generation where generation_id = $generation_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $commitee_name = $row['commitee_name'];
    echo $commitee_name;
    $query = "Drop table $commitee_name";
    $result = mysqli_query($connection, $query);
    if($result){
        $query1 ="Delete from generation where generation_id = $generation_id";
       $result1 = mysqli_query($connection, $query1);
        echo "here";
        if($result1){
            header("Location: view_history.php");
        } 
    }
}
?>