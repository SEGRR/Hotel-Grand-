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
            <li class="nav-item">
              <a class="nav-link active text-light" href="#">Current offers</a>
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
   
    

</body>
</html>