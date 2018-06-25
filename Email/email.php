<?php
    $name = $_POST['name'];
    $visitorEmail = $_POST['email'];
    $message = $_POST['message'];
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->SMTPDebug = 2;                                 // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Username = 'messagesenderrobot@gmail.com';   // SMTP username
    $mail->Password = 'pentrutrimis';
    $mail->Port = 587; 
    $mail->setFrom('messagesenderrobot@gmail.com', 'customer@contact.info');
    $mail->addAddress('testDeveloperSender@gmail.com');     // Add a recipient
    $mail->addAddress('testDeveloperSender@yahoo.com');     // Add a recipient
    
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Contacted via web';
    $mail->Body    = "Name : $name. <br>".
                        "Users E-Mail: $visitorEmail.<br>".
                        "Message: $message.<br>";
    if(!$mail->send()){
        echo'Message could not be sent !';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else{
        echo 'Message sent !';
    }
    header("location: email.html");
?>