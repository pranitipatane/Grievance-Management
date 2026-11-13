<?php
session_start();
$conn=mysqli_connect("localhost","root","123456","smcproject");
if(!$conn){
echo "Failed";
}
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];

$sql="SELECT * from grievance where id='$id'";
$res=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Solapur Muncipal Corporation </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>


  <div class="hero_area">
    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/logo4.png" alt="">
      </div>
    </div>

    <!-- header section starts -->
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
              <li class="nav-item" onclick="">
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
    <hr style="border: 3px solid white; margin: 0;">
    <!--header close-->

    <body >
    <table class="w-full whitespace-no-wrap"style="  background-color:#fefefe;"  border=2>
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    <th class="px-4 py-3">Date</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Email</th>
                      
                      <th class="px-4 py-3">Zone</th>
                      <th class="px-4 py-3">Category</th>
                      <th class="px-4 py-3">Description</th>
                      <th class="px-4 py-3">Location</th>
                      <th class="px-4 py-3">Attachment</th>
                      
                      <th class="px-4 py-3">Status</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                   
                  <?php 
                  while($rw=mysqli_fetch_row($res)) 
                  {
                    ?>
                    
                  
                    <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">
                        
                        <?php echo $rw[9];
                        ?>
                        
                      </td>
                      <td class="px-4 py-3 text-sm">
                    <?php echo $rw[1];?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        
                        <?php $u_email= $rw[2];
                        echo $u_email;
                        ?>

                        </span>
                      </td>
                      <td class="px-4 py-3 text-xs">
                       
                        <?php echo $rw[3];
                        ?>
                       
                      </td>

                      <td class="px-4 py-3 text-xs">
                       
                        <?php echo $rw[4];
                        ?>
                       
                      </td>

                      <td class="px-4 py-3 text-xs">
                       
                        <?php echo $rw[5];
                        ?>
                        
                      </td>

                      <td class="px-4 py-3 text-xs">
                        
                        <?php echo $rw[6];
                        ?>
                        
                      </td>

                      <td class="px-4 py-3 text-xs">
                        
                        <img src="<?php echo $rw[7];?>" height="100" width="100">
                        </span>
                      </td>

                      

                      
                      
                  <td class="px-4 py-3 text-xs">

                  <?php echo $rw[8];?>
                  </td>
                 
                  </tr>
                    
                  </tbody>
                  <?php 
                  } 
                  ?>
                </table>
                </body>
</html>
    

<?php
}else{
    header("location:login.php");
}
?>