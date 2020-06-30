<?php
session_start();
require_once("../../functions/db.php");
$user_id = $_SESSION['user_id'];
//     $query="Select * from generation where user_id = $user_id";
//     $result = mysqli_query($connection , $query);
//     $row = mysqli_fetch_assoc($result);
//    while($row){
//        $commitee_name = $row['commitee_name'];
//        $template_id=$row['template_id'];
//        $generation_id = $row['generation_id'];
//        $query2 = "select * from $commitee_name";
//        $result2 = mysqli_query($connection , $query2);
//        $row2 = mysqli_num_rows($result2);
//    }

 
?>



<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <style>
        body {
            font-family: "Nunito Sans", sans-serif;

            /*	background:#f8f8f8;*/
        }

        .hist_card {
            margin-bottom: 40px;
        }

        /*
        .card-body a{
            margin-right: 20px;
        }
*/
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            cursor: pointer;
        }

    </style>
</head>

<body>
    <?php
    require_once("navbar.php");
    ?>
    <section style="margin:100px;">
        <div class="container">
            <div class="category-heading text-center">
                <h3 class="text-heading" style="font-size: 30px;">History</h3>
                <div style="width: 50px; height: 3px; background:#204a84; margin: 0 auto 30px;"></div>
            </div>
            <!--End of category-heading-->
            <div class="row">
                <?php
                //echo $user_id;
                $query="Select * from generation where issued_by = 1";
                $result = mysqli_query($connection , $query);
                while($row = mysqli_fetch_assoc($result)){
                    $commitee_name = $row['commitee_name'];
                    $template_id=$row['template_id'];
                    $generation_id = $row['generation_id'];
                    $query2 = "select * from $commitee_name";
                    $result2 = mysqli_query($connection , $query2);
                    $row2 = mysqli_num_rows($result2);
                ?>
                <div class="col-md-4 hist_card">
                    <div class="card border-info mb-3 bg-light" style="max-width: 18rem;">
                        <img class="card-img-top" src="../../assets/images/certificate_templates/<?php echo $template_id;?>.JPG" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $commitee_name;?></h5>
                            <p class="card-text">No of Certificates : <?php echo $row2;?></p>
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <a href="view_detail_history.php?generation_id=<?php echo $generation_id;?>" class="btn btn-primary"><i class="fa fa-eye"> View</i></a>
                                </div>
                                <div class="col-md-6 ">
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-alt"> Delete</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <!--End of col-md-4-->

            </div>
            <!--End of row-->





        </div>
    </section>
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>
