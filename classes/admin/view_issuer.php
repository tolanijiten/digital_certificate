<!DOCTYPE html>
<html>
<head>
   <title>View Issuer</title>
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="scripts/toastr.min.css">

   <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
   
        body{
	font-family: "Nunito Sans", sans-serif;
	
/*	background:#f8f8f8;*/
            
}
        
        td{
            color: rgb(33,37,41);
        }
/*        .table-responsive {height:580px;}*/
</style>
</head>

<body>
<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Vivekanad Education Society Institute of Technology</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link bit_nav" href="add_issuer.php"><i class="fa fa-user-plus"> Add </i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#"><i class="fa fa-eye">  View </i></a>
      </li>
      <li class="nav-item">
        <a class="logout btn bit_button" href="../login/logout.php" >Logout</a>
      </li>
    </ul>
  </div>
</nav>
   <section style="margin:100px; margin-bottom:0;">
   <div class="container-fluid" style="margin-top:90px;">
    
               <div class="container">
                   <div class="row">
                    <div class="table-responsive text-nowrap">
                     <table class="table table-striped table-hover table-bordered" id="details">
                    <thead style="color:#204a84;">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        
                    </thead>
                    
                    <?php
                        include_once('../../functions/db.php');
                        session_start();
                        
                        $query = "SELECT * FROM users WHERE deleted=0 AND role=1";
//                        $admin_id=$_SESSION['user_id'];
                        $admin_id=1;
                        $result = mysqli_query($connection,$query);
                        for($i=1; $i<=mysqli_num_rows($result); $i++){
                        $row = mysqli_fetch_assoc($result);
                        $user_id = $row['user_id'];
//                        echo $user_id;
                        $username = $row['user_name'];
                        $email_id = $row['email_id'];
                        $plain = openssl_decrypt($row['password'], "AES-128-ECB", 'digicert'); 

//                        echo mysqli_num_rows($result);
                    ?>              

                    <tbody id="myTable">
                   <tr>
                       <td><?php echo $username; ?></td>
                       <td><?php echo $email_id; ?></td>
                       <td><?php echo $plain; ?></td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><a href="delete.php?user_id=<?php echo $user_id?>" class='btn btn-danger open-delete-modal' data-toggle='modal' data-target='#deleteModal' id='<?php echo $user_id; ?>' data-vendor='<?php $user_id ?>'  ><i class='fa fa-trash'></i></a></td>
  
                   </tr>
                   <!--Edit Button Modal -->
                 
<!--DELETE BUTTON MODAL-->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <form action="delete.php" method="POST" enctype="" style="width:100%">
                            <div class="form-body">
                                <div class="form-group clearfix">

                                    <div class="col-md-12">
                                        <p style="font-size:20px;">Do you really want to delete the record?</p>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <input type="hidden" id="stud_form_delete_id" name='stud_form_delete_id'>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="modal-footer">
                                   
                                    <button href="delete.php?user_id=stud_form_delete_id"  id="" type="submit" class="btn btn-danger" name="deleteBtn"><i class="fa fa-trash"></i> Yes</button>
<!--                                    <button id="" type="submit" class="btn btn-primary" data-dismiss="modal"> No</button>-->
                                    
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
                            <!--END OF DELETE BUTTON MODAL-->                  
                   <?php
                        }
                         ?>
<!--
                   <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                       <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
                        <tr>
                       <td>Sanjay Janyani</td>
                       <td>snajay@gmail.com</td>
                       <td>qwert</td>
                       <td><i class="fa fa-edit"></i></td>
                       <td><i class="fa fa-trash-alt"></i></td>
                   </tr>
-->
                        
                    </tbody>
                </table>
                  </div>
                   <div class="col-md-12">
                      <ul class="pagination justify-content-end" id="myPager" style="margin-bottom:0;"></ul>
                    </div>
                   </div><!--Table row-->
            </div><!--tablecontainer--> 

        
        <!--row-->
    </div>
   </section>
    
 <script src="../../assets/js/jquery-3.2.1.min.js"></script>
 <script src="../../assets/js/bootstrap.min.js"></script>
 <script src="scripts/toastr.min.js"></script>
<!--
 <script src="scripts/manage-issuer.js" type="text/javascript"></script>
 <script src="scripts/datatable.js" type="text/javascript"></script>
 <script src="scripts/datatables.min.js" type="text/javascript"></script>
-->

 <script> 
$(document).ready(function() {
   $(".open-delete-modal").click(function() {
    
     $("#deleteModal").modal("show");
  }),

    $(".open-delete-modal").click(function() {
        $stud_id = $(this).attr('id');
//        window.alert($stud_id);  

     $("#stud_form_delete_id").val($stud_id);
       
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
    
});
     
     
     
     
     <?php
if(isset($_SESSION['delete_user'])){
    ?>
toastr["error"]("You Have Successfully Deleted", "User Deleted");

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
    unset($_SESSION['delete_user']);
}
    ?>

     
     <?php
if(isset($_SESSION['add_user'])){
    ?>
toastr["success"]("You Have Successfully Added User", "User Added");

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
    unset($_SESSION['add_user']);
}
    ?>

     
          <?php
if(isset($_SESSION['user_id'])){
    ?>
toastr["success"]("You Have Successfully Logged In", "Admin");

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
    unset($_SESSION['user_id']);
}
    ?>

</script>
    
</body>
</html>