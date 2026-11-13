<?php
/*session_start();
if(isset($_POST['loginbtn'])){
$email=$_POST["email"];
$password=$_POST["password"];
$hashpassword=password_hash($password, PASSWORD_BCRYPT);
$conn = mysqli_connect('localhost', 'root', '123456', 'smcproject');

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        } else {
            echo "Database connected successfully";
            $query="select id from signup where email=$email and password=$hashpassword";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result)) {
                    $id=$row["id"];
                    $_SESSION["id"]=$id;
                    echo"Welcome user";
                }
            }
            else{
                echo "<script>alert('Invalid Email and Password ');</script>";
            }
        }
}
else{
    echo "error";
}
*/
?>
<?php
session_start();

if(isset($_POST['loginbtn'])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Establish connection
    $conn = mysqli_connect('localhost', 'root', '123456', 'smcproject');

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Secure the email input
    $email = mysqli_real_escape_string($conn, $email);

    // Fetch user data from database
    $query = "SELECT id, password FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Verify the result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"]; // Stored hashed password

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION["id"] = $row["id"];

            echo "<script>alert('Login Successful.');</script>";
            echo "<script>window.location.href='index.php';</script>";
            // Redirect to dashboard
            // header("Location: dashboard.php");
            // exit();
        } else {
            echo "<script>alert('Invalid Email or Password');</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
        echo "<script>window.location.href='login.php';</script>";
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Error: Form not submitted";
}
?>
