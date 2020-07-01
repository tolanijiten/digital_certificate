<?php
include_once("../../functions/db.php");
ob_start();
session_start();
//$organization_id = $_SESSION["organization_id"];// to be uncommented
//$organization_id = 13; //to be commented afterwards when involving sessions
$template_id=$_GET['template_id'];
//echo $template_id;
    
    
?>
<html>

<head>
   <title>Generate Certificate</title>
   <link rel = "icon" href =  "../../assets/images/ves_logo.png" type = "image/x-icon">
   
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    
    <style>
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
}
    input[type=file]::-webkit-file-upload-button {
        background: #fff;
        color: #337ab7;
        border: solid, 1px, #337ab7;
/*        border-radius: 25px 0 25px;*/
/*        letter-spacing: 1px;*/
}
        input[type=file]::-webkit-file-upload-button:hover {
        color: #fff;
        background: #337ab7;
/*        border: solid, 1px, #337ab7;*/
/*        border-radius: 25px 0 25px;*/
/*        letter-spacing: 1px;*/
}
        .submit-btn{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2); background-color: #337ab7; padding: 10px;  border: solid 2px #337ab7;width: 25%; margin-top:10px;; color: white;
        }
        .submit-btn:hover{
            background: #f8f9fa;
            border: solid 2px #337ab7;
            color: #337ab7;
        }
    </style>
</head>

<body style="background: #337ab7;">
   <?php
    require_once("navbar.php");
    ?>
    <section id="generation_form" style="height:100%">
        <div class="container-fluid" style="height:100%">
            <div class="row" style="height:100%">
                <div class="col-md-5" style=" background: #fff; padding: 50px; border: solid 2px #337ab7; margin-top:60px;">
                    <div class="form-title">
                        <div class="category-heading text-center">
                            <h3  class="text-heading" style="font-size: 30px;">Category</h3>
                            <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
                        </div>
                        
                        <!--End of category-heading-->
                    </div>
                    <!--End of form-title-->
                    <div class="form-content">
                        <form action="insert_generation.php" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="">Organisation Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <?php
//                               $query = "SELECT * FROM organization WHERE organization_id = $organization_id";
//                               $result = mysqli_query($connection, $query);
//                               $row = mysqli_fetch_assoc($result);
                               
                               ?>
                                <input type="text" class="form-control" id="" placeholder="Organisation Name" name="name" value="VESIT" readonly>
                            </div>
<!--
                            
                            <div class="form-group">
                                <label for="">Logo </label>
                                <span style="color: red;">Upload a Transperent png. Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools</a></span>
                                <div style="width: 20px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" accept="image/*" id="" name="logo">
                            </div>
-->
                            
                            
                            <div class="form-group">
                                <label for="">Committee Name</label>  
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div><span style="color:red;">format(write the committee name,then a underscore and then year)Eg. ISTE_2020</span>
                                <input type="text" class="form-control" id="" placeholder="Commitee Name" name="commitee_name">
                            </div>
<!--
                            
                            <div class="form-group">
                                <label for="">Certificate Title</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Certificate Title" name="certificate_title">
                            </div>
-->
                           
                            <div class="form-group">
                                <label for="">Date</label>
                                <div style="width: 30px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="date" class="form-control" id="" name="date">
                            </div>
                            <div class="form-group">
                                <label for="">First Authority Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Issuer Name" name="signature_1_name">
                            </div>
                            <div class="form-group">
                                <label for="">First Authority Signature </label>
                                <span style="color: red;">Upload a Transperent png photo
<!--                                . Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools</a>-->
                                
                                </span>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="" name="signature_1_photo" class="">
                                   
                            </div>
                            <div class="form-group">
                                <label for="">Second Authority Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Higher Authority Name" name="signature_2_name">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Second Authority Signature </label>
                                <span style="color: red;">Upload a Transperent png photo
<!--                                . Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools</a>-->
                                
                                </span>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="" name="higher_authority_signature" class="">
                                   
                            </div>
                            
                            <div class="form-group">
                                <label for="">Upload Excel Sheet</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="" name="excel_sheet" class="">
                            </div>
                            <div class="form-group">
<!--                                <label for="">Upload Excel Sheet</label>-->
<!--                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>-->
                                <input type="hidden" id="" name="template_id" class="" value='<?php echo $template_id; ?>'>
                            </div>
                            
                            <button type="submit" class="btn submit-btn"name="submit_generation">Submit</button>
                        </form>
                    </div>
                    <!--End of form-content-->
                </div>
                <!--End of col-md-6-->
                <div class="col-md-7" style="background-color: #337ab7; padding: 50px; position:fixed; top:60; right:0; height:100%;">
                    <div class="certificate-image" style="padding: 50px;">
                    <div class="image-outer" style="padding: 20px; padding-left: 60px;">
<!--                        <div class="image-inner">-->
                            <img src="../../assets/images/<?php echo $template_id;?>.png" alt="Work" class="img-fluid">
<!--                        </div>-->
                    </div>
                    </div><!--Certifiacte Image-->
                </div>
            </div>
            <!--End of row-->
        </div>
        <!--End of container-->
    </section>
    
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        
    </script>
    
</body>

</html>
