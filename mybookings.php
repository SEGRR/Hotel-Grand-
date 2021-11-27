<?php
session_start();
include "configs/config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="keywoard" content="hotel,best hotel,">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
        .carousel .carousel-item {
              height: 700px;
                      }

       .carousel-item img  {
       position: absolute;
       top: 0;
       left: 0;
         min-height: 500px;
        }
      </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hotel Grand</title>
  </head>
  
  <!--navbar-->
  <body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold text-primary" href="index.php">Hotel Grand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="booking.php">Book Now</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-light" href="#">Current offers</a>
              </li>
              
            </ul>
            
             <button id='loginbtn' class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Login</button>';  
             <?php
                 
                 if(isset($_SESSION['email'])){
                            
                       echo'<script> document.getElementById("loginbtn").remove(); </script>';
                       echo' <div class="btn-group dropstart me-2">
                       <button type="button" class="btn btn-success dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false" data-bs-refrence="parent">
                         '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'
                       </button>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="mybookings.php">My Bookings</a></li>
                         <li><a href="changeDetails.php?email='.$_SESSION['email'].'" class="dropdown-item" href="#">Change Details</a></li>
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                       </ul>
                       </div>';  
                       
                 }

            ?>
             
          </div>
        </div>
      </nav>
      <!-- nav bar end -->
      
     <!--modal----->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header p-3">
              <h5 class="modal-title text-primary" id="exampleModalLabel">Login</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                  <?php
                     //include "configs/config.php";
                     if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) )
                     {
                     
    
                         $email = $_POST['email'];
                         $password = $_POST['password'];
    
                         $query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
                         $res = mysqli_query($conn,$query) or die("query unsuccessful"); 
    
    
                         if(mysqli_num_rows($res)>0){
    
                         $res =  mysqli_fetch_array($res);

                         $_SESSION['email'] =  $res['email'];
                         $_SESSION['firstname'] = $res['first_name'];
                         $_SESSION['lastname'] = $res['last_name'];
                         $_SESSION['phone'] = $res['phone_no'];  
                         $_SESSION['id'] = $res['id'];    
                        ?>
                           <script>location.replace("index.php");</script>
                        <?php
                           
                       }else{
                        
                        echo'<div class="alert alert-dismissible fade show alert-danger" role="alert">
                            Wrong Email/Password
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        
                      }
                     

                 }
              ?>

             <form action="index.php" method="post">
              <div class="mb-3 row mt-2">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="inputPassword" value="" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword" value="" required>
                </div>
              </div>
             
              <a class="text-primary text-decoration-none ms-2" href="registration.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Register now</a>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="login" class="btn btn-primary" value="Login">

            </div>
          </form> 
          </div>
        </div>
      </div>
     <!--modal end ----->
              
     <?php
        if(isset($_GET['cancel'])){

            // $user = $_SESSION['email'];
            $room = $_GET['cancel'];
            $query = "DELETE FROM `bookings` WHERE booking_id='$room'";
            $bookings = mysqli_query($conn, $query) or die("Cant query database");
              
        }
     ?>


            <br>
            <br>
            <br>
              
            <div class="card">
                  <h1 class="text-center text-decoration-underline">MY Bookings</h1>
    <div class="container mt-3 border border-1 border-secondary">
      <div class="row text-center">
        <div class="col-1">Serial Number</div>
        <div class="col-1">Booking ID</div>
        <div class="col-1">Room ID</div>
        <div class="col-1">Room Number</div>
        <div class="col-1">Booking Date</div>
        <div class="col-1">Checkin Date</div>
        <div class="col-1">Checkout Date</div>
        <div class="col-1">Number of people</div>
        <div class="col-1">Amount paid</div>
        <hr />
        </div>
         

      <?php
          if(isset($_SESSION['email'])){
                 
            $user = $_SESSION['email'];
              $query = "SELECT * FROM `bookings` WHERE booked_by = '$user' ORDER BY booking_date DESC";
              $bookings = mysqli_query($conn, $query) or die("Cant query database");
            //   $totalBookings = mysqli_num_rows($bookings);
                $i = 1;
            while($booking = mysqli_fetch_array($bookings)){
              
      ?>
        
        <div class="row text-center">
         <div class="col-1"><?php echo $i ?></div>
        <div class="col-1"><?php echo $booking['booking_id'] ?></div>
        <div class="col-1"><?php echo $booking['room_id'] ?></div>
        <div class="col-1"><?php echo $booking['room_number'] ?></div>
        <div class="col-1"><?php echo $booking['booking_date'] ?></div>
        <div class="col-1"><?php echo $booking['checkin'] ?></div>
        <div class="col-1"><?php echo $booking['checkout'] ?></div>
        <div class="col-1"><?php echo $booking['no_people'] ?></div>
        <div class="col-1"><?php echo $booking['final_price'] ?></div>
        
        <div class="col-1"><form action="mybookings.php?cancel=<?php echo $booking['booking_id'] ?>" method="post">
            <input type="submit" value="Cancel" name="cancelbooking" class="btn btn-primary md-1">
        </form>
       </div>

        <hr />
        </div>  

     <?php
            $i++;
            }


        }
     ?>
        

        </div>

 <br>
 <br>
 <br>





   </body>
   
   </html>