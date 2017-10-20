<?php
session_start();
$page_title = 'register';
include 'includes/header.php';
include 'includes/functions.php';
if(isset($_SESSION['error_message'])){
  //display_message();
  echo "<h1>" .  $_SESSION['message'] . "</h1>";
}
 ?>

 <div class="container-fluid">
   <div class="row">
     <div class="col-md-9">
           <div class="content-box">
             <h1>Register</h1>
             <?php if(isset($_SESSION['error_message'])){

              echo "<h3 class='alert-danger'>" . $_SESSION['error_message'] . "</h3>";
              session_unset();
              session_destroy();
             }

              ?>
             <form action="confirm_email.php" method="post" id="login-form">
               <ul>
                 <li><label for="username">Username</li>
                 <li><input type="text" id="username" name="username"/></li>
                 <li><label for="password">Password</li>
                 <li><input type="password" id="password" name="password"/></li>
                 <li><label for="password2">Confirm Password</li>
                 <li><input type="password" id="password" name="password2"/></li>
                 <li><button type="submit" class="btn btn-default">submit</button></li>
              </ul>
             </form>
             <p><?php //session_unset();
             //session_destroy(); ?></p>
           </div><!-- End Content-Box -->
     </div>
  </div>
</div>
