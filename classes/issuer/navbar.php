<?php
require_once('../../functions/db.php');
session_start();
$user_id=$_SESSION['user_id'];

$query="select * from users where user_id=$user_id";
$result=mysqli_query($connection,$query);
$result_set=mysqli_fetch_assoc($result);
$user_name=$result_set['user_name'];
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
 <img src="../../assets/images/ves_logo.png" height="40px;" style="margin-right:20px;">
  <a class="navbar-brand" href="#">Vivekanad Education Society Institute of Technology</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-auto my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link bit_nav" href="select_template.php">New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="view_history.php">Records</a>
      </li>
      <li class="nav-item">
        <a class="nav-link bit_nav" href="#">Instructions</a>
      </li>
<!--
      <li class="nav-item">
        <a class="logout btn bit_button" href="../login/logout.php" >Logout</a>
        
      </li>
-->
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
<?php 
          echo $user_name;
          ?>
        </a>
      <div class="dropdown-menu">
        <a class="logout btn bit_button" href="../login/logout.php" >Logout</a>
<!--
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
-->
      </div>
    </li>
    </ul>
   
  </div>
   
</nav>