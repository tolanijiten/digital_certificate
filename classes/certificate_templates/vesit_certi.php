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


    <style>
        .ves {

            margin: 180px;
            margin-top: 30px;
            ;
            margin-bottom: 0;
            border-style: double;
            border-width: 15px;
            border-color: #FFD700;
            padding: 50px;
            padding-bottom: 0;
        }

        .tops {
            margin-top: 10px;
            font-family: "roboto";
            font-size: 30px;
            color: red;
            font-weight: 300;
        }

        .font-specifications .content {
            font-size: 25px;
        }

    </style>
</head>

<body>
   <?php
    require_once("nav_certi.php");
    ?>
    <div class="ves" id="html-content-holder" style="margin-top:70px;">
        <div class="container-fluid">
            <div class="text-center">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <img src="../../assets/images/certificate_inside_images/logo.png" style="">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <p class="tops"><b>VIVEKANAND EDUCATION SOCIETY'S INSTITUTE OF TECHNOLOGY</b></p>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <img src="../issuer/images/<?php echo $qr_code?>" style=" height: 65px; width: 65px;" alt="">
                    </div>
                </div>
            </div>
            <p class="own" style="font-size:35px;">Certificate Of Excellence</p>
        </div>
        <br>
        <br>
        <div class="font-specifications">
            <div class="text-center content">
                <span class="first">This certificate is proudly presented to </span>

            </div>
            <div class="text-center content">
                <span id="input_name"><u>
                        <?php echo $student_name;?></u></span>
            </div>
            <div class="text-center content"><span class="first">of &nbsp;</span><span>
                    <?php echo $year;?></span><span> year,&nbsp;&nbsp;</span><span id="input_class"><u>
                        <?php echo $department;?></u></span><span class="next">&nbsp;&nbsp;&nbsp;Dept. for</span> &nbsp;<span class="first">securing&nbsp;&nbsp;&nbsp;</span><span id="input_position"><u>
                        <?php echo $rank; ?></u></span>&nbsp;&nbsp;&nbsp;<span class="first">position in &nbsp;</span><span id="input_event"><u>
                        <?php echo $field;?></u></span><span class="next">&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div class="text-center" style="margin-top:50px;">
                <span class="first">Date:
                    <?php echo $date ?></span>

            </div>

        </div>
        <div style="margin-top: 30px;">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="content3">
                        <image style="height: 50px; width: 120px" src="../issuer/images/authority_1_signature/<?php echo  $authority_1_signature;?>"></image>
                    </p>
                    <p class="content4 text-center">
                        <?php echo $authority_1_name?>
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="content3">
                        <image style="height: 50px; width: 120px" src="../issuer/images/authority_2_signature/<?php echo $authority_2_signature ?>"></image>
                    </p>
                    <p class="content4">Principal / Vice Pricipal</p>
                </div>
            </div>
        </div>
    </div>

<!--
    <div class="row" style="margin-top:30px;">
        <div class="col-md-12 col-sm-12 text-center">
            <a id="btn-Convert-Html2Image" class="btn btn-primary" href="#">
                Download
            </a>
        </div>
    </div>
-->
    <!--
    <a id="btn-Convert-Html2Image" href="#"> 
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
