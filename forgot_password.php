<?php
$conn = new mysqli("localhost", "root", "123456", "smcproject");

if ($conn->connect_error) {
    die("Database connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $newPassword = $_POST["new_password"];

    // Find user by email
    $stmt = $conn->prepare("SELECT id FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();
        $id = $user["id"];

        // Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password using the user's ID
        $update = $conn->prepare("UPDATE signup SET password = ? WHERE id = ?");
        $update->bind_param("si", $hashedPassword, $id);

        if ($update->execute()) {
            echo "Password changed successfully.";
        } else {
            echo "Failed to change password.";
        }

        $update->close();

    } else {
        echo "Email not found.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        header{
            background:rgb(16, 4, 93);
   
        }
        
        .divbody {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #00204a,rgb(78, 129, 195));
            color: #ffffff;
        }
        .login-container {
            background: #ffffff;
            padding: 25px 35px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
            text-align: left;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
        }
        .error-message {
            color: red;
            font-size: 12px;
            text-align: left;
            margin-top: 5px;
            display: none;
        }
        .btn1 {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color:rgb(5, 51, 129);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 15px;
            
        }
        .btn1:hover {
            background-color: #1b63d9;
        }
        .or-divider {
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .or-divider span {
            font-size: 14px;
            color: #666;
            margin: 0 10px;
        }
        .or-divider::before,
        .or-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ccc;
        }
        .social-btn {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .social-btn button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #fff;
        }
        .google-btn {
            background: #db4437;
        }
        .google-btn:hover {
            background: #b9362b;
        }
        .phone-btn {
            background: #34a853;
        }
        .phone-btn:hover {
            background: #2a853e;
        }
        .form-container {
            display: none;
        }
        .login-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .login-footer a {
            color: #2575fc;
            text-decoration: none;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        #roles {
        width: 100%;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    border: 1px solid #ccc;
    outline: none;
    cursor: pointer;
        }
        /*#zones {
        width: 100%;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    border: 1px solid #ccc;
    outline: none;
    cursor: pointer;
        }*/
        
    </style>
    <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />

    </head>
<body>
    <body>
<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              <img src="images/logo.jpg" height="70" width="70">
             Solapur Muncipal Corporation
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
              </li>
              <li class="nav-item" onclick="validatelink()">
                <a class="nav-link" href="grievance.php">Grievance</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="login.php"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
   
    <div class="divbody ">
    <div class="login-container">
        <h1>Change Password</h1>
        <div id="login-form" class="form-container" style="display: block;">
<form method="POST" action="login.php">
    <input type="email" name="email" placeholder="Enter your email" required>

    <input type="password" name="new_password" placeholder="New password" required>

    <button type="submit">Change Password</button>
</div>
</div>
</form>
</body>
</html>