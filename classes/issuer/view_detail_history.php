<?php
 require_once("../../functions/db.php");
session_start();
$generation_id=$_GET['generation_id'];
$user_id=$_SESSION['user_id'];
//exit;
$generation_id = $_GET['generation_id'];
     $query="Select * from generation where generation_id = $generation_id and issued_by=$user_id";
     $result = mysqli_query($connection , $query);
     $row = mysqli_fetch_array($result);
     $commitee_name = $row['commitee_name'];
if(isset($_SESSION['user_id'])){

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
     $query2 = "select * from $commitee_name";
    //echo $query2
    $result2 = mysqli_query($connection , $query2);
    while($row2 = mysqli_fetch_assoc($result2)){
        $student_id = $row2['student_id'];
        $student_name = $row2['student_name'];
        $year=$row2['year'];
        $department=$row2['department'];
        $class = $row2['class'];
        $rank = $row2['rank'];
        $field= $row2['field'];
        $score = $row2['score'];
        $link= $row2['link'];
        $email= $row2['email'];

        echo"<tr>";
        echo"<td>{$student_id}</td>";
        echo"<td>{$student_name}</td>";
        echo"<td>{$year}</td>";
        echo"<td>{$department}</td>";
        echo"<td>{$class}</td>";
        echo"<td>{$rank}</td>";
        echo"<td>{$field}</td>";
        echo"<td>{$score}</td>";
        echo"<td>{$email}</td>";
        echo"<td>{$link}</td>";

        echo"<td><a href='#' class='btn btn-info open-edit-modal' data-toggle='modal' data-target='#editModal' id='$student_id' name='$student_name' year='$year' department='$department' class_std='$class' rank='$rank' field='$field' score='$score' email='$email' link='$link' data-vendor=$student_id ><i class='fa fa-edit'></i></a></td>";
        
        echo"<td><a href='#' class='btn btn-danger open-delete-modal' data-toggle='modal' data-target='#deleteModal' id='$student_id' data-vendor=$student_id><i class='fa fa-trash'></i></a></td>";
        echo"</tr>";
    }
}

 
?>





<html>

<head>
   <title>View Records</title>
    <link rel="icon" href="../../assets/images/ves_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
}
        td{
            color: rgb(33,37,41);
        }
/*        .table-responsive {height:640px;}*/
        .generate{
            border:solid 1px #204a84; 
            background:#F8F9FA; 
            color: #337ab7; 
            font-size: 20px;  
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
            width: 75%; 
            margin:0; 
            position: absolute;
            left: 25%;
        }
        .generate:hover{
            background: #337ab7;
            color: #f8f9fa;
        }
</style>
</head>

<body>
    <?php
    require_once("navbar.php");
    ?>
    <section style="margin:50px;">
        <div class="container">
            <div class="category-heading text-center">
                <h3 class="text-heading" style="font-size: 30px;"><?php echo $commitee_name ?> </h3>
                <div style="width: 50px; height: 3px; background:#337ab7; margin: 0 auto 30px;"></div>
            </div>
    <div class="container-fluid" style="margin-top:59px;">
               <div class="container">
                   <div class="row">
                    <div class="table-responsive text-nowrap">
                     <table class="table table-striped table-hover table-bordered">
                    <thead style="color:#337ab7;">
                        <tr>
                           <th>Sr No.</th>
                            <th>Student Name</th>
                            <th>Year</th>
                            <th>Department</th>
                            <th>Class</th>
                            <th>Rank</th>
                            <th>Field</th>
                            <th>Score</th>
                            <th>Email</th>
                            <th>Unique Url</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        
                    </thead>
                    <tbody id="myTable">
                        <?php
        display_students();
        ?>
                   
                    </tbody>
                </table>
                  </div>  
                   <div class="col-md-12">
                      <ul class="pagination justify-content-end" id="myPager"></ul>
                    </div>
                   </div><!--Table row-->
                   
            </div><!--tablecontainer--> 
        <!--row-->
    </div>
    <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo 'export.php?generation_id='.$generation_id; ?>" class="btn btn-default" style="margin-bottom:50px; background-color: #337ab7; color: white;"> Export to EXCEL <i class="fa fa-check"></i></a>
                    </div>
                </div>
                
    <!--container_fluid-->
        </div>
    </section>
    <!--Verify Modal-->
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
                                        <p style="font-size:15px;">Are you sure you want to delete the record?</p>
                                    </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                       
                                        <lable></lable>
                                        <input type="hidden" name="student_id" id="stud_form_delete_id"> 
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="generation_id" id="generation_id" value="<?php echo $generation_id;?>"> 
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                    <button id="" type="submit" class="btn btn-danger" name="delete_record"><i class="fa fa-trash"></i> Delete</button>
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

   
   
   
   
   
   
