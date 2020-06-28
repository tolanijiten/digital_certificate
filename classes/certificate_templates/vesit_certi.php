<?php
include_once("../../functions/db.php");
session_start();
$organisation_id=$_SESSION['organization_id'];

$generation_id=$_GET['generation_id'];
$student_id=$_GET['student_id'];
//echo $generation_id;
//echo $student_id;
$query="Select * from generation where generation_id=$generation_id";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$certificate_title=$row['certificate_title'];
$signature_1=$row['issuer_name'];
$signature_2=$row['higher_authority_name'];
$date=$row['date'];
$issuer_signature=$row['issuer_signature'];
//echo $issuer_signature;
$higher_authority_signature=$row['higher_authority_signature'];
//echo $higher_authority_signature;
//$qr_code=$row[''];
$committee_name=$row['commitee_name'];
//echo $committee_name;
$logo=$row['logo'];



$query="select * from $committee_name where student_id=$student_id";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$student_name=$row['student_name'];
$field=$row['field'];
$class=$row['class'];
$rank=$row['rank'];
$qr_code=$row['qr_image'];
//echo $qr_code;






//$student_name = "Vishal Israni";
//$field = "Academics";
//$rank = "1st";
//$class= "D15";
$query="select * from organization where organization_id=$organisation_id";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$organisation_name=$row['name'];

//$organisation_name = "VIVEKANAND INSTITUTE OF TECHNOLOGY";
//$date = "22/07/2018";
//$signature_1 = "Signature";
//$signature_2 = "Signature";
//$certificate_title = "Certificate of Achievement";
//$committee_name = "CSI";

?>
<html>
    <head>
        <title>E certi</title>
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <style>
        .ves{
    
    margin: 180px;
    margin-top: 30px;;
    margin-bottom: 0;
    border-style:double;
    border-width:15px;
    border-color:#FFD700;
}
            .tops{
    margin-top: 10px;
    font-family:"roboto";
    font-size:30px;
    color:red;
    font-weight: 300;
}
            .font-specifications .content{
                font-size: 25px;
            }

        </style>
    </head>
    <body>
    <div class="ves">
         <div class="container-fluid"> 
         <div class="text-center">  
            <ul class="list-inline">
                <li><img src="../../assets/images/certificate_inside_images/logo.png" style="margin:0px 25PX 0PX 25PX"></li>
                <li style="margin-top:30px;"><p class="tops"><b>VIVEKANAND EDUCATION SOCIETY'S <br>INSTITUTE OF TECHNOLOGY</b></p>
                  
                </li>
                <li><img src="../higher_authority/images/<?php echo $qr_code?>" style="margin: 0px 25px" alt=""></li>

            </ul>
            </div>
            <p class="own" style="font-size:35px;">Certificate Of Excellence</p>
            </div>
            <br>
            <br>
             <div class="font-specifications">
             <div class="text-center content">
                 <span class="first">This certificate is proudly presented to  </span>
<!--                 <span id="input_name"><u><?php //echo $student_name;?></u></span>&nbsp;&nbsp;&nbsp;<span class="first">of &nbsp;</span><span>_____&nbsp;</span><span>year,&nbsp;&nbsp;</span><span id="input_class"><u><?php echo $class;?></u></span><span class="next">&nbsp;&nbsp;&nbsp;Dept. for</span> -->
         
             </div>
             <div class="text-center content">
                 <span id="input_name"><u><?php echo $student_name;?></u></span>
             </div>
             <div class="text-center content"><span class="first">of &nbsp;</span><span>_____&nbsp;</span><span>year,&nbsp;&nbsp;</span><span id="input_class"><u><?php echo $class;?></u></span><span class="next">&nbsp;&nbsp;&nbsp;Dept. for</span> &nbsp;<span class="first">securing&nbsp;&nbsp;&nbsp;</span><span id="input_position"><u><?php echo $rank; ?></u></span>&nbsp;&nbsp;&nbsp;<span class="first">position in &nbsp;</span><span id="input_event"><u><?php echo $field;?></u></span><span class="next">&nbsp;&nbsp;&nbsp;</span> 
                 </div>
             <div class="text-center" style="margin-top:50px;">
                 <span class="first">Date: xxxx,2020</span> 
         
             </div>
             
             </div>
             <div style="margin-top: 80px;">
             <div class="container">
                <div class="row">
             <div class="col-md-6 col-sm-6 text-center">
                 <p class="content3"><image style="height: 50px; width: 120px" src="../issuer/images/issuer_signature/<?php echo  $issuer_signature;?>"></image></p>
                 <p class="content4 text-center">Department HOD </p>
             </div>
             <div class="col-md-6 col-sm-6 text-center">
                 <p class="content3"><image  style="height: 50px; width: 120px" src="../higher_authority/images/higher_authority_signature/<?php echo $higher_authority_signature ?>"></image></p>
                 <p class="content4">Principal / Vice Pricipal</p>
             </div>
             </div>
             </div>
            </div>
        </div>   
    </body>
</html>