<!DOCTYPE html>
<html>
<head>
   <title>Change Password</title>
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
   
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
            
}
        .submit-btn{
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2); background-color: #204a84; padding: 10px; width: 50%; margin-top:15px; color: white; position: absolute;left: 25%;  border: solid 2px #204a84;
        }
        .submit-btn:hover{
            background: #f8f9fa;
            border: solid 2px #204a84;
            color: #204a84;
        }
	

</style>
</head>

<body>
<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
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
                            <h3  class="text-heading" style="font-size: 30px;">Chnage Password</h3>
                            <div style="width: 50px; height: 3px; background:#204a84; margin: 0 auto 30px;"></div>
                        </div><!--End of category-heading-->
                    </div><!-- End of Form Title-->
                    <div class="form-content">
                        <form action="change_password_process.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Previous Password</label>
                                <div style="width: 50px; height: 3px; background:#204a84; margin-bottom: 15px;"></div>
                                <input type="text" class="form-control" id="" placeholder="Enter Passowrd recived form Admin" name="issuer_name">
                            </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">New Password</label>
                                <div style="width: 50px; height: 3px; background:#204a84; margin-bottom: 15px;"></div>
                                <input type="password" class="form-control" id="" placeholder="New Password" name="issuer_email">
                            </div> 
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <div class="form-group">
                                <label for="">Confirm Password</label>
                                <div style="width: 50px; height: 3px; background:#204a84; margin-bottom: 15px;"></div>
                                <input type="password" class="form-control" id="" placeholder="Confirm Password" name="issuer_password">
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
   <footer class="page-footer font-small blue">

  <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#"> VESIT</a>
  </div>
  <!-- Copyright -->

</footer>
    
 <script src="../../assets/js/jquery-3.2.1.min.js"></script>
 <script src="../../assets/js/bootstrap.min.js"></script>    
</body>
</html>