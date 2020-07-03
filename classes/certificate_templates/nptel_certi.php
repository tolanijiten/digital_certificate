<?php
include_once("../../functions/db.php");
session_start();
//$organisation_id=$_SESSION['organization_id'];

$committee_id=$_GET['committe_id'];
$student_id=$_GET['student_id'];

/*-----------------------Decrypting--------------------*/
$encryption_key = "DigiCertificate"; 
$ciphering = "BF-CBC";   
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0;   
$encryption_iv = '12345678';   
$committe_id_dehash = openssl_decrypt($committee_id, $ciphering, 
$encryption_key, $options, $encryption_iv);

$student_id_dehash= openssl_decrypt($student_id, $ciphering, 
$encryption_key, $options, $encryption_iv);
//echo $committe_id_dehash;
//echo $student_id_dehash;
//echo $generation_id;
//echo $student_id;
/*------------------------------------------------------*/

$query="Select * from generation where generation_id=$committe_id_dehash";  
$result=mysqli_query($connection,$query);

$row=mysqli_fetch_assoc($result);
$certificate_title=$row['certificate_title'];
$authority_1_name=$row['authority_1_name'];
$authority_2_name=$row['authority_1_name'];
$date=$row['date'];
$authority_1_signature=$row['authority_1_signature'];
$authority_2_signature=$row['authority_2_signature'];
$committee_name=$row['commitee_name'];
$logo=$row['logo'];



$query="select * from $committee_name where student_id=$student_id_dehash";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$student_name=$row['student_name'];
$year=$row['year'];
$department=$row['department'];
$class=$row['class'];
$rank=$row['rank'];
$field=$row['field'];
$score=$row['score'];
$qr_code=$row['qr_image'];


?>
<html>

<head>
    <title>E certi</title>
    <link rel="icon" href="../../assets/images/ves_logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

</head>

<body>
    <?php
    require_once("nav_certi.php");
    ?>
    <div class="main" id="html-content-holder" style="margin-top:60px;">
        <div class="container-fluid">
            <div class="text-center">
                <p class="text-left content content4" style="margin-top:25px; margin-bottom:0;">Sr.no
                    <?php echo $student_id_dehash?>
                </p>
                <ul class="list-inline">
                    <li><img src="../../assets/images/certificate_inside_images/logo.png" style="margin:0px 25PX 0PX 25PX"></li>

                </ul>
            </div>
            <p class="own">Certificate Of Completion</p>
            <p class="own">VESIT-NPTEL Value Added Course</p>
        </div>
        <br>
        <br>
        <div class="font-specifications">
            <div class="text-center content">
                <span class="first">This Certificate is awarded to</span>
            </div>
            <div class="text-center content">
                <span class="first"><u>
                        <?php echo $student_name;?></u></span>
            </div>
            <div class="text-left content" style="line-height: 2;">
                <span class="first">of &nbsp;
                    <?php echo $year; ?> &nbsp; year , &nbsp; <u>
                        <?php echo $department;?></u> &nbsp; Dept. for successfully completing Institute level examination conducted for Swayam NPTEL Course &nbsp; <u>
                        <?php echo $field;?></u></span>
            </div>
        </div>
        <div style="margin-top: 50px;">
            <div class="content3" style="margin-bottom: 20px;"><span>Date:
                    <?php echo $date;?> </span></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 text-center">
                    <p class="content3">
                        <image style="height: 50px; width: 120px" src="../issuer/images/authority_1_signature/<?php echo  $authority_1_signature;?>"></image>
                    </p>
                    <p class="content4 text-center">VESIT NPTEL Chapter, Department Incharge </p>
                </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="content3">
                        <image style="height: 50px; width: 120px" src="../issuer/images/authority_2_signature/<?php echo $authority_2_signature ?>"></image>
                    </p>
                    <p class="content4">Principal / Vice Pricipal</p>
                </div>
                <div class="col-md-2 col-sm-2">
                    <img src="../issuer/images/<?php echo $qr_code?>" style="height: 65px; width: 65px;">
                </div>
            </div>
        </div>
    </div>

    <!--
         <input id="btn-Preview-Image" type="button"
                value="Preview" />  
-->
    <!--
     <div class="row">
         <div class="col-md-12 col-sm-12 text-center">
          <a id="btn-Convert-Html2Image" class="btn btn-primary" href="#"> 
        Download 
    </a>    
         </div>
     </div>     
-->
    <!--
    <a id="btn-Convert-Html2Image" style="margin-left:725px;" class="btn btn-primary" href="#"> 
        Download 
    </a> 
-->

    <br />

    <!--    <h3>Preview :</h3> -->

    <div id="previewImage"></div>
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
    <script>
        $(document).ready(function() {
            var element = $("#html-content-holder");
            var getCanvas;

            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        $("#previewImages").append(canvas);
                        getCanvas = canvas;

                    }
                });

            });

            $("#btn-Convert-Html2Image").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        //                        $("#previewImages").append(canvas); 
                        getCanvas = canvas;

                    }
                })
                var imgageData = getCanvas.toDataURL("image/png");
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");

                $("#btn-Convert-Html2Image").attr(
                    "download", "Ecertificate.png").attr(
                    "href", newData);
            });

        });

    </script>
</body>

</html>