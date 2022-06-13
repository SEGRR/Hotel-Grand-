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

      <!-- silder start-->
      <div id="carouselExampleCaptions" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/main-1.png" class="d-block w-100"    alt="..." style="opacity:0.5;">
            <div class="carousel-caption d-none d-md-block">
              <h5>Welcome To Hotel Grand</h5>
              <p>Amoung the worlds top rated Hotels</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/room1.jpg" class="d-block w-100" style="opacity:0.5;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Luxuary of living</h5>
              <p>Luxarious rooms designed for best comfort with amazing views and 24 hour room service </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/swimming pool-1.jpg" class="d-block w-100" style="opacity:0.5;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>swimming pools</h5>
              <p>Roof top swimming pool with open roof restaurants and bar </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://cache.marriott.com/marriottassets/marriott/CRKMC/crkmc-bar-1967-hor-feat.jpg" class="d-block w-100" style="opacity:0.5;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Enjoy delicious Food</h5>
              <p>choose between 100+ dishes and cooked by world renowned chefs</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- crousel end-->
      

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


     <div class="feature_company_name">
      <h1>About Us</h1>
  </div>
  <div class="feature_company">
      <div class="feature_box" id="feature">
        <img src="img/free service icon.gif"/>

          <div class="inner_feature_box">
              <p class="heading_feature fst-italic">
                 Get Free and Quality Services 
              </p>
              <p>  
                Get Free services With Room Booking
              </p>
            <!-- <a id="free service" href="" class="text-decoration-none text-warning">Know more....</a> -->
            <button class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Know More... 
            </button>
            <ul class="dropdown-menu dropdown-menu-dark  dropstart" aria-labelledby="dropdownMenuButton1">
              <div class="feature_company">
              <li>
                <div class="feature_box" id="feature"> 
                <img src="img/free service icon.gif"/>
        
                  <div class="inner_feature_box">
                      <p class="heading_feature fst-italic">
                        Free Internet
                      </p>
                      <p>
                         Enjoy Free High speed Internet in every conrer of the Hotel 
                      </p>
                  </div>
            </li>
              <li>
                 
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/64/000000/external-laundry-cleaning-kiranshastry-lineal-color-kiranshastry-1.png"/>
          
                    <div class="inner_feature_box">
                        <p class="heading_feature fst-italic">
                           Laundry 
                        </p>
                        <p>
                           Get your cloths washed & dry cleaned wihtout paying any Extra charge
                        </p>
                        
                    </div>
          

              </li>
              <li>
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-room-service-hotel-essentials-justicon-flat-justicon-1.png"/>
          
                    <div class="inner_feature_box">
                        <p class="heading_feature fst-italic">
                           24 Hour room service 
                        </p>
                        <p>
                           Get any food you want at any time, Its just one dial away
                        </p>
                    </div>
          
              </li>
               
              <li>
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/color/48/000000/gum-.png"/>
        
                  <div class="inner_feature_box">
                      <p class="heading_feature fst-italic">
                        Gym
                      </p>
                      <p>
                          Get free gym pass on room Bookings
                      </p>
                  </div>
            </li>





            </div>
            </ul>
              
          </div>
      </div>
      
      <div class="feature_box" id="feature"> 
        <img src="img/locations icon.gif"/>

          <div class="inner_feature_box">
              <p class="heading_feature fst-italic">
                 You can Find us On Locations
              </p>
              <p>
                  We have multiple branchees all over the Maharashtra

              </p>
              
                <button class="btn btn-outline-warning dropdown-toggle mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                 Know More...
                </button>
                <ul class="dropdown-menu dropdown-menu-dark dropstart" aria-labelledby="dropdownMenuButton1">
                  <div class="feature_company">
                  <li>
                    <div class="feature_box">
                      <br>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2088.22472668849!2d75.91852089955262!3d17.637464125738543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5da1eb2c30bd9%3A0x219983ff5dccb46d!2sBalaji%20Sarovar%20Premiere!5e0!3m2!1sen!2sin!4v1632044068662!5m2!1sen!2sin"
                      width="200" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                       <p class="heading_feature">Solapur</p>
                      
                    </div>
                      
                  </li>
                  <li>
                    <div class="feature_box">
                      <br>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14005.910278129924!2d77.18037146977541!3d28.64541590000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d029f33fe3d5b%3A0x589484570b8c96e4!2sHotel%20Grand%20President!5e0!3m2!1sen!2sin!4v1632040046623!5m2!1sen!2sin" 
                      width="200" height="290" style="border:0;" allowfullscreen="" loading="lazy" style="border-radius: 25%;"></iframe>
                       <p class="heading_feature">New Delhi</p>
                      
                    </div>
                      
                  </li>
                  <li>
                    <div class="feature_box">
                      <br>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120575.21590218919!2d72.83823290452476!3d19.196272544612363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b124c37b1eef%3A0x2937d3a737d6612b!2sThe%20Grandeur%20Hotel!5e0!3m2!1sen!2sin!4v1632045041407!5m2!1sen!2sin" 
                      width="200" height="290" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                       <p class="heading_feature">Mumbai</p>
                      
                    </div>
                      
                  </li>
                </div>
                <p class="text-warning text-end">12 Branches more...</p>
                </ul>
               
          </div>

      </div>
      <div class="feature_box" id="feature">
        <img src="img/offers icon.gif"/>
          <div class="inner_feature_box">
              <p class="heading_feature fst-italic">
                  Get Best Deals on Rooms
              </p>
              <p>
                  Take a Look at Our Current offers, Hurry! 
              </p>
              <a href="" class="text-decoration-none text-warning">Book Now !!</a>
          </div>
      </div>
      <div class="feature_box" id="feature"> 
        <img src="img/food icon2.gif" />

          <div class="inner_feature_box">
              <p class="heading_feature  fst-italic">
                  Restaurant Grand
              </p>
              <p>
                 Get varity of food, more than 200+ dishes. 

              </p>
              <a href="" class="text-decoration-none text-warning">Know more....</a>
          </div>
      </div>
      
      <div class="feature_box" id="feature">
        <img src="img/other srevice icon.gif"/>

        <div class="inner_feature_box">
            <p class="heading_feature fst-italic">
               Other Facilities
            </p>
            <p>
               We have many different facilities
            </p>
            <button class="btn btn-outline-warning dropdown-toggle mb-2 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Know More...
             </button>
             <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
              <div class="feature_company">
              
              <li>
                 
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/color/48/000000/meeting-room.png"/>
          
                    <div class="inner_feature_box">
                        <p class="heading_feature fst-italic">
                           Conference Room
                        </p>
                        <p>
                           Organise Meeetings in Conference rooms 
                        </p>
                        
                        
                    </div>
          

              </li>
              <li>
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-room-service-hotel-essentials-justicon-flat-justicon-1.png"/>
          
                    <div class="inner_feature_box">
                        <p class="heading_feature fst-italic">
                           24 Hour room service 
                        </p>
                        <p>
                           Get any food you want at any time, Its just one dial away
                        </p>
                    </div>
          
              </li>

              <li>
                <div class="feature_box" id="feature"> 
                  <img src="https://img.icons8.com/color/48/000000/party-baloons.png"/>
          
                    <div class="inner_feature_box">
                        <p class="heading_feature fst-italic">
                          Celebrate your moment 
                        </p>
                        <p>
                           organise birthda parties or Event and celebrate in our party rooms
                        </p>
                    </div>
          
              </li>

            </div>
            </ul>
              
          </div>
        </div>
    </div>


  </div>
    <br>
    <br>
    <br>

  <!-- feature area end -->
  <!-- detail info start-->
  

   

  <!-- Footer section-->

  <footer class="footer border-top" id="contact_us">
    <div class="section_footer" id="section_footer1">
        <img src="img/hotel grand icon.png"  alt="logo">

        <!-- <p class="text-center">
            Follow us on Social Media
        </p> -->
        <div class="icon_in_footer">
            <a href="#" class="fa fa-whatsapp social_media_icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg>
            </a>
            <!-- <a href="#" class="fa fa-email social_media_icon"></a> -->
            <a href="#" class="fa fa-facebook social_media_icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="pink" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg>
            </a>
            <a href="#" class="fa fa-youtube-play social_media_icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>
            </a>
            <a href="#" class="fa fa-instagram social_media_icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
            </a>
            <a href="#" class="fa fa-github social_media_icon"></a>
        </div>


        <!-- <i class="fas fa-band-aid"></i> -->
        <!-- <a href="#" class="fa fa-linkedin social_media_icon"></a> -->
        <!-- <a href="#" class="fa font-awesome social_media_icon"></a> -->
        <!-- <a href="#" class="fa fa-pinterest social_media_icon"></a> -->
        <!-- <a href="#" class="fa fa-reddit social_media_icon"></a>
            <a href="#" class="fa fa-whatsapp social_media_icon"></a>
            <a href="#" class="fa fa-gmail social_media_icon"></a>
            <a href="#" class="fa fa-facebook social_media_icon"></a>
            <a href="#" class="fa fa-youtube social_media_icon"></a>
            <a href="#" class="fa fa-instagram social_media_icon"></a> -->

    </div>
    
    <div class="section_footer" id="section_footer2">

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14005.910278129924!2d77.18037146977541!3d28.64541590000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d029f33fe3d5b%3A0x589484570b8c96e4!2sHotel%20Grand%20President!5e0!3m2!1sen!2sin!4v1632040046623!5m2!1sen!2sin" 
    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" style="border-radius: 25%;"></iframe>

        <!-- <div class="section_footer2">
            <a href="#" class="fa fa-fas fa-map-marker social_media_icon2 " id="section_footer2_a_logo1"></a>
            <p class="section_footer_p" id="section_footer_p1">

                rupabhavani road <br>solapur,india</p>
        </div>
        <div class="section_footer2">
            <a href="#" class="fa fa-fas fas fa-phone social_media_icon2 " id="section_footer2_a_logo2"></a>
            <p class="section_footer_p" id="section_footer_p2">

                +91 1234567890 </p>
        </div>
        <div class="section_footer2">
            <a href="#" class="fa fa-fas fa fa-envelope social_media_icon2" id="section_footer2_a_logo3"></a>
            <p class="section_footer_p" id="section_footer_p3">
                idmcar@company.com</p>
        </div> -->
    </div>
    <div class="section_footer" id="section_footer3">
        <p id="section_footer_contactus">contact us</p>
        <form action="">
            <input type="email" name="email" id="section_footer_email" placeholder="Email">
            <input type="text" name="text" id="section_footer_text" placeholder="Message">
            <!-- <textarea name="Message" id="section_footer_message" cols="30" rows="10">Message</textarea> -->
            <button type="submit" id="section_footer_submit">submit</button>
        </form>
    </div>
</footer>
<div id="footer_foot">

    <hr style="color:white">
    <div class="footer_foot_item">
        <ul class="footer_foot_item_ul">
            <li class="footer_foot_item_ul_li"> <a href="#">Home</a></li>
            <li class="footer_foot_item_ul_li"> <a href="product.html">Product</a></li>
            <li class="footer_foot_item_ul_li"> <a href="service.html">Services</a></li>
            <li class="footer_foot_item_ul_li"> <a href="gallary.html">Gallary</a></li>
            <li class="footer_foot_item_ul_li"> <a href="#contact_us">Contact Us</a></li>
        </ul>
    </div>
</div>
<div class="end_footer_copyright">
    <p>© 2021 Hotel Grand. All Right Reserved</p>
</div>
        
      
     
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>
