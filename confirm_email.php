<?php
session_start();
ob_start();
$page_title = 'confirm email';
include 'includes/header.php';
include 'includes/functions.php';
 ?>

 <div class="container-fluid">
   <div class="row">
     <div class="col-md-9">
           <div class="content-box">
             <h1>Email Confimation</h1>

             <p><?php confirm_email(); ?></p>
             <p></p>
           </div><!-- End Content-Box -->
     </div>
   </div>
   </div>
