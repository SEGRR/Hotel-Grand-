<?php
session_start();
include "configs/config.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Change details</title>
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
            
             <button id='loginbtn' class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Login</button>';  
             <?php
                 
                
              //     if(isset($_SESSION['email'])){
                            
              //       echo'<script> document.getElementById("loginbtn").remove(); </script>';
              //       echo' <div class="btn-group dropstart me-2">
              //       <button type="button" class="btn btn-danger dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false" data-bs-refrence="parent">
              //         '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'
              //       </button>
              //       <ul class="dropdown-menu">
              //         <li><a class="dropdown-item" href="#">My Bookings</a></li>
              //         <li><a class="dropdown-item" href="#">Change Details</a></li>
              //         <li><hr class="dropdown-divider"></li>
              //         <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              //       </ul>
              //       </div>';  
                    
              // }

                       
                

            ?>
             
          </div>
        </div>
      </nav>
      <!-- nav bar end -->

       <!--modal----->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
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
                               
                        ?>
                           <script>location.replace("registration.php");</script>
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


      <div class="row mt-3">
      <div class="col-md-4"></div>
    <div class=" col-md-4 text-center bg-light border border-secondary">
        <h3 class="p-3" >Change Details</h3>

        <?php
         //include "configs/config.php";
        if(isset($_POST['change'])){

          $email = $_POST['email'];
          $password = $_POST['password'];
          $checkpassword = $_POST['checkpassword'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $age = $_POST['age'];
          $phone = $_POST['phone'];
          
            if($password == $checkpassword){
              
              $query2 = " UPDATE `users` SET 
              `password`='$password',
              `first_name`='$firstname',
              `last_name`='$lastname',
              `phone_no`='$phone',
              `age`='$age'
                   WHERE email = '$email'";

                 $res = mysqli_query($conn,$query2) or die(mysqli_error($conn));
               if($res){
                  //session_start();
            
                     $_SESSION['email'] =  $email;
                     $_SESSION['firstname'] = $firstname;
                     $_SESSION['lastname'] = $lastname;
                     $_SESSION['phone'] = $phone;
                     $_SESSION['id'] = $res['id']; 
        
                     echo'<div class="alert alert-dismissible fade show alert-success" role="alert">
                            Details updated Successfuly
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                          

                      // sleep(3);

                       ?>
                          
                    
                          <?php


                             
               }else{
                
                echo'<div class="alert alert-dismissible fade show alert-danger" role="alert">
                         Some ERROR occupied plz try again later
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
          
               }

            }else{
               echo'<div class="alert alert-dismissible fade show alert-danger" role="alert">
                  Password dont match !
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }



        }
        ?>
        <?php
            $email2 = $_SESSION['email'];
            $query = "SELECT * FROM `users` WHERE email = '$email2' ";
            $details = mysqli_query($conn,$query) or die(mysqli_error($conn));
               
            $details =  mysqli_fetch_array($details);

             
              
        ?>
       <form action="changeDetails.php" method="POST">
        <div class="input-group mb-3 text-light">
            <span class="input-group-text" id="basic-addon1">Email</span>
            <input type="text" class="form-control" name="email" placeholder="example@email.com" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $details['email'];?>" readonly>
          </div>
          
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"> New Password</span>
            <input type="password" name="password" class="form-control" placeholder="Must be greater than 4 digit" aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Repeat password</span>
            <input type="password" name="checkpassword" class="form-control" placeholder="Repeat Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
          </div>
          
          <label for="basic-url" class="form-label">Your Data</label>
          <div class="input-group mb-3">

            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $details['first_name']; ?>" aria-label="Username">
            <span class="input-group-text">-</span>
            <input type="text" class="form-control" name="lastname"  placeholder="Lastname" aria-label="Server" value="<?php echo $details['last_name']; ?>">
          </div>
          
          <div class="input-group mb-3">
            <span class="input-group-text">Age</span>
            <input type="text" class="form-control" name="age"  value="<?php echo $details['age']; ?>" aria-label="Amount (to the nearest dollar)">
          </div>
          
         
          <div class="input-group">
          <span class="input-group-text">Phone Number</span>
            <input required class="form-control" name="phone" value=" <?php echo $details['phone_no']; ?> ">
          </div>
          <input class="btn-primary m-3 p-1 " type="submit" name="change" value="Submit">
        </form>
    </div>
</div>

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
        
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>