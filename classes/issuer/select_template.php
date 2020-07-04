<?php
require_once('../../functions/db.php');
session_start();
//echo $_SESSION['user_id'];
if(isset($_SESSION['user_id'])){

?>
<!DOCTYPE html>
<html>

<head>
    <title>Select  Template</title>
    <link rel="icon" href="../../assets/images/ves_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <!-- Start WOWSlider.com HEAD section -->
    <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/engine2/style.css" />
    <script type="text/javascript" src="../../assets/vendor/engine2/jquery.js"></script>
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- End WOWSlider.com HEAD section -->
    <style>
        /* Tabs*/

		section {
			padding: 60px 0;
		}

		section .section-title {
			text-align: center;

			margin-bottom: 50px;
			text-transform: uppercase;
		}

		#tabs {

			color: #337ab7;
		}

		#tabs h6.section-title {
			color: #337ab7;
		}

		#tabs .nav-tabs .nav-item.show .nav-link,
		.nav-tabs .nav-link.active {
			color: #337ab7;
			background-color: transparent;
			border-color: transparent transparent #337ab7;
			border-bottom: 4px solid !important;
			font-size: 20px;
			font-weight: bold;
		}

		#tabs .nav-tabs .nav-link {
			border: 1px solid transparent;
			border-top-left-radius: .25rem;
			border-top-right-radius: .25rem;
			color: #337ab7;
			font-size: 20px;
		}

		footer {
			background-color: #313e50;
			padding-top: 30px;
			border-top: 5px solid rgba(0, 0, 0, 0.1);
		}

		footer p {
			font-size: 16px;
			font-weight: 300;
		}

		.contact-left h3,
		.contact-right h3 {
			color: #fff;
			font-size: 28px;
			font-weight: 700;
		}



		.contact-left p {
			color: #fff;
			margin-bottom: 30px;
		}


		.contact-info {
			background: url("../../assets/images/world-map.png") no-repeat;
			background-size: contain;
		}

		address {
			color: #fff;
		}

		address strong,
		phone-fax-email strong {
			font-size: 16px;
			letter-spacing: 1px;
		}

		.form-control {
			background-color: transparent;
			border-radius: 0;
			color: #fff;
			font-size: 16px;
			font-weight: 300;
			border-color: #fff;
			margin-bottom: 20px;
			padding: 8px 15px;
		}

		.btn-general {
			border: solid 2px #fff;
			border-radius: 0;
			padding: 12px 26px;
			text-transform: uppercase;
			/*    font-weight: bold;*/
		}

		.btn-white {
			color: #fff;
			border-color: #fff;
		}

		.btn-white:hover,
		.btn-white:focus {
			background: #fff;
			color: #313e50;
		}

		/*Image Hovering*/

		.image-hovering {
			position: relative;
			display: inline-block;
			border-radius: 50px;
            height:214px;
            width:384px;
            margin-top:30px;

		}

		.image-hovering .hover {
			position: absolute;
			bottom: 20px;
			margin: 0;
			color: #313e50;
			text-align: center;
			background: #313e50;
			background: rgba(206, 229, 242, 0.8);
			width: 350px;
			height: 192px;
			line-height: 170px;
			padding: 15px;
			box-sizing: border-box;
			display: none;
			text-decoration: none;

		}

		.image-hovering:hover .hover {
			display: block;
		}
        .image-hovering img{
            width:350px; 
            height:195px;
        }
        .image-hovering a{
            width:90px;
            height:40px;
            border:2px solid #313e50; 
            background-color:rgba(206,229,242,0.5);
            letter-spacing:3px;
        }
        @media(min-width: 992px) and (max-width: 1199px){
            .image-hovering{
                height:180px;
                width:300px;
                margin-top:30px; 
            }
            .image-hovering .hover {
                 width:266px; 
                height:158px;
                line-height: 150px;
                padding: 5px;
            }
            .image-hovering img{
                width:266px; 
                height:161px;
            }
        }
        @media(min-width: 768px) and (max-width: 991px){
            .image-hovering{
                height:150px;
                width:200px;
                margin-top:30px; 
            }
            .image-hovering .hover {
                 width:196px; 
                height:148px;
                line-height: 140px;
                padding: 5px;
                bottom: 2px;
            }
            .image-hovering img{
                width:196px; 
                height:151px;
            }
        }
        @media(max-width: 767px){
            .image-hovering{
                height:150px;
                width:150px;
                margin-top:30px; 
            }
            .image-hovering .hover {
                 width:146px; 
                height:148px;
                line-height: 140px;
                padding: 5px;
                bottom: 0;
            }
            .image-hovering img{
                width:146px; 
                height:151px;
            }
        }

	</style>

