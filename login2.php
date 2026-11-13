


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
        .first_box {
            display: block;
        }
        .second_box {
            display: block;
        }
        .field_error {
            color: red;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        
        function validatePhone(input) {
            const errorMessage = document.getElementById('phone-error');
            input.value = input.value.replace(/\D/g, ''); // Allow only digits
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10); // Limit to 10 digits
            }
            if (input.value.length < 10 || input.value.length > 10) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Phone number must be exactly 10 digits.';
            } else {
                errorMessage.style.display = 'none';
            }
        }
  
           </script>
</head>
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
        <h1>Sign-up </h1>
        
        <form action="sendemail.php" method="post">
            <div id="login-form" class="form-container" style="display: block;">
                 
                 <div class="form-group">
                
                <div class="first_box">

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>


                <label for="password">Password</label>
                <input type="password" id="pass" name="password" placeholder="Enter your password" required>
                <span id="email_error" class="field_error"></span>
                <br>
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone no" required>
                <br>
                <br>
                <button type="submit" class="btn1" name="btn1" onclick="validatePhone()">Submit</button>
            
            </div>
    </div></div></form>
           
            
            

             <div class="login-footer">
             <p>Already have an account <a href="login.php">Login</a></p>
              </div>
            
        </section>
    </div>





       
    </div>
    </div>
    

       

</body>
</html>
