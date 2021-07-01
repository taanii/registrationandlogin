<?php
   define('DB_HOST','localhost');
   define('DB_NAME','registration');  //import the SQL file in your phpmyadmin
   define('DB_USERNAME','root');   //your db usernamr
   define('DB_PASSWORD','root');   //your db password
   $conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD, DB_NAME);

    //to check db connection
    if(!$conn) {
        die("Error in DB connection ". mysqli_connect_error()); 
    } 
    $error = "";
?>