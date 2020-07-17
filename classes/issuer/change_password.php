<?php
require_once('../../functions/db.php');
session_start();
$user_id=$_SESSION['user_id'];
$query="select * from users where user_id=$user_id";
$result=mysqli_query($connection,$query);
$result_set=mysqli_fetch_assoc($result);
$logged_in=$result_set['logged_in'];
//echo $logged_in;
//exit;
if($logged_in==0){
?>
<!DOCTYPE html>
<html>
<head>
   <title>Change Password</title>
   <link rel = "icon" href =  "../../assets/images/ves_logo.png" type = "image/x-icon">	<meta charset="UTF-8">

   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
   
        body{
	font-family: "Nunito Sans", sans-serif;
/*    background-image: url("../../assets/images/vesit_certi.png");*/
/*    background-color: #cccccc;*/
/*
    height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    opacity: 50%;
*/
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
<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
     <img src="../../assets/images/ves_logo.png" height="40px;" style="margin-right:20px;">

  <a class="navbar-brand" href="#">Vivekanad Education Society Institute of Technology</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<!--
    <ul class="navbar-nav ml-auto my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#"><i class="fa fa-user-plus"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#"><i class="fa fa-eye"></i></a>
      </li>
      <li class="nav-item">
        <a class="logout btn bit_button" href="../classes/login/login.php" >Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
-->
<!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>
   <section style="margin:100px;">
       <div class="container" style="">
          <div class="inner-container" style="">
           <div class="form-title">
                        <div class="category-heading text-center">
                            <h3  class="text-heading" style="font-size: 30px;">Change Password</h3>
                            <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
                        </div><!--End of category-heading-->
                    </div><!-- End of Form Title-->
                    <div class="form-content">
                       
                        <form action="change_password_process.php" method="POST" onsubmit="return velidate()">
                            <div class="row">
                            <div class="col-md-5 ">
<!--                            <span style="color: red;">Invalid</span>-->
                                </div>
                                <div class="col-md-6 ">
                            <span style="color: red; display:none" id="incomplete">Form Incomplete!!</span>
                            <span style="color: red; display:none" id="pswrd">Confirm Password doesnot match!!</span>

                                </div>
                            </div>
                        <div class="row">
                           
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Previous Password</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="previous_password" placeholder="Enter Passowrd recived form Admin" name="previous_password">
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">New Password</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="password" class="form-control" id="new_password" placeholder="New Password" name="new_password">
                            </div> 
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Confirm Password</label>
                                <div style="width: 50px; height: 3px; background:#337ab7; margin-bottom: 15px;"></div>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                            </div>
                            </div>
                        </div>
                              
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                   <button type="submit" class="btn submit-btn" style="" name="submit_generation">Submit</button> 
                                </div>
                            </div>
                        </form>
                        
                        
                    </div><!-- End of Form Content-->
           </div><!--End of inner container-->
       </div><!-- End of Container-->
   </section>
    
 <script src="../../assets/js/jquery-3.2.1.min.js"></script>
 <script src="../../assets/js/bootstrap.min.js"></script>   
 
  <script>
    function velidate(){
        
        var prev_pass=document.getElementById("previous_password").value;
        var new_pass=document.getElementById("new_password").value;
        var cnf_pass=document.getElementById("confirm_password").value;
        
        if(prev_pass == "" || new_pass=="" || cnf_pass=="" ){
        var x = document.getElementById("incomplete");
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            return false;
        }else if(new_pass != cnf_pass){
//            window.alert("cnf");
            var y = document.getElementById("pswrd");
            if (y.style.display === "none") {
                y.style.display = "block";
                return false;
            }
        }
//        window.alert(prev_pass);

    }
    </script> 
    <?php
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
    
    require_once('footer.php');
    ?>
</body>
</html>
<?php 
    }else{
        header("Location: ../issuer/select_template.php");
} 
?>