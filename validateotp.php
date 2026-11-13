<?php
/*
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$otp=$_POST["otp"];
$validotp=$_SESSION["otp"];
echo $validotp,$otp;
if($validotp==$otp)
{
    $conn = mysqli_connect('localhost', 'root', '123456', 'smcproject');

if (!$conn) {
    echo "Database connection failed: " . mysqli_connect_error();
} else {
    echo "successful";
}


// Check if the form is submitted
if (isset($_POST['otpbtn'])) {
    
    // Retrieve form data safely
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    echo $username,$email,$password,$phone;

    // Generate a random OTP
    $otp = rand(100000, 999999);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists
    $check_email_query = "SELECT username FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_query);
    

    if (mysqli_num_rows($result) > 0) {
        
        
    } else {
        // Insert user details and OTP into database
        $query = "INSERT INTO signup (username, email, password, phone, otp) 
                  VALUES ('$username', '$email', '$hashed_password', '$phone', '$otp')";
                  echo "values inserted successfully";
        
        if (mysqli_query($conn, $query))
         {
            echo "<script>alert('User registered successfully. OTP ($otp) sent to Email.<br>');</script>";
            // Integrate SMS API here to send the OTP
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }


// Close connection
mysqli_close($conn);

}
}
else{
    echo "<script>alert('Invalid otp! Enter correct otp');</script>";
echo "
<script>window.location.href='otpform.php';


</script>";


}}*/
?>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ensure OTP exists in session
    if (!isset($_SESSION["otp"])) {
        echo "<script>alert('Session expired. Please request OTP again.');</script>";
        echo "<script>window.location.href='otpform.php';</script>";
        exit();
    }

    $otp = isset($_POST["otp"]) ? $_POST["otp"] : null;
    $validotp = $_SESSION["otp"];
    $username=$_SESSION["username"];
    $email=$_SESSION["email"];
    $password=$_SESSION["password"];
    $phone=$_SESSION["phone"];
    // Debugging: Check OTP values
    echo "Session OTP: $validotp, Entered OTP: $otp";
    
    if ($validotp == $otp) {
        // Database Connection
        $conn = mysqli_connect('localhost', 'root', '123456', 'smcproject');

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        } else {
            echo "Database connected successfully";
        }

        // Check if the form is submitted
        if (isset($_POST['otpbtn'])) {
           
            if ($username && $email && $password && $phone == null) {
                echo "<script>alert('All fields are required!');</script>";
                exit();
            }

            // Generate a random OTP
            $otp = rand(100000, 999999);

            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Check if email already exists
            $check_email_query = "SELECT username FROM signup WHERE email = '$email'";
            $result = mysqli_query($conn, $check_email_query);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Email already registered. Please use a different email.');</script>";
            } else {
                // Insert user details and OTP into the database
                $query = "INSERT INTO signup (username, email, password, phone, otp) 
                          VALUES ('$username', '$email', '$hashed_password', '$phone', '$otp')";

                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('User registered successfully.');</script>";
                    echo "<script>window.location.href='login.php';</script>";

                } else {
                    echo "Error: " . mysqli_error($conn);
                    
                }
            }

            // Close connection
            mysqli_close($conn);
        }
    } else {
        echo "<script>alert('Invalid OTP! Please enter the correct OTP.');</script>";
        echo "<script>window.location.href='otpform.php';</script>";
        exit();
    }
}
?>
