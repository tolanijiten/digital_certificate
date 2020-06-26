<?php
session_start();
require_once("../../../functions/db.php");

$generation_id=$_GET['generation_id'];
$start=$_SESSION['start'];
$end=$_SESSION['end'];

$query="Select * from generation where generation_id=$generation_id";
//echo $query;
$result_set=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result_set);
$table_name=$row['commitee_name'];
echo $table_name;
$query="Select * from $table_name where student_id between $start and $end";
//echo $query;
$result_set=mysqli_query($connection,$query);
$num=mysqli_num_rows($result_set);
$count=0;
$left_students=0;
$email_c=$_SESSION['students']-5;
if($email_c<5){
    $left_students=$_SESSION['students'];
    
}else{
    $left_students=5;
}

////exit;
//while($count!=$num){
//$row=mysqli_fetch_assoc($result_set);
//$count+=1;
//echo $row['email'];
//echo $row['link'];
//echo "<br>";
//}
//exit;



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//$recv = $_GET['email'];
//$link=$_GET['link'];
//$s=$_GET['student_id'];
//echo $recv;
//$password=$_GET['password'];
//Load Composer's autoloader
//$address=array('2016.jiten.tolani@ves.ac.in','2016.latika.gurnani@ves.ac.in','2016.sanjay.janyani@ves.ac.in','2016.jiten.tolani@ves.ac.in','2016.latika.gurnani@ves.ac.in','2016.sanjay.janyani@ves.ac.in');

require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sanjayjanyani43@gmail.com';                 // SMTP username
    $mail->Password = '********';                           // SMTP password
    $mail->SMTPSecure = 'tls';          //ssl                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                      //465              // TCP port to connect to

    //Recipients
    $mail->setFrom('sanjayjanyani43@gmail.com', 'Sanjay');
//    $mail->addAddress($recvv);     // Add a recipient
//    while (list ($key, $val) = each ($address)) {
//$mail->AddAddress($val);
//}
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    while($count!=5){
    $row=mysqli_fetch_assoc($result_set);
    $count+=1;
    $email_indi=$row['email'];
    $link_indi=$row['link'];

    $mail->addAddress($email_indi);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Congratulations for your achivement ';
    $mail->Body    = 'Click the following link:  <b>'.$link_indi.'</b>  To get your certificate';
    $mail->AltBody = '';

    $mail->send();
    $mail->ClearAddresses();
    echo 'Message has been sent';
    }
    $start=$start+5;
$end=$end+5;
$_SESSION['start']=$start;
$_SESSION['end']=$end;
$_SESSION['students']=$_SESSION['students']-5;    
    
echo '<script type="text/javascript">';
echo 'window.location.href="../send_mail.php"';//'"&end="'.$end;
echo '</script>';

        
//    $url=
//    echo '<script type="text/javascript">';
//echo 'window.location.href="../send_mail.php?start=".$start';
//echo '</script>';
//    
//    header()
//    header("Location: requests.php?a=1");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


//echo "<script>window.location.href='../Admin/student_register.php?q=1'</script>";


//header("Location: ../Admin/student_register.php");
//exit();




//https://myaccount.google.com/u/1/lesssecureapps

?>






