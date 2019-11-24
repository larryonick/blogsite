<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$name = strip_tags(htmlspecialchars($_POST['name']));
$email= strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

       

        $mail = new PHPMailer(true);                             
        try {
        
              $mail->SMTPDebug = 1;    
              $mail->isSMTP();
              $mail->Host = 'localhost';
              $mail->SMTPAuth = false;                                                   
              $mail->SMTPAutoTLS = false; 
              $mail->Port = 25;                                    
              $mail->setFrom('support@centerlin.com', 'CENTERLIN');
              $mail->addAddress('lanrefasuyii@gmail.com');     
            
              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Website Contact Form: From $name';
              $mail->Body ='You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message';
                  
              
                  $mail->send();
                  echo 'Message has been sent';
            } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                  }




    
  
   ?>