<?php
require_once("../../functions/db.php");
session_start();
$generation_id=$_GET['generation_id'];
global $connection;
$query="Select * from generation where generation_id = $generation_id";
$result = mysqli_query($connection , $query);
$row = mysqli_fetch_array($result);
$commitee_name = $row['commitee_name'];


$query2 = "select * from $commitee_name ";
$result2 = mysqli_query($connection , $query2);
$html="<table>";
while($row2 = mysqli_fetch_assoc($result2)){
    $student_id=$row2['student_id'];
    $student_name = $row2['student_name'];
    $class = $row2['class'];
    $rank = $row2['rank'];
    $field= $row2['field'];
    $email=$row2['email'];
    $link=$row2['link'];
    $qr=$row2['qr_image'];
    $html.="<tr><td>$student_id</td><td>$student_name</td><td>$class</td><td>$rank</td><td>$field</td><td>$email</td><td>$qr</td><td>$link</td></tr>";
}
$html.="</table>";
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=list.xls');
echo $html;
?>