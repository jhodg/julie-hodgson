<?php
$page_title = 'sign up';
include 'includes/header.php';
include 'includes/functions.php';

if(count($_POST) > 0){
  sign_up_user();
}
 ?>

 <div class="container-fluid">
   <div class="row">
     <div class="col-md-9">
           <div class="content-box">
             <h1>Sign Up</h1>
             <form action="signup.php" method="post" id="login-form">
               <ul>
                 <li><label for="username">Username</li>
                 <li><input type="text" id="username" name="username"/></li>
                 <li><label for="username">Email</li>
                 <li><input type="text" id="email" name="email"/></li>
                 <li><label for="password">Password</li>
                 <li><input type="password" id="password" name="password"/></li>
                 <li><button type="submit" class="btn btn-default">submit</button></li>
              </ul>
             </form>
             <p><?php  ?></p>
           </div><!-- End Content-Box -->
     </div>
  </div>
</div>
