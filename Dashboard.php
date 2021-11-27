 <?php
session_start();
include "configs/config.php";
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="index.php"
          >Hotel Grand</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active text-light"
                aria-current="page"
                href="booking.php"
                >Bookings</a
              >
            </li>
            
          </ul>
          <form action="logout.php" method="post">
          <button
            class="btn btn-outline-danger"
            type="submit"
            value="logout"
            name = "logout"
          >
            Logout</button
          >
          </form>
        </div>
      </div>
    </nav>
    <!-- nav bar end -->
    
<?php
    
    $query = "SELECT * FROM `bookings` ORDER BY booking_date DESC"; //
    $bookings = mysqli_query($conn, $query) or die("Cant query database");
    $totalBookings = mysqli_num_rows($bookings);
    // $bookingsDate = mysqli_fetch_array($bookings);

    $query = "SELECT * FROM `users`";
    $users = mysqli_query($conn, $query) or die("Cant query database");
    $totalUsers = mysqli_num_rows($users);

 
?>


    <div class="row mt-lg-3 ms-3">
      <div class="col-sm-3">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Current Bookings</h4>
            <p class="card-text ms-3 fs-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="40"
                height="40"
                fill="currentColor"
                class="bi bi-person"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"
                />
              </svg>
              <br />

              Total <?php echo $totalBookings ?> Bookings
            </p>
            <br>
            <br>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">User Regestration</h4>
            <p class="card-text ms-3 fs-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="40"
                height="40"
                fill="currentColor"
                class="bi bi-person-plus"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"
                />
                <path
                  fill-rule="evenodd"
                  d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"
                />
              </svg>
              <br />

              Total <?php echo $totalUsers ?> User Regestrations
            </p>
            <br>
            <br>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Rooms Booked</h4>
            <p class="card-text ms-3 fs-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="40"
                height="40"
                fill="currentColor"
                class="bi bi-building"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"
                />
                <path
                  d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"
                />
              </svg>
              <br />

              Total  <?php echo $totalBookings ?> Rooms Booked
            </p>
            <br>
            <br>
            <!-- <a href="#" class="btn btn-primary">Check Bookings</a> -->
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Discounts</h4>
            <p class="card-text ms-3 fs-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                fill="currentColor"
                class="bi bi-percent"
                viewBox="0 0 16 16"
              >
                <path
                  d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"
                />
              </svg>
              <br />

              Multiple rooms on Discount
            </p>
            <br>
            <br>
            <!-- <a href="#" class="btn btn-primary">Edit Room Details</a> -->
          </div>
        </div>
      </div>
    </div>
    <br /><br />

    <h1 class="text-center text-decoration-underline">New Bookings</h1>
    <div class="container mt-3 border border-1 border-secondary">
      <div class="row text-center">
        <div class="col-1">Serial Number</div>
        <div class="col-1">Booking ID</div>
        <div class="col-2">Booked By</div>
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
          $i = 1;
         while($booking = mysqli_fetch_array($bookings)){


          ?>
      <div class="row text-center">
         <div class="col-1"><?php echo $i ?></div>
        <div class="col-1"><?php echo $booking['booking_id'] ?></div>
        <div class="col-2"><?php echo $booking['booked_by'] ?></div>
        <div class="col-1"><?php echo $booking['room_id'] ?></div>
        <div class="col-1"><?php echo $booking['room_number'] ?></div>
        <div class="col-1"><?php echo $booking['booking_date'] ?></div>
        <div class="col-1"><?php echo $booking['checkin'] ?></div>
        <div class="col-1"><?php echo $booking['checkout'] ?></div>
        <div class="col-1"><?php echo $booking['no_people'] ?></div>
        <div class="col-1"><?php echo $booking['final_price'] ?></div>
        <hr />
        </div>  











   <?php  
   
       $i++;
         }
         
        ?>
    </div>
  </body>
</html>
