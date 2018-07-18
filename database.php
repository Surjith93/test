<?php
$username = "root";
$password = "";
$hostname = ""; 

//connection to the database
$con = mysqli_connect("localhost","root","","student");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>