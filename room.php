<?php
include "configs/config.php";
session_start();
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
    <title>Best Room</title>
  </head>
  <body class="bg-dark">
    
    <!--navbar-->
  <body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light ">
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
                            
                       echo'<script> document.getElementById("loginbtn").remove() </script>';
                       echo' <div class="btn-group dropstart me-2">
                       <button type="button" class="btn btn-success dropdown-toggle float-end" data-bs-toggle="dropdown" aria-expanded="false" data-bs-refrence="parent">
                         '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'
                       </button>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="#">My Bookings</a></li>
                         <li><a class="dropdown-item" href="#">Change Information</a></li>
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
                         $_SESSION['phone'] = $res['phone_no'];  
                         $_SESSION['id'] = $res['id'];    
                               
                        ?>
                          
                        <?php
                           
                       }else{
                        
                        echo'<div class="alert alert-dismissible fade show alert-danger" role="alert">
                            Wrong Email/Password
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        
                      }
                     

                 }
              ?>
             
             <form action="<?php echo "room.php?id=".$_GET['id']; ?>" method="post">
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

      <!--model end-->

   
      <!--main containt-->
      <?php
         if(isset($_GET['id'])){
              
          $id= $_GET['id'];

          $query="SELECT * FROM `rooms` WHERE room_id = $id ";
          $res = mysqli_query($conn,$query) or die(mysqli_error($conn));

          $res = mysqli_fetch_array($res);
          $dicountedPrice = ($res['price'] * $res['discount']) / 100;
          $price_after_discount = $res['price'] -  $dicountedPrice ;
          $discription = explode(',',$res['discription']);
          $gst = ($price_after_discount *$res['tax_rate'])/100;

          $finalprice = $price_after_discount + $gst;

         }
      ?>
      <div class="row mt-2">
        <div class="col-6 ms-2">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($res['photo_1']); ?>" class="img-fluid "  alt="...">
    </div>
     <div class="col-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fst-italic">
           <?php echo $res['room_name'] ?>
          </h5>
          <p class="card-text">
                     Room Type : <?php echo $res['room_type']; ?> 

                     <div class="col-3 float-end">
                       <p>Price:</p>
                      <h4>Rs.<?php echo $finalprice; ?></p>
                        <small ><p class="text-decoration-line-through text-danger ">Rs.<?php echo $res['price'] ?> </p> <p class="text-success"><?php echo $res['discount'];?>% off</p> </small>
                  </div>           
          <div class="card-text">
              <p>Discription</p>
            <ul><?php foreach ($discription as $key) {
               echo "<li>$key</li>";
           }  ?> 
           </ul>
           <div class=" col-4 float-end">
             <p class="text-warning">Rating: </p>
                   <?php
                       for ($i=1; $i <= $res['ratings']; $i++) { 
                         # code...
                   ?>
                  
                     
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-star-fill " viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                  </svg>
                          
                 
                   <?php
                       }
                   ?>
                </div>
        </div>
        <form action="<?php echo "room.php?id=".$_GET['id']; ?>" method="post">
        <input type="submit" name="book_now" class="btn btn-primary" value="Book Now">
          </form>
        </div>
        
      </div>
    </div>
    <!--row end-->  
    </div>
   
    <!--discription icons start-->
   <div class="row bg-light mt-3 align-items-center">

     <div class="col-1 ms-3  text-center">
    <img id="ac" src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/48/000000/external-air-conditioner-appliances-kiranshastry-lineal-color-kiranshastry.png"/>
    <br>
    <label for="ac" class="align-middle text-muted">Air Condition</label>
     </div>

     <div class="col-1 ms-3  text-center">
      <img  id="bed" src="https://img.icons8.com/fluency/48/000000/bed.png"/>
      <br>
      <label for="bed" class="align-middle text-muted">Quality Sleep</label>
       </div>
     
       <div class="col-1 ms-3  text-center">
        <img  id="dinning table" src="https://img.icons8.com/external-itim2101-flat-itim2101/48/000000/external-coffee-cafe-itim2101-flat-itim2101.png"/>
        <br>
        <label for="dinning table" class="align-middle text-muted">Dine Together</label>
         </div>

         <div class="col-1 ms-3  text-center">
          <img id="tv" src="https://img.icons8.com/color/48/000000/tv.png"/>
          <br>
          <label for="tv" class="align-middle text-muted">Entertainment</label>
           </div>

           <div class="col-1 ms-3  text-center">
            <img src="https://img.icons8.com/external-vitaliy-gorbachev-blue-vitaly-gorbachev/48/000000/external-wifi-internet-technology-vitaliy-gorbachev-blue-vitaly-gorbachev.png"/>
            <br>
            <label for="tv" class="align-middle text-muted">Free Internet</label>
             </div> 

             <div class="col-1 ms-3  text-center">
              <img id="roomservice" src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/48/000000/external-room-service-coffee-shop-kiranshastry-lineal-color-kiranshastry.png"/>
              <br>
              <label for="roomservice" class="align-middle text-muted ">24Hr Room Service</label>
               </div> 
        
               <div class="col-1 ms-3  text-center">
                <img id="hotwater" src="https://img.icons8.com/color/48/000000/shower.png"/>
                <br>
                <label for="hotwater" class="align-middle text-muted ">24Hr Hot Water</label>
                 </div>      
                 
                 
               <div class="col-1 ms-3  text-center">
                <img id="gym" src="https://img.icons8.com/external-konkapp-flat-konkapp/48/000000/external-gym-gym-konkapp-flat-konkapp.png"/>
                <br>
                <label for="gym" class="align-middle text-muted ">Free gym pass</label>
                 </div>   
                 
                 <div class="col-1 ms-3  text-center">
                  <img id="free" src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/48/000000/external-free-sales-vitaliy-gorbachev-flat-vitaly-gorbachev.png"/>
                  <br>
                  <label for="free" class="align-middle text-muted ">0 cancellation charge</label>
                   </div>   
   </div>
     <!--discription icons start-->

     <!--booking form start-->

     <?php
     
        if(isset($_POST['book_now'])){
         
          if(isset($_SESSION['email'])){
           ?>
         
   <br><br><br><br>
     <div id="booking" class="container bg-light p-3">
       <h4 class="text-center fst-italic">Booking Form</h5>
        <br>
        <br>
      <form class="row g-3" method="post"  action="<?php echo "room.php?id=".$_GET['id']; ?>">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" value="<?php echo $_SESSION['email']; ?>" readonly required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Name</label>
          <input type="text" name="email" class="form-control" id="inputPassword4" value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>" readonly required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Phone number</label>
          <input type="text" name="email" value="<?php  echo  $_SESSION['phone']; ?>" class="form-control" id="inputPassword4"  required>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Room</label>
          <input type="text" name="room_name" class="form-control" id="inputEmail4" value="<?php echo $res['room_name']; ?>" readonly required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Number of Rooms</label>
          <input type="text" name="num_rooms" class="form-control" id="inputPassword4" value="1" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Amount in INR </label>
          <input type="number" name="amount" class="form-control" id="inputPassword4" value="<?php echo $finalprice; ?>" value="0" readonly required>
           <?php  echo'<p class="text-muted">including Tax @ '.$res['tax_rate'].'% </p>'; ?>
        </div>
        <div class="col-12">
        <label for="inputAddress2" class="form-label">Checkin Date</label>
          <input type="date" class="form-control" id="inputAddress2" name="checkin"  required>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Checkout Date</label>
          <input type="date" class="form-control" id="inputAddress2" name="checkout"  required>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Number of people to stay </label>
          <input type="text" class="form-control" id="inputCity" name="num_people" required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck"  name="extra[]">
            <label class="form-check-label" for="gridCheck">
              Airport pickup  <small class="text-muted">(extra charge Rs.300) </small>
            </label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="extra[]">
            <label class="form-check-label" for="gridCheck">
              Swimming poll pass 
              <small class="text-muted">(extra charge Rs.300) </small>
            </label>
          </div>
        </div>
        <div class="col-12">
          <input type="submit" name="complete_payment" class="btn btn-primary" value="Complete payment">
          <br>
          <br>
        </div>
      </form>
     
    </div> 
     
    <?php
          }else{
                   
            echo "<script> alert('You must login before continue');
                
                 </script>";

          }

        }
     
      ?>
     <!--end booking form-->
    <br><br><br>
     <!--payment form starts-->
    
     <?php
           if(isset($_POST['complete_payment'])){

              $extra = $_POST['extra'];
              $last_price = (int)$finalprice;
              $checkout = $_POST['checkout'];
              $checkin = $_POST['checkin'];
              $num_people = $_POST['num_people'];
              foreach($extra as $addon){
                 $last_price += 300;
              }
               $rooms = (int)$_POST['num_rooms'];
               $last_price *= $rooms;

               $id= $_GET['id'];

               $query="SELECT * FROM `rooms` WHERE room_id = $id ";
               $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
     
               $res = mysqli_fetch_array($res);

               $rooms_numbers  = explode(',',$res['room_numbers']);
               $available_rooms = array();
               $rooms_dup = $rooms;
                    
                    
                   foreach($rooms_numbers as $one_room){

                    if($rooms_dup == 0){
                       break;
                    }
                      $room_query = "SELECT * FROM `bookings` WHERE  room_number = $one_room";
                     
                      $result = mysqli_query($conn,$room_query) or die(mysqli_error($conn));
 
                      if(mysqli_num_rows($result) == 0){
                       
                          array_push($available_rooms,$one_room);
                          $rooms_dup--;
                      }

 
                   }

              
                   
                $Email = $_SESSION['email'];
                $roomid = $_GET['id'];
                $bookingdate = date('Y-m-d');
                
                
                foreach($available_rooms as $bookedroom){
               $setbookingquery = " INSERT INTO `bookings`(
                   `booked_by`, `room_id`, `room_number`, `booking_date`, `checkin`, `checkout`, `no_people`, `final_price`) 
                 VALUES ('$Email','$roomid','$bookedroom','$bookingdate','$checkin','$checkout','$num_people', '$last_price')";

                  mysqli_query($conn,$setbookingquery) or die(mysqli_error($conn));
                   
               }

            ?>

          
    <div class="container bg-light">
    
      <div class="col-6">
          <h4 >Final Amount </h4>
          <input type="text" class="form-control" id="inputAddress2" name="finalamount" value="<?php echo $last_price; ?>"  readonly> 
        </div> 
        
        <hr>
        <h4 class=" fst-italic">Payment options</h4>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                <img src="https://img.icons8.com/ios-filled/48/000000/bhim-upi.png"/>
                <p>UPI Payment</p>
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                <img src="https://img.icons8.com/external-those-icons-lineal-those-icons/48/000000/external-credit-card-business-those-icons-lineal-those-icons-1.png"/>
                <p>card Payment</p>
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                  <img src="https://img.icons8.com/external-itim2101-lineal-itim2101/48/000000/external-cash-bill-and-payment-itim2101-lineal-itim2101.png"/>
                  <p>On arrival</p>
              </button>
            </li>
          </ul>
          <form action="payment.html" method='post'>
          <div class="tab-content p-3" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                 
                  <div class="col-6">
                 
                      <label class="form-label" for="upi">Enter UPI ID</label>
                      <input class="form-control" type="text" name="upi" id="upi" required>
                    
                  </div>
  
                  <div class="col-6 mt-2">
                  <a href='payment.php'><button type="button" class="btn btn-success" name="card_payment">Pay Now</button></a>
                       </div>
                 <!-- </form>        -->
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <!-- <form action="payment.html" method='post'> -->
                  <div class="col-1">
                      <label class="form-label" for="cvv">CVV</label>
                      <input class="form-control" type="password" name="cvv" id="cvv" required>
                  
                  </div>
  
                  <div class="col-1">
                      <label class="form-label" for="upi">Exp year</label>
                      <input class="form-control" type="text" name="upi" id="upi" required>
  
                  </div>
                    
                  <div class="col-6 m-2">
                   
                 <a href='payment.php'><button type="button" class="btn btn-success" name="card_payment">Pay Now</button></a>
                   </div>
            <!-- </form> -->
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                 <h5 class="text-success">
                     You can make payment on Checkin
                 </h5>
                 <div class="col-6">
                  <label for="inputAddress" class="form-label">Chekin Date</label>
                  <input type="date" value="<?php echo $checkin ; ?>" class="form-control" id="inputAddress" name="Chekin" placeholder="Cheakin date" readonly>
                </div>
  
                 <p class="text-secondary mt-1">
                   - No additional charges <br>
                   - cash/card is accepted
                 </p>
                 <p class="text-danger">
                     ! Room number will be alloted after payment is made
                 </p>
  
                 <div class="col-6 m-2">
                 <!-- <form action="payment.php" method='post'> -->
                 <a href='payment.php'><button type="button" class="btn btn-success" name="card_payment">Pay Now</button></a>
            </form>
                   </div>
              
              </div>
            </div>
            
      </div>

      
  
      <?php
     }

?>


    
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