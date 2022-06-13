!doctype html>
<?php
session_start();
include "configs/config.php";
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hello, world!</title>
  </head>
  <body class="bg-dark">
    
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
                         <li><a class="dropdown-item" href="#">My Bookings</a></li>
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
 
      
   <div id="end" class="container  bg-light ">
       <h4 class="text-center text-success">
         Booking Successful!
       </h4>

       <p class="text-center">
         Thank You For Booking, We will be waiting to Recieve you 
       </p>
     <hr>
       <h5 class="text-center">
         Please leave Ratings
       </h5>
       
       <div class="review_box">
        
       <svg xmlns="http://www.w3.org/2000/svg" id="star1" width="20" height="20" fill="" class="bi bi-star-fill  " viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>

      
      <svg xmlns="http://www.w3.org/2000/svg" id="star2" width="20" height="20" fill="" class="bi bi-star-fill stars " viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>

      
      <svg xmlns="http://www.w3.org/2000/svg" id="star3" width="20" height="20" fill="" class="bi bi-star-fill stars " viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>

      
      <svg xmlns="http://www.w3.org/2000/svg" id="star4" width="20" height="20" fill="" class="bi bi-star-fill stars " viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>

      
      <svg xmlns="http://www.w3.org/2000/svg" id="star5" width="20" height="20" fill="" class="bi bi-star-fill stars " viewBox="0 0 16 16">
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
      </svg>

    </div>
        
    
    <a href="index.php" class="text-decoration-none text-dark">
    <button class="btn btn-outline-success">submit</a></button>
      
      
   
    </div>
      
     <script>
        const starBox = document.getElementsByClassName('review_box')[0];
         const star1 = document.getElementById('star1');
         const star2 = document.getElementById('star2');
         const star3 = document.getElementById('star3');
         const star4 = document.getElementById('star4');
         const star5 = document.getElementById('star5');
            
         star1.addEventListener('click',e =>{

          star1.setAttribute('fill','gold');
           star2.setAttribute('fill','');
           star3.setAttribute('fill','');
           star4.setAttribute('fill','');  
           star5.setAttribute('fill','');  
         })

         star2.addEventListener('click',e =>{
           
          star1.setAttribute('fill','gold');
           star2.setAttribute('fill','gold');
           star3.setAttribute('fill','');
           star4.setAttribute('fill','');  
           star5.setAttribute('fill','');  ;

       })

       star3.addEventListener('click',e =>{
           
           star1.setAttribute('fill','gold');
           star2.setAttribute('fill','gold');
           star3.setAttribute('fill','gold');
           star4.setAttribute('fill','');  
           star5.setAttribute('fill','');  
       })

       star4.addEventListener('click',e =>{
           
           star1.setAttribute('fill','gold');
           star2.setAttribute('fill','gold');
           star3.setAttribute('fill','gold');
           star4.setAttribute('fill','gold');
           star5.setAttribute('fill','');   
       })
      
       star5.addEventListener('click',e =>{
           
           star1.setAttribute('fill','gold');
           star2.setAttribute('fill','gold');
           star3.setAttribute('fill','gold');
           star4.setAttribute('fill','gold');  
           star5.setAttribute('fill','gold');  
       })
      
        
     </script>
         

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    
      </body>
      </html>