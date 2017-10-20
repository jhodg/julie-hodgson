<?php

$conn = new PDO('mysql:host=127.0.0.1;dbname=julie-hodgson', 'root', 'josh123');

function set_message($msg)
{
  if(!empty($msg)){
  $_SESSION['message'] = $msg;
  } else {
    $msg = "";
  }
}
function display_message()
{
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}
function redirect($location)
{
  //return header("Location: $location ");
}

function show_messages()
/* This functions shows all of the messages from the contact form that are stored in the database */
{
  global $conn;
  $stmt = $conn->query("SELECT * FROM contact");
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Message</th>";
    echo "</tr>";
  foreach ($stmt as $row)
  {
    echo "<tr>";
    echo "<td>" . $row['name']. "</td>";
    echo "<td>" . $row['email']. "</td>";
    echo "<td>" . $row['message']. "</td>";
    echo "</tr>";
  }
    echo "</table>";
}

function input_contact_form($name, $email, $message)
{
  global $conn;
  /*$stmt = $conn->prepare("INSERT INTO contact(name, email, message) VALUES(:name, :email, :message)");

  $stmt->execute([
    'name' => $name,
    'email' => $email,
    'message' => $message
  ]); */
  send_email($name, $email, $message);
}

function send_email($contact_name, $contact_email, $contact_message){
  global $conn;
  //$contact_email  = $email;
  $title   = "Thank You";

  //$contact_name = $name;

  $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
  //$message = '<h1>Thank you</h1>' . $name;
  $message = "<html>";
  $message .= "<body>";

  $message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="100%" align="center">';
  $message .= '<table width="600" border="0" align="center" cellpadding="20" cellspacing="20">';

  $message .= '<tr bgcolor="#0a3e7f"><td align="center">';
  $message .= '<font face="arial" size="12px" color="#ffffff">Thank You ' . $contact_name . '</font>';
  $message .= '</td></tr>';

  $message .= '<tr><td width="600">';

  $message .= '<font face="arial" size="3" color="#606060">Thanks ' . $contact_name . '!</font>';
  $message .= '<font face="arial" size="3" color="#606060"><p>I appriciate your visit to my site.  I always welcome vistors and comments and will be contacting you soon.</p></font>';
  $message .= '<font face="arial" size="3" color="#606060"><p>Sincerely,</p></font>';
  $message .= '<font face="arial" size="3" color="#606060"><p>Julie Hodgosn</p></font>';

  $message .= '</td></tr></table>';
  $message .= '</td></tr></table>';


  $message .= "</body>";
  $message .=  "</html>";

  mail($contact_email, $title, $message, $headers);

  // Send myself the message
  date_default_timezone_set('America/Chicago');

  $date_str = date("l m-d-Y h:i:a");
  $my_email = "julieh71@ymail.com";
  $my_title = "Someone Visited Julie-Hodgson Contact Form";
  $my_headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $my_message = "<html>";
  $my_message .= "<body>";

  $my_message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="100%" align="center">';
  $my_message .= '<table width="600" border="0" align="center" cellpadding="20" cellspacing="20">';

  $my_message .= '<tr><td width="600">';

  $my_message .= '<font face="arial" size="3" color="#606060"><p><b>DATE: </b>'. $date_str .'</p></font>';
  $my_message .= '<font face="arial" size="3" color="#606060"><p><b>FROM: </b>'.$contact_name . '</p></font>';
  $my_message .= '<font face="arial" size="3" color="#606060"><p><b>EMAIL: </b>'. $contact_email .'</p></font>';
  $my_message .= '<font face="arial" size="3" color="#606060"><p><b>MESSAGE: </b>'. $contact_message . '</p></font>';


  $my_message .= '</td></tr></table>';
  $my_message .= '</td></tr></table>';


  $my_message .= "</body>";
  $my_message .=  "</html>";

  mail($my_email, $my_title, $my_message, $my_headers);
}

function validate_input($input)
{
  $clean_input = filter_var($input, FILTER_SANITIZE_STRING);
  return $clean_input;
}

function validate_email($email)
{
    return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sign_up_user()
{
  if(!empty($_POST)){
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
  }
  global $conn;
  $stmt = $conn->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");

  $stmt->execute([
    'username' => $username,
    'email' => $email,
    'password' => $hash_password
  ]);
}

function login_user()
{
  if(!empty($_POST))
  {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
  }

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([
      $username
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user)
    {
      echo "Found";
      foreach($user as $row)
        {
          echo $row . "<br>";
          //echo $row['username'];
          /*
          echo "<br>";
          echo $row['email'];
          echo "<br/>";
          $matches = password_verify($password, $row['password']); // password_verify returns nothing if no match (hash on the left)
          echo ($matches) ?  " Welcome " . $username : " Incorrect Password! ";*/
        }
      } else {
        //redirect($login.php);
        header("HTTP/1.1 303 See Other");
        header("Location: http://$_SERVER[HTTP_HOST]/julie-hodgson/login.php");
        die();
      //echo  " <h1 class='alert-danger'>There is not an account for " . $username . "</h1>";
    }
}

function confirm_email(){
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  if($password == $password2){
    echo "<h1>Thank you for registering with my website!</h1>";
    echo "<p id='confirm-email-p'>";
    echo "Please check your email for a conformation link. You will then be registered with the system.";
    echo "<ul>";
    echo "<li>" . "<a href='index.php'>Home</a>" . "</li>";
    echo "<li>" . "<a href='register.php'>Register</a>" . "</li>";
    echo "<li>" . "<a href='login.php'>Login</a>" . "</li>";
    echo "</ul>";
    echo "<p>";

  }
 else {
    //echo "here";
        //set_message("Passwords do not match");
    $_SESSION['error_message'] = "Passwords do not match";
    header("HTTP/1.1 303 See Other");
    header("Location: http://$_SERVER[HTTP_HOST]/julie-hodgson/register.php");
    die();
  }
}

?>
