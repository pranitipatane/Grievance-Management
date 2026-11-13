<?php
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$con=mysqli_connect('localhost','root','123456','smcproject');
if($con)
{
	echo "";
}
else
{
	echo "error";
}
$_SESSION["status"]=$_POST["status"];
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <style>
    .btn1 {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color:rgb(5, 51, 129);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 15px;
            
        }
        .btn1:hover {
            background-color: #1b63d9;
        }</style>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script>
    function handle_progress(status) {
    const validStatuses = ["inprogress", "under_review", "Resolved", "Rejected"];
    if (validStatuses.includes(status)) {
        window.location.href = "status.php"; // Change this to the actual URL
    }
}

    </script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
           Dashboard
          </a>
          <ul class="mt-6">
            
          </ul>
          <ul>
            
            
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="tables.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="ml-4">Grievances</span>
              </a>
            </li>
            <li>
              <form action="logout2.php">
             <input type="submit" name="logout" class="btn1" value="Logout" >
              </form>
            </li>
            
          
              
          </ul>
          
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            
            
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              
              
              <!-- Notifications menu -->
              
                  <!-- Notification badge -->
                  
              <!-- Profile menu -->
              
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
             Solapur Municipal Corporation
            </h2>
            <!-- CTA -->
            
              
              
            </a>

            <!-- With avatar -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Grievances
            </h4>
               <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <?php 
                $sql="select *from grievance";
                $res=mysqli_query($con,$sql);
                ?>
                 
               <?php
               /*
                $data= "UPDATE register SET name='gauri' WHERE password='ganga'";
                $r=mysqli_query($con,$data);
                ?>
                <?php
                if ($con->query($data) === TRUE) 
                {
                  echo "Record updated successfully";
                } else 
                {
                  echo "Error updating record: " . $con->error;
                }
                 ?> 
                 <?php
                 $s = "DELETE FROM register WHERE name='gauri'";
                 $re=mysqli_query($con,$s);
                 if ($con->query($s) === TRUE) {
                   echo "Record deleted successfully";
                 } else {
                   echo "Error deleting record: " . $con->error;
                 }*/
                 ?>
                                
                <table >
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    <th class="px-4 py-3">ID</th>
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
                  <?php 
                  while($rw=mysqli_fetch_row($res)) 
                  {
                    ?>
                    
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                   
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          
                          
                           <div>
                            <p class="font-semibold"><?php echo $rw[0];?></p>
                           
                          </div>
                        </div>
                      </td>
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
                        
                      <img src="../../<?php echo $rw[7];?>" height="100" width="100">
                        
                      </td>

                      

                      
                      <td class="px-4 py-3 text-xs">
    <form action="status.php" method="POST">
        <input type="hidden" name="uemail" value="<?php echo $rw[2]; ?>">
        <input type="hidden" name="uid" value="<?php echo $rw[0]; ?>">

        <!-- Display the current status -->
        <p>Current Status: <?php echo $rw[8]; ?></p>
        
        <!-- Dropdown for updating status -->
        <select name="progress" onchange="this.form.submit();" required>
            <option value="inprogress" <?php if ($rw[8] == 'inprogress') echo 'selected'; ?>>In-Progress</option>
            <option value="under_review" <?php if ($rw[8] == 'under_review') echo 'selected'; ?>>Under Review</option>
            <option value="Resolved" <?php if ($rw[8] == 'Resolved') echo 'selected'; ?>>Resolved</option>
            <option value="Rejected" <?php if ($rw[8] == 'Rejected') echo 'selected'; ?>>Rejected</option>
        </select>
    </form>


                      
                      
                      </td>
                      
                      <td>
                      <form action="delete_record.php" method="GET">
    <input type="hidden" name="Grievance_id" value="<?php echo $rw[0]; ?>">
    <input type="submit" class="btn1" value="Delete">
  </form>

                  </tr>
                    
                  </tbody>
                  <?php 
                  } 
                  ?>
                </table>
              </div>
               
                  
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
