<?php
$page_title='Home';
require_once('includes/config.php');
include 'includes/header.php';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-9">
          <div class="content-box">
               <div class="post-title"> <h1>Use JQuery/AJAX to get City of Dallas API Data</h1>
               </div>
                <div class="lead">
                  <img src="assets/img/open-data-image.jpg" class="center img-responsive">
                  <br>
                  <br>
                  <center><a href="blog/dcdemo.html" target="_blank"><button class="btn btn-default">Demo</button></a><a href="https://github.com/jhodg/dallascrime" target="_blank"><button class="btn btn-default">Download</button></a></center>
                  <br>
                  <p class="post-content">Curious about recent crimes in your neighborhood?  You can find out what is happening by accessing a database of local police reports.  The City of Dallas provides the public with a database that is updated daily.
                    You can find out what happened as of yesterday. <br/><br> Although it doesn't include sensitive crimes such as crimes that involve children, it does give you a good picture of what may be happening. The data retrieved uses the JSON
                    format which can easily be displayed in a web browser via Javascript. <br><br>In order to use the API to get the data you need to sign up and get a free API key. Here's how you get the Dallas Police Open Data. The query string below is inserted
                    into the browser and uses three filters. The first is emonth which designates the month. In this example the month is set to July. Next is zipcode. It is set to 75243. Last the year is set to 2017. You can use this query string to return
                    the JSON data:
                  <a href="https://www.dallasopendata.com/resource/qqc2-eivj.json?emonth=July&zipcode=75243&eyear=2017">https://www.dallasopendata.com/resource/qqc2-eivj.json?emonth=July&zipcode=75243&eyear=2017</a>
                  </p>
                  <br>
                  <a href="assets/img/img1a.png" data-lightbox="image-1" data-title="Query String"><img src="assets/img/img1a.png"  class="img-responsive"></a>
                  <br>
                  <a href="assets/img/jsona.png" data-lightbox="image-2" data-title="Query Results"><img src="assets/img/jsona.png"  class="img-responsive"></a>
                  <br>
                  <br>
                  <p class="post-content">
                  Using the browser gives us an idea of what data is available.  Now that you can see how the objects are arranged we can make it make it more user friendly.  This is done by using JQuery's AJAX function and applying it to a nice readable table. In order to do this you must first sign up for an app token : <a href="https://www.dallasopendata.com/login">https://www.dallasopendata.com/login</a>
                  Here is some sample code.  This code uses JQuery to get the JSON data.
                  </p>
                  <br>
                  <br>
                  <a href="assets/img/codea.png" data-lightbox="image-3" data-title="JQuery Code"><img src="assets/img/codea.png"  class="img-responsive"></a>
                  <br>
                  <br>
                    <ol>
                        <li>The $.ajax method is called.  The url is set to the url string used in the previous example.</li>

                        <li>The type is set to GET.  This is the type of HTTP request we will be using.</li>

                        <li>Next data is given a limit of 5000 records from the database.  You can set this to more or less if you like.</li>

                        <li>Now for the $$app_token variable.  This is a freely available by signing up at <a href="https://www.dallasopendata.com/login">https://www.dallasopendata.com/login</a> and used to identify the user who made the request.</li>
                        <li>Next is a call to .done() which implements a callback function once the request is done that retrieves the data.  Here we format the data for output to the table.  First two variables called trHTML and dayOfMonth are created.
                        The $.each function is called with each JSON object returned.  With each iteration the dayOfMonth is stored by slicing it from date1 which returns the date as a floating timestamp.  Now dayOfMonth is more readable.  Next trHTML
                        stores each table row with data from the JSON object.  Last, the trHTML variable is appended to the table.</li>
                    </ol>
                        <br>
                 <p class="post-content">
                        The resulting table (with added Bootstrap for styling) can be seen below.
                 </p>
                <br>
                <br>
                <a href="assets/img/tablea.png" data-lightbox="image-4" data-title="Data Table"><img src="assets/img/tablea.png"  class="img-responsive"></a>
              </div>
          </div>

    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>
    <?php include 'includes/footer.php' ?>
