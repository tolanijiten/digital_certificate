<?php
session_start();
require_once("../../functions/db.php");
if(isset($_SESSION['user_id'])){

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
<title>View Records</title>
    <link rel="icon" href="../../assets/images/ves_logo.png" type="image/x-icon">    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
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
                <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
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
//                    echo $query2;
                    $result2 = mysqli_query($connection , $query2);
                    $row2 = mysqli_num_rows($result2);
                ?>
                <div class="col-md-4 col-sm-4 hist_card">
                    <div class="card border-info mb-3 bg-light" style="max-width: 18rem;">
                        <img class="card-img-top" src="../../assets/images/certificate_templates/<?php echo $template_id;?>.JPG" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $commitee_name;?></h5>
                            <p class="card-text">No of Certificates : <?php echo $row2;?></p>
                            <div class="row">
                                <div class="col-md-6  col-sm-12 text-right">
                                    <a href="view_detail_history.php?generation_id=<?php echo $generation_id;?>" class="btn btn-primary"><i class="fa fa-eye"> View</i></a>
                                </div>
                                <div class="col-md-6  col-sm-12">
                                    <a href="#" class='btn btn-danger open-delete-modal' data-toggle='modal' data-target='#deleteModal' id='<?php echo $generation_id;?>' data-vendor=<?php echo $generation_id;?>><i class="fa fa-trash-alt"> Delete</i></a>
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
    <!--Delete Modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form action="delete_record.php" method="POST" enctype="" style="width:100%">
                            <div class="form-body">
                                <div class="form-group clearfix">

                                    <div class="col-md-12">
                                        <p style="font-size:20px;">Do you really want to delete the certificate?</p>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <input type="hidden" name="generation_id" id="certi_delete_id"> 
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button id="" type="submit" class="btn btn-danger" name="delete_certi"><i class="fa fa-trash"></i> Delete</button>
                                </div>

                            </div>
                        </form>
                    </div>


                </div>

            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script> 
$(document).ready(function() {
   $(".open-delete-modal").click(function() {
    
     $("#deleteModal").modal("show");
  }),

    $(".open-delete-modal").click(function() {
        $gen_id = $(this).attr('id');
        //window.alert($gen_id);  

     $("#certi_delete_id").val($gen_id);
       
  });
    
    
    
    
});
</script>
</body>

</html>
<?php
}
else{
    header("Location: ../login/login.php");
}

?>