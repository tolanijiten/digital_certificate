<?php
require_once('../../functions/db.php');
session_start();
//$user_d

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
        <a class="nav-link bit_nav" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="logout btn bit_button" href="../login/logout.php" >Logout</a>
      </li>
    </ul>
  </div>
</nav>