<?php session_start();
$page_title='contact';


$contact_name = '';

if(count($_POST) > 0){
  $_SESSION['contact_name'] = $_POST['name'];

  header("HTTP/1.1 303 See Other");
  header("Location: http://$_SERVER[HTTP_HOST]/julie-hodgson/contact.php");
  die();
}
else if (isset($_SESSION['contact_name'])){
  $contact_name = $_SESSION['contact_name'];
  /*
    Put databae code here.
  */
  session_unset();
  session_destroy();
}
include 'includes/header.php';
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
              <div class="content-box">
                   <div class="post-title"> <p>You can use the form below to contact me.
                                                            You can also <a href="#">email</a>. Please feel free to
                                                            contact me with any comments I would love to hear from you.</p>
                   </div>
                    <div class="lead" id="contact">
                      <div>
                        <p <?php if($contact_name) echo "class=alert-success"; ?>><?php if($contact_name) echo "Thanks " . $contact_name . " for sending a message."; ?></p>
                      </div>
                      <form action="contact.php" method="post">
                        <ul>
                          <li><label for="name">Name: </label></li>
                          <li><input type="text" name="name" value=""class="form-control"/></li>
                          <li><label for="email">Email:</label></li>
                          <li><input type="text" name="email" value="" class="form-control"/></li>
                          <li><label for="message">Message</label></li>
                          <li><textarea name="message" value="" class="form-control"></textarea></li>
                          <li><button type="submit" class="btn btn-default">Send</button></li>
                        </ul>
                      </form>
                      <div>
                        <?php //(isset($_GET['name'])) ? echo "Welcome: " . $_GET['name'] . "<br/>" : $_GET['name']='';
                              //if(isset($_POST['email'])) echo "Email: " . $_POST['email'] . "<br/>";
                              //if(isset($_POST['message'])) echo "Message: " . $_POST['message'];
                        ?>
                      </div>
                    </div>
              </div>
        </div>
        <div class="col-md-3">
          <aside class="right-column">
            <article>
               <form class="navbar-form navbar-left" id="right-search">
               <!-- <form class="search-form">  -->
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            <article>
            <article>
              <ul class="social">
                  <li class="social"><i class="fa fa-github fa-3x" aria-hidden="true"></i></li>
                  <li class="social"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></li>
                  <li class="social"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></li>
              </ul>
            </article>
            <article id="post-nav">
              <h3>Recent Posts</h3>
              <ul class="post-nav">
                <li >Post 1</li>
                <li>Post 2</li>
                <li>Post 3</li>
                <li>Post 4</li>
                <li>Post 5</li>
                <li>Post 6</li>
                <li >Post 7</li>
                <li>Post 8</li>
                <li>Post 9</li>
                <li>Post 10</li>
                <li>Post 11</li>
                <li>Post 12</li>
              </ul>
            </article>
            <article id="post-nav">
              <h3>Most Popular</h3>
              <ul class="post-nav">
                <li >Post 1</li>
                <li>Post 2</li>
                <li>Post 3</li>
                <li>Post 4</li>
                <li>Post 5</li>
                <li>Post 6</li>
                <li >Post 7</li>
                <li>Post 8</li>
                <li>Post 9</li>
                <li>Post 10</li>
                <li>Post 11</li>
                <li>Post 12</li>
              </ul>
            </article>
            </aside>
        </div>
      </div> <!-- /.row -->
    </div><!-- /.container -->


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
