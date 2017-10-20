<?php session_start();
$page_title='Contact';

$contact_name = '';
include 'includes/config.php';
//include 'includes/functions.php';

if(count($_POST) > 0){
  $_SESSION['contact_name'] = validate_input($_POST['name']);
  $_SESSION['message'] = validate_input($_POST['message']);
  $_SESSION['submitValues'] = $_POST['submitValues'];

    if(validate_email($_POST['email'])){
      $_SESSION['email'] = validate_input($_POST['email']);
      header("HTTP/1.1 303 See Other");
      header("Location: http://$_SERVER[HTTP_HOST]/julie-hodgson/contact.php");
      die();
    } else {
    $_SESSION['bad_email'] = 'TRUE';
    header("HTTP/1.1 303 See Other");
    header("Location: http://$_SERVER[HTTP_HOST]/julie-hodgson/contact.php");
    die();
  }
} else if(isset($_SESSION['contact_name'])){
  $contact_name = $_SESSION['contact_name'];
  $contact_email = $_SESSION['email'];
  $contact_message = $_SESSION['message'];

  // Database Code
  input_contact_form($contact_name, $contact_email, $contact_message);

  session_unset();
  session_destroy();
}
include 'includes/header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-9">
              <div class="content-box">
                   <div class="post-title">
                     <p>You can use the form below to contact me.
                     You can also <a href="#">email</a>. Please feel free to
                     contact me with any comments I would love to hear from you.</p>
                   </div>
                    <div class="lead" id="contact">
                      <div>
                        <p id="errors" <?php if($contact_name && $contact_email != '')
                                 {
                                   echo "class='alert-success contact'";
                                 }
                                 else if($contact_name && $contact_email == '')
                                 {
                                   echo "class='alert-danger contact'";
                                 }
                                  ?> >
                            <?php  if($contact_name && $contact_email != ''){
                                   echo "Thanks " . $contact_name . " for sending a message.";
                                   }
                                   else if($contact_name && $contact_emai == '')
                                   {
                                     echo "Please enter a valid email.";

                                   }
                                   ?>
                        </p>
                      </div>
                        <form action="contact.php" method="post">
                        <?php if (!$contact_name || $contact_email == '')
                         {
                          echo '<ul>';
                          echo '<li><label for="name" id="name-label">Name: </label></li>';
                          echo '<li><input type="text" name="name" id="name" value="" class="form-control" style="text-transform: capitalize;" placeholder="Enter your name here"/></li>';
                          echo '<li><label for="email">Email:</label></li>';
                          echo '<li><input type="text" name="email" id="email" value="" class="form-control" placeholder="Email"/></li>';
                          echo '<li><label for="message">Message</label></li>';
                          echo '<li><textarea name="message" id="message" value="" class="form-control" placeholder="A message"></textarea></li>';
                          echo '<li><button type="submit" class="btn btn-default" id="submit">Send</button></li>';
                          echo '<li><input type="hidden" name="submitValues" value="Check"></li>';
                          echo '</ul>';
                          }
                        ?>
                       </form>
                       <?php //show_messages(); ?>
                    </div><!-- End Contact -->
              </div><!-- End Content-Box -->
        </div>
        <div class="col-md-2">
        </div>
      </div><!-- End row -->
    </div><!-- End Container -->
    <?php include 'includes/footer.php'  ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
