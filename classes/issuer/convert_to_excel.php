<?php
require_once("../../functions/db.php");
session_start();
$generation_id=$_GET['generation_id'];
function display_students(){
    global $connection;
     $generation_id = $_GET['generation_id'];
     $query="Select * from generation where generation_id = $generation_id";
     $result = mysqli_query($connection , $query);
     $row = mysqli_fetch_array($result);
     $commitee_name = $row['commitee_name'];
     $template_id=$row['template_id'];
//     $organisation_id = $row['organisation_id'];
    // $query1="Select * from organisation where organisation_id = $organisation_id";
    // $result1 = mysqli_query($connection, $query1);
    // $row1 =mysqli_fetch_array($result1);
    // $organisation_name = $row1['organisation_name'];
    // $organisation_name = strtolower($organisation_name);
//    $commitee_name = 'csi';
//    $organisation_name = 'rait';
     $query2 = "select * from $commitee_name ";
    //echo $query2
    $result2 = mysqli_query($connection , $query2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $student_name = $row2['student_name'];
        $class = $row2['class'];
        $rank = $row2['rank'];
        $field= $row2['field'];
        $email=$row2['email'];

        echo"<tr>";
        echo"<td>{$student_name}</td>";
        echo"<td>{$class}</td>";
        echo"<td>{$rank}</td>";
        echo"<td>{$field}</td>";
        echo"<td>{$email}</td>";

        echo"</tr>";
    }
}

?>
<html>
   <head>
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <style>
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
}
	.nav-item .logout:hover{
		background: #fff;
		border: 1px solid #b0413e;
		color: #b0413e;
	}

</style>
</head>

<body>

    <nav class="navbar-light bg-light" style="padding:20px;font-size:16px;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="requests.php" style="color:#B0413E ">Home</a>
            </li>
            <li class="nav-item">
                <a class="logout btn" href="#" style="color:#fff;background-color:#b0413e; ">Logout</a>
            </li>


        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <?php
            
            ?>
            
            <div class="col-md-12" style=" height:89%;">
                <table class="table table-striped table-hover">
                    <thead style="color:#b0413e;">
                        <tr>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Rank</th>
                            <th>Field</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        display_students();
        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo 'export.php?generation_id='.$generation_id; ?>" class="btn btn-default" style="margin-bottom:50px; background-color: #b0413e; color: white;"> Export to EXCEL <i class="fa fa-check"></i></a>
                    </div>
                </div>
            </div>
            </div>
            <!--col-md-5-->
<!--
            <div class="col-md-7" style="background-color: #b0413e; padding: 20px;">
                <div>
                    <img src="../../assets/images/t2.png" alt="" style="height: 500px; width: 650px; padding: 30px; margin: 30px; margin-left: 100px;">
                </div>
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-default" style="width: 100px; background-color: white; color: #b0413e; font-size: 20px;  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" data-toggle='modal' data-target='#verifyModal'> Verify <i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
-->

        </div>
        <!--row-->
<!--    </div>-->
    <!--container_fluid-->
   

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
</body>

</html>

