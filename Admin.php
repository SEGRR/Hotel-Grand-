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
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      #loginpad {
        position: relative;
        top: 30vh;
        left: 60vh;
      }
    </style>
  </head>
  <body  style="background-color: rgba(64, 49, 92, 0.568)">
    <!-- style="background-color: rgba(64, 49, 92, 0.568)" -->
    <div id="loginpad" class="col-5 p-3 border border-3 border-dark bg-light">
      <h1 class="text-center">Admin Login</h1>
      <form action="Admin.php" method="post">
        <div class="mb-3 row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input
              type="text"
              name="username"
              class="form-control"
              id="staticEmail"
              require
            />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label"
            >Password</label
          >

          <div class="col-sm-10">
            <input
              type="password"
              name="password"
              class="form-control"
              id="inputPassword"
              require
            />
          </div>
        </div>
        <input
          type="submit"
          name="complete"
          id=""
          value="Login"
          class="btn btn-success"

        />
      </form>
    </div>
        <?php
          if(isset($_POST['complete']) && isset($_POST['username']) && isset($_POST['password']))
          {

             $uname = $_POST['username'];
             $password = $_POST['password'];

             $query = "SELECT * FROM `admin` WHERE username = '$uname' AND password = '$password'";
             $res = mysqli_query($conn,$query) or die("query unsuccessful"); 
                
             if(mysqli_num_rows($res)>0){
    
              $res =  mysqli_fetch_array($res);

              $_SESSION['username'] =  $res['username'];
               
             ?>
                <script>location.replace("Dashboard.php");</script>
             <?php

           } 
           else{


            echo'<div class="alert alert-dismissible fade show alert-danger" role="alert">
               Wrong Email/Password
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
        
          }

          }
        ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
