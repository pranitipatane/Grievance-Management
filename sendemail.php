<html><?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "connection.php";

require "./PHPMailer-master/PHPMailer-master/src/Exception.php";
require "./PHPMailer-master/PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//get data 
$send_to_email = $_POST["email"];
$phonenumber=$_POST["phone"];
$password=$_POST["password"];
$verification_otp = random_int(100000, 999999);
session_start();
$_SESSION["otp"]=$verification_otp;
$send_to_name1 = $_POST["username"];


//setting data in session

$_SESSION["username"]=$send_to_name1;
$_SESSION["email"]=$send_to_email;
$_SESSION["password"]=$password;
$_SESSION["phone"]=$phonenumber;

function sendMail($send_to, $otp, $name) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = 'smc13217@gmail.com'; // SMTP username
        $mail->Password = 'xzyj sjaq ovij kdhw'; // SMTP password

        $mail->setFrom("smc13217@gmail.com", "SMC");
        $mail->addAddress($send_to);
        $mail->Subject = "Account Activation";
        $mail->isHTML(true);
        $mail->Body = 'Your OTP code is: <b>' . $otp . '</b>. It is valid for 10 minutes.';

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
}

if (sendMail($send_to_email, $verification_otp, $send_to_name1)) {
    /*echo " <script>
    window.history.go(-1);
</script>";*/
header("Location: otpform.php");
    exit();
   
   
} else {
    echo "Failed to send email";
}

?>

</html>
