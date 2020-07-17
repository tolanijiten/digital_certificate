<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
   <title>Add Issuer</title>
   <link rel = "icon" href =  "../../assets/images/ves_logo.png" type = "image/x-icon">	<meta charset="UTF-8">
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel="stylesheet" href="../../assets/css/style.css">
   <link rel="stylesheet" href="scripts/toastr.min.css">
    <style>
   
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
            
}
        .submit-btn{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2); background-color: #337ab7; padding: 10px; width: 50%; margin-top:15px; color: white; position: absolute;left: 25%;  border: solid 2px #337ab7;
        }
        .submit-btn:hover{
            background: #f8f9fa;
            border: solid 2px #337ab7;
            color: #337ab7;
        }
	

</style>
</head>

<body>
  <?php
    require_once('navbar.php');
    ?>
   <section style="margin:100px;">
       <div class="container" style="">
          <div class="inner-container" style="">
           <div class="form-title">
                        <div class="category-heading text-center">
                            <h3  class="text-heading" style="font-size: 30px;">Add Issuer</h3>
                            <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
                        </div><!--End of category-heading-->
                    </div><!-- End of Form Title-->
                    <div class="form-content">
                        <form action="add.php" method="POST" onsubmit="return validate()">
                        <div class="row">
                            <div class="col-md-5 ">
<!--                            <span style="color: red;">Invalid</span>-->
                                </div>
                                <div class="col-md-6 ">
                            <h5><span style="color: red; display:none" id="incomplete">Form Incomplete!!</span></h5>
                            

                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Name</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="issuer_name" placeholder="Name" name="issuer_name">
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Email</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="email" class="form-control" id="issuer_email" placeholder="Email" name="issuer_email">
                            </div> 
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Password</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="issuer_password" placeholder="Password" name="issuer_password">
                            </div>
                            </div>
                        </div>
                              
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                   <button type="submit" class="btn submit-btn" style="background-color:#337ab7" name="submit_generation">Submit</button> 
                                </div>
                            </div>
                        </form>
                    </div><!-- End of Form Content-->
           </div><!--End of inner container-->
       </div><!-- End of Container-->
   </section>
 
    <?php
    echo "<br>";
        echo "<br>";
        
    require_once('footer.php');
    ?>
          
 <script src="../../assets/js/jquery-3.2.1.min.js"></script>
 <script src="../../assets/js/bootstrap.min.js"></script>
 <script src="scripts/toastr.min.js"></script>    
 <script>
        function validate(){
        
        var issuer_name=document.getElementById("issuer_name").value;
        var issuer_email=document.getElementById("issuer_email").value;
        var issuer_password=document.getElementById("issuer_password").value;
        
        if(issuer_name == "" || issuer_email=="" || issuer_password=="" ){
        var x = document.getElementById("incomplete");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            return false;
        }
//        window.alert(prev_pass);

    }
     <?php
     
if(isset($_SESSION['failure'])){
    ?>
toastr["error"]("Sorry Email Already Exists", "Enter New Email");

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
    unset($_SESSION['failure']);
}
    ?>
     

    </script>
</body>
</html>