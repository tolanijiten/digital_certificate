<!doctype html>
<?php 
//session_start();
//$user_id=$_SESSION['user_id'];
//echo $user_id;
//exit;
?> 
<html lang="en">

<head>
<title>VES E-Certificate</title>
<link rel = "icon" href =  "assets/images/ves_logo.png" type = "image/x-icon">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/workflow.css">
	<link rel="stylesheet" href="assets/vendor/animate/animate.css">
	<link rel="stylesheet" href="assets/vendor/OwlCarousel2-develop/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/engine2/style.css" />
	<script type="text/javascript" src="assets/vendor/engine2/jquery.js"></script>



	<style>
		footer {
			background-color: #337ab7;
			padding-top: 30px;
			border-top: 5px solid rgba(0, 0, 0, 0.1);
        color: #fff;
		}
    .about{
        background: url("assets/images/world-map.png") no-repeat center;
        background-size: contain;
    }

    .about p{
        color: #fff;
			font-size: 16px;
			font-weight: 300;
		}
    .about h3{
        color: #fff;
			font-size: 28px;
			font-weight: 700;
        margin-bottom: 20px;
    }
    .pipe p{
        font-size: 30px;
        margin: 0;
        font-weight: 100;
    }
    .footer-copyright{
        background-color:#337ab7;
        height: 40px;
        padding-top: 10px;
    }
    .footer-copyright a{
    color: #fff;
    font-weight: 100;
}
.footer-copyright a:hover{
    text-decoration: underline;
    color: #fff;
    font-weight: 100;
}
		
	</style>
</head>

<body style="background-color:#f9f9f9">
	<!--Navbar-->
	<h1 class="typing"></h1>
<!--
	<nav class="navbar fixed-top navbar-light bg-light" style="font-size:16px;">
		<ul class="nav justify-content-left">
			<li class="nav-item">
				<a class="nav-link active bit_nav bit_nav1" href="#" style="color:#337ab7 ">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active bit_nav" href="#workflow" style="color:#337ab7 ">How it Works</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active bit_nav" href="#features" style="color:#337ab7 ">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active bit_nav" href="#clients" style="color:#337ab7 ">Organizations</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active bit_nav" href="#contact" style="color:#337ab7 ">Contact</a>
			</li>
			<li class="nav-item ">
				<a class="logout btn bit_button" href="classes/login/login.php" style="color:#fff;background-color:#337ab7; margin-top:5px;">Login</a>
			</li>


		</ul>
	</nav>
-->
	<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
	<img src="assets/images/ves_logo.png" style="margin-right:20px; height:40px;">
  <a class="navbar-brand" href="#">Vivekanad Education Society Institute of Technology</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#workflow">How it works</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#features">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#about">About Us</a>
      </li>
      <li class="nav-item">
        <a class="logout btn bit_button" href="classes/login/login.php" >Login</a>
      </li>
<!--
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
-->
    </ul>
<!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
-->
  </div>
