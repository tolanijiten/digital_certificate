<?php
include_once("../../functions/db.php");
ob_start();
session_start();
if(isset($_SESSION['user_id'])){
    $template_id=$_GET['template_id'];
?>

<html>

<head>
   <title>Generate Certificate</title>
   <link rel = "icon" href =  "../../assets/images/ves_logo.png" type = "image/x-icon">
   
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../admin/scripts/toastr.min.css">
    
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
                            <h3  class="text-heading" style="font-size: 30px;">Generate</h3>
                            <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
                        </div>
                        
                        <!--End of category-heading-->
                    </div>
                    <!--End of form-title-->
                    <div class="form-content">
                        <form action="insert_generation.php" method="POST" enctype="multipart/form-data" onsubmit="return velidate()">
                           <div class="row">
                            <div class="col-md-4 ">
<!--                            <span style="color: red;">Invalid</span>-->
                            </div>
                             <div class="col-md-6 ">
                              <span style="color: red; display:none" id="incomplete">Form Incomplete!!</span>
                            </div>
                            </div>
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
                                <label for="">Committee Name </label>
                                <span style="color: red;">*</span>  
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <span style="color:#337ab7;">
                                    format(write the committee name,then a underscore and then year)Eg. ISTE_2020
                                </span>
                                <input type="text" class="form-control" id="commitee_name_id" placeholder="Commitee Name" name="commitee_name">
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
                                <span style="color:red;">*</span>  
                                <div style="width: 30px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="date" class="form-control" id="date_id" name="date">
                            </div>
                            <div class="form-group">
                                <label for="">First Authority Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Issuer Name" name="signature_1_name">
                            </div>
                            <div class="form-group">
                                <label for="">First Authority Signature </label>
                                <span style="color:red;">*</span>
                                <span style="color: #337ab7;">Upload a Transperent png photo
<!--                                . Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools</a>-->
                                
                                </span>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="fir_auth_sig" name="signature_1_photo" class="">
                                   
                            </div>
                            <div class="form-group">
                                <label for="">Second Authority Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Higher Authority Name" name="signature_2_name">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Second Authority Signature </label>
                                <span style="color:red;">*</span>
                                <span style="color: #337ab7;">Upload a Transperent png photo
<!--                                . Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools</a>-->
                                
                                </span>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="sec_auth_sig" name="higher_authority_signature" class="">
                                   
                            </div>
                            
                            <div class="form-group">
                                <label for="">Upload Excel Sheet</label>
                                <span style="color: red;">*
<!--                                . Tool: <a href="https://onlinepngtools.com/create-transparent-png">onlinepngtools
                                onchange="validate_fileupload(this.value);
                               </a>-->
                                
                                </span>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="file" id="sheet" name="excel_sheet" class="">
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
    <script src="../admin/scripts/toastr.min.js"></script>
    <script>
    function velidate(){
        
        var commitee_name_id=document.getElementById("commitee_name_id").value;
        var sheet=document.getElementById("sheet").value;
        var date_id=document.getElementById("date_id").value;
        var fir_auth_sig=document.getElementById("fir_auth_sig").value;
        var sec_auth_sig=document.getElementById("sec_auth_sig").value;
        
//        window.alert(sec_auth_sig);
        //        var new_pass=document.getElementById("new_password").value;
//        var cnf_pass=document.getElementById("confirm_password").value;
//        || new_pass=="" || cnf_pass=="" 
        if(commitee_name_id == "" || date_id == "" || sheet=="" || fir_auth_sig=="" || sec_auth_sig==""){
            window.alert("Form Incomplete");
        var x = document.getElementById("incomplete");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            return false;
        }
        
//        else if(new_pass != cnf_pass){
////            window.alert("cnf");
//            var y = document.getElementById("pswrd");
//            if (y.style.display === "none") {
//                y.style.display = "block";
//                return false;
//            }
//        }
//        window.alert(prev_pass);

    }
    </script>
    
    
    <script>
    function validate_fileupload(fileName)
{
    var allowed_extensions = new Array("jpg","png","gif");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true; // valid file extension
        }
    }
    window.alert("sheet");
    return false;
}
        
        
        
        
         <?php
if(isset($_SESSION['already_exists'])){
    ?>
toastr["error"]("Committee Already Exists", "Cannot Generate");

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        //toastr["Success"]("You just successfull edited record","Category Edit");
    <?php
    unset($_SESSION['already_exists']);
}
    ?>
    </script>
    
</body>

</html>
<?php
}
else{
    header("Location: ../login/login.php");
}
?>