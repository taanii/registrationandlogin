<!--PHP code-->
<?php
    session_start();
    include 'connect.php ';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $name = $_POST['uname'];
    $pass = ($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE (`uname` = '$name' Or `email_address`= '$name')");
    $row = mysqli_fetch_assoc($query);
    $rows = mysqli_num_rows($query); 
    
    if($rows == 1 && password_verify($pass,$row['password']))
    {
    //successful login
    $_SESSION['username'] = $name ;
    echo "<script>
            alert('login successful');
            window.location.href='./dashboard.php';
        </script>";
    } 
    else 
    {
    //invalid login
    echo "<script>
            alert('Invalid Login Credentials');
            window.location.href='./login.php';
        </script>";
    
    }
}
?>
<!--End of PHP code-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    <title>Login</title>
</head>
<body>
        
<!--Login form-->
<section style="margin: 60px;">
<h3>Login</h3>
<form action="login.php" method="POST">
<!--userame/email-->
<label for="email_address" class="col-md-4 col-form-label text-md-right">Username/E-mail address </label>
<input type="text"  class="form-control" name="uname" required autofocus>
<br>
<!--password-->                
<label for="password" class="col-md-4 col-form-label text-md-right">Password: </label>
<input type="password"  name="password" required>
<br>
                
<label>Don't have an account? <a href="register.php">Register</a></label>
<br>
<!--submit-->
<button type="submit" class="btn btn-primary">Login</button>
</form>
</section>

</body>
</html>