</nav>

	<!--Section 1 -->



	<div class="container-fluid" style="margin-top:60px;background-color:#337ab7;">
		<div class="row">
			<div class="col-md-6 " data-tilt>
				<img src="assets/images/2.png" alt="">
			</div>
			<div class="col-md-5 type">
				<h2 style="color:#fff;padding-bottom:10px;letter-spacing:3px;"><i>VES E-Certificate Generation!</i></h2>
				<p style="text-align:justify;color:#fff;font-size:18px;">As it has been observed that the forgery of the the certificates has been increasing gradually.Also, a lot of paper is been wasted for generating hard copies of certificates. This issue can be solved by creating digital certificates i.e. e-certificates. The digital certificates can be generated with a QR-code on certificate using the blockchain technology. Currently, there are multiple numbers of ways through which one can verify the existence of a certificates an individual has on theblockchain. The easiest of them isto upload/scan the certificates to verify its existence. Upon uploading of the certificates,the proof of its existence gets verified, as the cryptographic digest and the marker for the transaction are also verified.</p>
				<a href="classes/login/login.php"><button class="btn generate" style="width:180px;height:60px;border:2px solid #fff;color:#fff;background-color:#337ab7;margin-left:200px;margin-top:30px;padding:15px;font-size:20px">Generate Now !</button></a>

			</div>

		</div>
	</div>



	<!--TimeLine-->


	<!-- ***** Workflow Area Start ***** -->
	<section class="mosh-workflow-area section_padding_100_0 clearfix" id="workflow">

		<div class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

			<h2 style="color:rgb(33, 37, 41);letter-spacing:3px;text-align:center;"> How Does It Work</h2>
			<div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
		</div>
		<div class="workflow-img">
			<img src="assets/images/work-progress.png" alt="">
		</div>

		<div class="workflow-slides-area">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="mosh-workflow-slides owl-carousel">
							<!-- Single Service Area -->
							<div class="single-workflow-area d-flex">
								<h2>1.</h2>
								<div class="workflow-content ml-15">
									<h4>This is the first step</h4>
									<p> Schools grant a degree certificate and enter the student’s data into the system. Next, the system automatically records the serial number of the student in a blockchain. </p>
								</div>
							</div>
							<!-- Single Service Area -->
							<div class="single-workflow-area d-flex">
								<h2>2.</h2>
								<div class="workflow-content ml-15">
									<h4>This is the second step</h4>
									<p>The certificate system verifies all the data. </p>
								</div>
							</div>
							<!-- Single Service Area -->
							<div class="single-workflow-area d-flex">
								<h2>3.</h2>
								<div class="workflow-content ml-15">
									<h4>This is the third step</h4>
									<p> Instead of sending conventional hard copies, schools grant e-certificates containing a quick response (QR) code to the graduates whose data have been successfully verified. Each graduate also receives an inquiry number and electronic file of their certificate.  </p>
								</div>
							</div>
							<!-- Single Service Area -->
							<div class="single-workflow-area d-flex">
								<h2>4.</h2>
								<div class="workflow-content ml-15">
									<h4>This is the fourth step</h4>
									<p>When applying for a job, a graduate simply sends the serial number or e-certificate with a QR code to the target companies.</p>
								</div>
							</div>
							<!-- Single Service Area -->
							<div class="single-workflow-area d-flex">
								<h2>5.</h2>
								<div class="workflow-content ml-15">
									<h4>This is the fifth step</h4>
									<p> The companies send inquiries to the system and are informed if the serial numbers are validated. The QR code enables them to recognize if the certificate has been tampered with or forged. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
	
	<div id="wowslider-container2" style="margin-top:20px;">
		<div class="ws_images">
			<ul>
				<li><img src="assets/vendor/data2/images/group_1.png" alt="Group 1" id="wows1_0" /></li>
				<li><img src="assets/vendor/data2/images/group_2.png" alt="javascript slider" id="wows1_1" /></li>
				<li><img src="assets/vendor/data2/images/group_3.png" alt="Group 3" id="wows1_2" /></li>
			</ul>
		</div>

	</div>
	
	
	
	
	
	<!-- ***** Services Area Start ***** -->
	<div class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" id="features">
		<h2 style="color:rgb(33, 37, 41);letter-spacing:3px;text-align:center;">Features</h2>
		<div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
	</div>

	<section class="mosh--services-area section_padding_100">


		<div class="container">
			<div class="row">
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic1.png" alt="">
						</div>
						<div class="feature-content">
							<h4>Efficient</h4>
							<p>As this avoid hardcopies hence its is efficient.</p>
						</div>
					</div>
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic2.png" alt="">
						</div>
						<div class="feature-content">
							<h4> Tamper proof </h4>
							<p> This system reduces the likelihood of the forgery.</p>
						</div>
					</div>
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic3.png" alt="">
						</div>
						<div class="feature-content">
							<h4>Highly Secure</h4>
							<p> Assures information accuracy and security.</p>
						</div>
					</div>
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic4.png" alt="">
						</div>
						<div class="feature-content">
							<h4>Transparent</h4>
							<p>The granting of certificate is transparent</p>
						</div>
					</div>
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic5.png" alt="">
						</div>
						<div class="feature-content">
							<h4>No Intermediaries</h4>
							<p>No involvement of third parties.</p>
						</div>
					</div>
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="single-feature-area d-flex mb-100">
						<div class="feature-icon mr-30">
							<img src="assets/images/ic1.png" alt="">
						</div>
						<div class="feature-content">
							<h4>Trustworthy</h4>
							<p>The certificates generated are 
                                trusted.</p>
						</div>
					</div>
				</div>



			</div>

		</div>
	</section>
	<!-- ***** Clients Area Start ***** -->
<!--
	<section class="mosh-clients-area section_padding_100 clearfix" style="background:#fff" id="clients">
		<div class="container">
			<div class="row">
				<div class="col-12 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">

					<h2 style="color:#337ab7;letter-spacing:3px;text-align:center;">Organizations</h2>
					<div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>

				</div>
				<div class="col-12">
					<div class="clients-logo-area d-sm-flex align-items-center justify-content-between">
						<a href="#"><img src="assets/images/clients-img/1.jpg" alt=""></a>
						<a href="#"><img src="assets/images/clients-img/2.jpg" alt=""></a>
						<a href="#"><img src="assets/images/clients-img/3.jpg" alt=""></a>
						<a href="#"><img src="assets/images/clients-img/4.jpg" alt=""></a>
						<a href="#"><img src="assets/images/clients-img/5.jpg" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</section>
-->
	<!-- ***** Clients Area End ***** -->

	<!--Footer-->
	
	<footer id="about">
	<div class="text-center about">
	    <h3>E-Certificate Generator</h3>
	    <p>Developed by: <br> Mrs. Pooja Shetty <br>and</p>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-3">
	                <p>Sanjay Janyani <br> Student </p>
	            </div>
	            <div class="col-md-1 pipe">
	                <p>|</p>
	            </div>
	            <div class="col-md-4">
	                <p>Jiten Tolani <br> Student </p>
	            </div>
               <div class="col-md-1 pipe">
	                <p>|</p>
	            </div>
                <div class="col-md-3">
	                <p>Latika Gurnani <br> Student </p>
	            </div>
	            
	        </div>
	    </div>
	</div>
	<div class="footer-copyright text-center">© 2020 Copyright:
            <a href="#">VESIT</a>
    </div>
	</footer>






	<!--Scripts-->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/vendor/OwlCarousel2-develop/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/vendor/engine2/wowslider.js"></script>
	<script type="text/javascript" src="assets/vendor/engine2/script.js"></script>
	<script src="assets/vendor/timeline/js/main.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script src="assets/vendor/wow/wow.min.js"></script>
	<script>
		$(function() {
			new WOW().init();
		});

	</script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})

	</script>
	<script>
		$(function() {
			$(document).ready(function() {
				$(".owl-carousel").owlCarousel();
			});

			$(".mosh-workflow-slides").owlCarousel({
				items: 3,
				loop: true,
				autoplay: true,
				smartSpeed: 800,
				margin: 30,
				center: true,
				dots: true,
				startPosition: 1,
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 2
					},
					768: {
						items: 3
					}
				}
			});

		});

	</script>





</body>

</html>
