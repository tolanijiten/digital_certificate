<!DOCTYPE html>
<html>
<head>
   <title>Add Issuer</title>
   <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

	<link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
        <a class="nav-link bit_nav" href="#"><i class="fa fa-user-plus">Add Issuer</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#"><i class="fa fa-eye">View</i></a>
      </li>
      <li class="nav-item">
        <a class="logout btn bit_button" href="../classes/login/login.php" >Logout</a>
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
                        $row = mysqli_fetch_assoc($result);
//                        print_r($row);
                        
//                        echo $plain;
                        for($i=1;$i<mysqli_num_rows($result);$i++){
                        $row = mysqli_fetch_assoc($result);
                        $user_id = $row['user_id'];
                        echo $user_id;
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
                       <td><a href="delete.php?user_id=<?php echo $user_id?>"><i class="fa fa-trash-alt"></i></a></td>
                   </tr>
                   <!--Edit Button Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        Edit UserName : <input type="text" value=""><br><br>
        Edit Email : <input type="text" value=""><br><br>
        Edit Password : <input type="text">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                  
<!--DELETE BUTTON MODAL-->
                            <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
<!--                                    <h5 class="modal-title">Modal title</h5>-->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Delete??</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure, you want to delete this entry?</p>
                                  </div>
                                  <div class="modal-footer">
                                   <form action="http://localhost/ecertificate/classes/admin/delete.php?user_id=<?php echo $user_id; ?>" method="GET">
                                        <button type="submit" class="btn red" name="deleteBtn">Yes</button>
                                        <button type="button" class="btn blue" data-dismiss="modal">No</button>
                                   </form>
                                    
                                  </div>
                                </div>
                              </div>
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
<!--
 <script src="scripts/manage-issuer.js" type="text/javascript"></script>
 <script src="scripts/datatable.js" type="text/javascript"></script>
 <script src="scripts/datatables.min.js" type="text/javascript"></script>
-->
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