</head>

<body style="margin:0;background-color:#f9f9f9">
    <?php 
    require_once("navbar.php"); 
?>
    <div class="container-fluid" style="margin-top:40px;color:#337ab7;">
        <section id="tabs" style="">
            <div class="container">
                <div class="form-title">
                    <div class="category-heading text-center">
                        <h3 class="text-heading" style="font-size: 30px; color:rgb(33, 37, 41);">Select Template</h3>
                        <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto;"></div>
                    </div>
                    <!--End of category-heading-->
                </div>
                <!--End of form-title-->

                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background-color:#f9f9f9; margin-top:50px;">
                                <a class="nav-item nav-link active" id="nav-nptel-tab" data-toggle="tab" href="#nav-nptel" role="tab" aria-controls="nav-nptel" aria-selected="true" style="color:#337ab7;">NPTEL</a>
                                <a class="nav-item nav-link" id="nav-academics-tab" data-toggle="tab" href="#nav-academics" role="tab" aria-controls="nav-academics" aria-selected="false" style="color:#337ab7">Academic</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-nptel" role="tabpanel" aria-labelledby="nav-nptel-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-2 image-hovering" style="">
                                            <img src="../../assets/images/certificate_templates/nptel_certi.JPG" alt="">
                                            <div class="hover animated zoomIn">
                                                <a class="btn" href="generation_form.php?template_id=nptel_certi">View</a>
                                            </div>
                                            <!--Animation end-->
                                        </div>
                                        <!--col-md-4 end-->
                                    </div>
                                    <!--row end-->
                                </div>
                                <!--container fluid end-->
                            </div>
                            <!--nav-nptel-tab-end-->
                            <div class="tab-pane fade" id="nav-academics" role="tabpanel" aria-labelledby="nav-academics-tab">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-md-4 col-sm-4 image-hovering">
                                            <img src="../../assets/images/certificate_templates/vesit_certi.JPG" alt="">
                                            <div class="hover animated zoomIn">
                                                <a class="btn" href="generation_form.php?template_id=vesit_certi">View</a>
                                            </div>
                                            <!--Animation end-->
                                        </div>
                                        <!--col-md-4 end-->
                                    </div>
                                    <!--row end-->
                                </div>
                                <!--container fluid end-->
                            </div>
                            <!--nav-academics-tab-end-->
                        </div>
                        <!--nav-tabContent end-->
                    </div>
                    <!--col-md-12 end-->
                </div>
                <!--row end-->
            </div>
            <!--container end-->
        </section>
        <!--section end-->
    </div>
    <!--container fluid end-->
    <!--Footer-->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="contact-left">
                        <h3>DigiCerts</h3>
                        <p>A place to </p>
                        <div class="contact-info">
                            <address>
                                <strong>Headquaters:</strong>
                                <p>313, Evergreen CHS.<br>
                                    Airoli Sector 15,<br>
                                    New Bombay,<br>
                                    Mumbai - 55.
                                </p>
                            </address>
                            <div class="phone-fax-email">
                                <p>
                                    <strong>Phone:</strong> <span>(719)-778-8804</span>
                                    <br />
                                    <strong>Fax:</strong> <span>(719)-778-8804 8890</span>
                                    <br />
                                    <strong>Email:</strong> <span>info@whitegrapphics.in</span>
                                    <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-right">
                        <h3>Contact Us</h3>
                        <form action="#">
                            <input type="text" name="full-name" placeholder="Full Name" class="form-control">
                            <input type="email" name="email" placeholder="Email Address" class="form-control">
                            <textarea name="message" rows="3" placeholder="Your Message..." class="form-control"></textarea>

                            <div class="send-btn">
                                <a href="#" class="btn btn-lg btn-general btn-white" role="button">Send</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="../../assets/vendor/engine2/wowslider.js"></script>
    <script type="text/javascript" src="../../assets/vendor/engine2/script.js"></script>
    <!-- End WOWSlider.com BODY section -->

</body>

</html>
<?php
}
else{
    header("Location: ../login/login.php");
}

?>