<!--   Edit Modal-->
   
       <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form action="update_record.php" method="POST" enctype="" style="width:100%">
                            <div class="form-body">
                                <div class="form-group clearfix">

                                    <div class="col-md-12">
                                        <p style="font-size:20px;"></p>
                                    </div>
                                    
                                    <div class="form-group">
                                    <div class="col-md-12">
                                       
                                        <lable>Student ID</lable>
                                        <input class="form-control" type="text" name="student_id" id="stud_form_edit_id" readonly> 
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Student Name</lable>
                                        <input class="form-control" type="text" name="name" id="stud_form_name_id"> 
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Year</lable>
                                        <input class="form-control" type="text" name="year" id="stud_form_year_id"> 
                                       </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Department</lable>
                                        <input class="form-control" type="text" name="dept" id="stud_form_department_id"> 
                                       </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Class</lable>
                                        <input class="form-control" type="text" name="class" id="stud_form_class_id"> 
                                       </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Rank</lable>
                                        <input class="form-control" type="text" name="rank" id="stud_form_rank_id"> 
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Field</lable>
                                        <input class="form-control" type="text" name="field" id="stud_form_field_id"> 
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Score</lable>
                                        <input class="form-control" type="text" name="score" id="stud_form_score_id"> 
                                       </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="col-md-12">
                                       
                                        <lable>Email</lable>
                                        <input class="form-control" type="text" name="email" id="stud_form_email_id"> 
                                       </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <input type="hidden" name="generation_id" id="generation_id" value="<?php echo $generation_id;?>"> 
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                    <button id="" type="submit" class="btn btn-danger" name="update_record"><i class="fa fa-edit"></i> EDIT</button>
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
   
   
<!-----------------End of edit modal   -->
   
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
    <script> 
$(document).ready(function() {
   $(".open-delete-modal").click(function() {
    
     $("#deleteModal").modal("show");
  }),

    $(".open-delete-modal").click(function() {
        $stud_id = $(this).attr('id');
        //window.alert($stud_id);  

     $("#stud_form_delete_id").val($stud_id);
       
  });
    
    
    
    
});
</script>
   
   <script> 
$(document).ready(function() {
   $(".open-edit-modal").click(function() {
    
     $("#edit").modal("show");
  }),

    $(".open-edit-modal").click(function() {
        $stud_id = $(this).attr('id');
        $name = $(this).attr('name');
        $year=$(this).attr('year');
        $department=$(this).attr('department');
        $class = $(this).attr('class_std');
        $rank = $(this).attr('rank');
        $field= $(this).attr('field');
        $score=$(this).attr('score');
       $email=$(this).attr('email');
       $link= $(this).attr('link');
//        window.alert($email);  

     $("#stud_form_edit_id").val($stud_id);
     $("#stud_form_name_id").val($name);
     $("#stud_form_year_id").val($year);
     $("#stud_form_department_id").val($department);
     $("#stud_form_class_id").val($class);
     $("#stud_form_rank_id").val($rank);
     $("#stud_form_field_id").val($field);
     $("#stud_form_score_id").val($score);
     $("#stud_form_email_id").val($email);
   
       
  });
    
    
    
    
});
</script>
   
   
    <script>
    $.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.length;
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li class ="page-item"><a href="#" class="prev_link page-link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li class ="page-item"><a href="#" class="page_link page-link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li class ="page-item"><a href="#" class="next_link page-link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
      pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:10});
    
});</script>
</body>

</html>
<?php
}
else{
    header("Location: ../login/login.php");
}

?>
