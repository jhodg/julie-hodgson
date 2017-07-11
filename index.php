<?php
$page_title='Home';
include 'includes/header.php';
?>
<div class="container-fluid">
  <div class="row">

    <div class="col-md-9">
          <div class="content-box">
               <div class="post-title"> <h1>Julie Hodgson's Website</h1>
               </div>
                <p class="lead">Hello welcome to my website.  Much content about web developement is comming soon so please stay tunned!</p>
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
            <li ><?php echo "__FILE__ " .  __FILE__ ?></li>
            <li><?php echo "$_SERVER[DOCUMENT_ROOT] " . $_SERVER['DOCUMENT_ROOT']?></li>
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
