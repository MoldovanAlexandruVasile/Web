<?php
    $name = $_POST['name'];
    $visitorEmail = $_POST['email'];
    $message = $_POST['message'];
    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->SMTPDebug = 2;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'moldovan.alexandru07@gmail.com';   // SMTP username
    $mail->Password = '04071997alex';                                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('moldovan.alexandru07@gmail.com', 'MA');
    $mail->addAddress($visitorEmail);     // Add a recipient
    
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Contacted via web';
    $mail->Body    = $message;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
}
?>