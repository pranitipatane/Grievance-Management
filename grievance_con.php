<?php
/*
session_start();
$host = "localhost";
$username = "root";
$password = "123456"; // Change if needed
$dbname = "smcproject";

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
else{
    echo "connected";

if (isset($_POST['gbtn'])) {

$id=$_SESSION["id"];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$zone=$_POST['zone'];
$category=$_POST['category'];
$description=$_POST['description'];
$location=$_POST['location'];

$filesize=$_FILES['attachment']['size'];
  $filetemp=$_FILES['attachment']['tmp_name'];
  $filetype=$_FILES['attachment']['type'];
  $filename=$_FILES['attachment']['name'];
  $filestore="image/".$filename;
  
  if(move_uploaded_file($filetemp,$filestore))
  {
  $sql="INSERT INTO grievance (name, email, phone,zone,category,description,location,attachment,id) 
                          VALUES ('$name, $email, $phone,$zone,$category,$description,$location,$filestore,$id)";

    if(mysqli_query($conn,$sql))
    {
      echo"img uploaded";
    }
    else{
      echo"img  not uploaded".$con->error;
    }
}
}

          

        }
$conn->close();*/

session_start();

$host = "localhost";
$username = "root";
$password = "123456"; // Change if needed
$dbname = "smcproject";

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully<br>";
}

if (isset($_POST['gbtn'])) {

    // Ensure session ID is set
    if (!isset($_SESSION["id"])) {
        die("Session ID not found. Please log in.");
    }

    $id = $_SESSION["id"];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $zone = $conn->real_escape_string($_POST['zone']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);
    $location = $conn->real_escape_string($_POST['location']);
    $gstatus="in-progress";
    $current_date = date('Y-m-d');
    echo $current_date;

    // File upload handling
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $filetemp = $_FILES['attachment']['tmp_name'];
        $filename = basename($_FILES['attachment']['name']);
        $filestore = "admin/public/images/" . $filename;

        // Move file to the destination
        if (move_uploaded_file($filetemp, $filestore)) {
            
        
            // Insert into the database
            $sql = "INSERT INTO grievance (g_name,email, g_zone, category,g_description, g_location, attachment,gstatus,g_date,id) 
                    VALUES ('$name', '$email', '$zone', '$category', '$description', '$location', '$filestore', '$gstatus','$current_date','$id')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Your Grievance Submitted successfully');
                window.location.href='grievance.php';</script>";
                
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "File upload failed.";
        }
    } 
    else {
        echo "No file uploaded or an error occurred.";
    }
}

$conn->close();
?>

