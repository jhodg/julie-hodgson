<?php
//$to = "julieh71@ymail.com";
//$subject = "My Test Email";
//$txt = "Hello mail world";
//$headers = "From: jhodgemail3@gmail.com" . "\r\n";

//mail($to,$subject,$txt,$headers);

// the message
//$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail("julieh71@ymail.com","My subject",$msg);


$to = 'julieh71@ymail.com';
$subject = "Thank you for registering with Julie Hodgson";

$htmlContent = '
    <html>
    <head>
        <title>Thank You For Registering</title>
    </head>
    <body>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
            <tr>
                <th>Name:</th><td>CodexWorld</td>
            </tr>
            <tr style="background-color: #e0e0e0;">
                <th>Email:</th><td>contact@codexworld.com</td>
            </tr>
            <tr>
                <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td>
            </tr>
        </table>
    </body>
    </html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: CodexWorld<sender@example.com>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if(mail($to,$subject,$htmlContent,$headers)){
    echo 'Email has sent successfully.';
}
else{
    echo 'Email sending fail.';
}

?>
