<?php
require_once("../../functions/db.php");
session_start();
if(isset($_POST['update_record'])){
    $generation_id = $_POST['generation_id'];
    $student_id = $_POST['student_id'];
    $student_name=$_POST['name'];
    $year=$_POST['year'];
    $department=$_POST['dept'];
    $class=$_POST['class'];
    $rank=$_POST['rank'];
    $field=$_POST['field'];
    $score=$_POST['score'];
    $email=$_POST['email'];    
    
//    $student_name=
    $query = "Select commitee_name from generation where generation_id = $generation_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    $commitee_name = $row['commitee_name'];
    
    $query = "Update $commitee_name Set 
                            student_name='$student_name',
                            year='$year',
                            department='$department',
                            class='$class',
                            rank='$rank',
                            field='$field',
                            score='$score',
                            email='$email'
                            WHERE student_id =  $student_id";
//    
//    echo $query;
//    exit;
    $result = mysqli_query($connection, $query);
    if($result){
        echo "Updates SUCCESSFULLY!!";
        $_SESSION['update']=1;
        header("Location: view_detail_history.php?generation_id=$generation_id");
    }
}   

?>