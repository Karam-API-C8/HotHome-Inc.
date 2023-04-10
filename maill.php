<?php
 


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


  require_once 'mailer/src/Exception.php';
  require_once 'mailer/src/PHPMailer.php';
  require_once 'mailer/src/SMTP.php';
   $mail = new PHPMailer(true); 
   $alert = '';

  if(isset($_POST['submitbn'])){
      $name = $_POST['name'];
       $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
         $propertyId = $row['id'];
         $subject = "Property Booked";
          $message = " Hello there, ". $name ." booked a property on " . $date  . ". refer to property id for property details. "  ;



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
                $mail->Body = "NAME:" . $name . "<br>Phone:" . $phone . "<br>Email:" . $email . "<br>Property ID" . $propertyId ."<br>Subject:" . $subject . "<br>Message:" . $message;
                $mail->send();

          } catch(Exception $e){

          }

    }



 ?>