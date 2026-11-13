<html><?php
$host = "localhost";
$username = "root";
$password = "123456";
$dbname = "smcproject";

// MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "connection.php";
require "./PHPMailer-master/src/Exception.php";
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//get data 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['progress'];
    $grievance_id = $_POST['uid'];
    $user_email = $_POST['uemail'];

    // Update grievance status in the database
    $sql = "UPDATE grievance SET gstatus='$status' WHERE Grievance_id='$grievance_id'";

    if (mysqli_query($conn, $sql)) {
        // Send an email notification
        sendMail($user_email, $status);
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
}

function sendMail($send_to, $status) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'smc13217@gmail.com';  // SMTP username
        $mail->Password = 'xzyj sjaq ovij kdhw';           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom("smc13217@gmail.com", "SMC");
        $mail->addAddress($send_to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Your status has been updated";
        $mail->Body = "Hello,<br><br>Your current status is now: <strong>$status</strong>.<br><br>Thank you.";

        $mail->send();
        echo "<script>alert('Email sent successfully!');</script>";
        header("location:tables.php");
        #echo "<script>window.location.href='tables.php';</script>";
        

    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
/*
update grievance set status=$status where id=$userid;












    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = 'smc13217@gmail.com'; // SMTP username
        $mail->Password = 'xzyj sjaq ovij kdhw'; // SMTP password

        $mail->setFrom();
        $mail->addAddress($send_to);
        $mail->Subject = "Account Activation";
        $mail->isHTML(true);
        $mail->Body = 'Your OTP code is: <b> </b>. It is valid for 10 minutes.';

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

if (sendMail($send_to_email)) {
    /*echo " <script>
    window.history.go(-1);
</script>";
header("Location:admin/public/tables.php");
    exit();
   
   
} else {
    echo "Failed to send email";
}
*/
?>


