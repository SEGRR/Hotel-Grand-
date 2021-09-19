<?php
$conn = mysqli_connect("localhost","root","","hotel grand") or die("cant connect to database");

if(!$conn){
    header("location:config.php");
    echo "Sorry Visit later :(";
}

?>