


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'leminhduc1212001@gmail.com'; // Your Gmail email address
$mail->Password = 'pklirnhjpudzbyur'; // Your Gmail password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

//Recipients
$mail->setFrom('leminhduc1212001@gmail.com', 'Lee Ducc');
$mail->addAddress('duc.lm.2393@aptechlearning.edu.vn', 'Lee Duc');

//Content
if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
    $mail->Subject = 'PHPMailer contact form';
    $mail->isHTML(false);
    $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
    if (!$mail->send()) {
        $msg = 'Sorry, something went wrong. Please try again later.';
    } else {
        $msg = 'Message sent! Thanks for contacting us.';
    }
} else {
    $msg = 'Share it with us!';
}

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>


