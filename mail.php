<?php
 


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  require_once 'mailer/src/Exception.php';
  require_once 'mailer/src/PHPMailer.php';
  require_once 'mailer/src/SMTP.php';
   $mail = new PHPMailer(true); 
   $alert = '';

  if(isset($_POST['submit'])){
      $name = $_POST['name'];
       $email = $_POST['email'];
        $phone = $_POST['phone'];
         $subject = $_POST['subject'];
          $message = $_POST['message'];



          try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'sharma.kunal.ks12345@gmail.com';
                $mail->Password = 'eelzxcfhjppiapfa';
                $mail->SMTPSecure = "tls";
                $mail->Port = '587';

                $mail->setFrom('sharma.kunal.ks12345@gmail.com');
                $mail->addAddress('kunal04051999@gmail.com');

                $mail->isHTML(true);
                $mail->Subject = 'Message Received from Contact:' . $name;
                $mail->Body = "NAME:" . $name . "<br>Phone:" . $phone . "<br>Email:" . $email . "<br>Subject" . $subject . "<br>Message" . $message;
                $mail->send();

          } catch(Exception $e){

          }

    }



 ?>