<?php
/*
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();
//$mail->Host = 'smtp.mandrillapp.com';                                 


$mail->Host = 'smtp.gmail.com';  
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';                             
$mail->Username = 'paper498.2@gmail.com';
$mail->Password = 'paper####'; 
$mail->setFrom('paper498.2@gmail.com','Test');
$mail->addAddress('shanto.ewu99@gmail.com','Chech hasi');

$mail->isHTML(true);
$mail->Subject = 'Email From PHPMailer';
$mail->Body    = 'Hello brother how are you this email is send form phpmailer library!</b>';                            

//$mail->SMTPDebug = 2;

    // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
//$mail->addAttachment('images/php-send-email.png');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                  // Set email format to HTML
//$mail->Subject = 'Email From PHPMailer';

//$mail->AltBody = 'Hello brother how are you this email is send form phpmailer library its very easy!</';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

*/

?>


<?php
if (isset($_POST['send'])) {
//$mailto =isset( $_POST['to']);
//$mailSub = $_POST['subject'];
//$mailMsg = $_POST['massage'];
}

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;



$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;  
                             // Enable SMTP authentication
$mail->Username = 'paper498.2@gmail.com';
$mail->Password = 'paper####';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom(isset($_POST['to']));
    // Optional name
//$mail->isHTML(true);                                  // Set email format to 
   $mail->Subject = $_POST['subject'];
   $mail->Body =$_POST['massage'];
   $mail->AddAddress('paper498.2@gmail.com');

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




/*
$mail->isSMTP();                           
$mail->Host = 'smtp.gmail.com';           
$mail->SMTPAuth = true;                    
$mail->Username = 'paper498.2@gmail.com';
$mail->Password = 'paper####';
$mail->SMTPSecure = 'tls'; //'tls'; ssl             
$mail->Port = 587;// 587; 465
$mail->isHTML();
//$mail ->SetFrom($mailform);
 $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg ;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
*/
?>