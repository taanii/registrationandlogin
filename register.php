<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        include 'connect.php ';

        $uname = mysqli_real_escape_string($conn,strip_tags($_POST["uname"]));
        $name = mysqli_real_escape_string($conn, strip_tags($_POST["name"]));
        $email_address = mysqli_real_escape_string($conn, strip_tags($_POST["email-address"]));
        $password = $_POST["password"]; 
        $conpassword = $_POST["conpassword"];
        $addr = mysqli_real_escape_string($conn, strip_tags($_POST["addr"]));
        $mob = mysqli_real_escape_string($conn, strip_tags($_POST["mob"]));

        $sql = "Select * from users where email_address='$email_address'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); 
        
        //new user
        if($num == 0) {
            //passord matches
            if($password == $conpassword) {
                //BCRYPT
                $hash = password_hash($password, PASSWORD_BCRYPT);
                        
                // Password Hashing is used here. 
                $sql = "INSERT INTO `users` ( `email_address`,`uname`, `name`, `addr`, `mob`, `password`) 
                VALUES ('$email_address', '$uname' ,'$name','$addr','$mob','$hash')";
            
                $result = mysqli_query($conn, $sql);
                    
                    if ($result) {
                        echo "<script>
                            alert('You have been sucessfully registered');
                            // window.location.href='./dashboard.php';
                            </script>";

                        $_SESSION["emailaddress"] = $email_address;
                        $getid = "Select id, uname, name from users where email_address='{$_SESSION['emailaddress']}'";
                        $result = $conn->query($getid);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['uname'] = $row["uname"];
                        $_SESSION["name"] = $row["name"];

                        echo "<script>
                                        window.location.href='./dashboard.php';
                            </script>";

                    }
                } 
            }
            
            //user with same emailid already exists
            if($num>0) 
            {     
                echo "<script>
                    alert('User with same emailid already exists');
                    window.location.href='./register.php';
                </script>"; 
                echo "<script>
                    alert('This username already exists');
                    window.location.href='./register.php';
                </script>"; 
            }    
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    <title>Register</title>
</head>
<body>
  
<!--registration form-->
<section style="margin: 40px;">
<h3>Register</h3>
<form action="register.php" method="POST" onsubmit="return validation()">

<label for="uname" >Username: </label>
<input type="text" id="uname" class="form-control" name="uname"  autofocus>
<br><span id="unamee"></span>
<br>
                                
<label for="name">Name: </label>
<input type="text" id="name" class="form-control" name="name"  autofocus>
<br><span id="namee"></span>
<br>
                                
<label for="email_address">E-mail address: </label>
<input type="email" id="email_address" class="form-control" name="email-address"  autofocus required>
<br>
                                
<label for="password">Password: </label>
<input type="password" id="password" class="form-control" name="password" >
<br><span id="passs"></span>
<br>

<label for="conpassword">Confirm Password: </label>
<input type="password" id="conpassword" class="form-control" name="conpassword" >
<br><span id="conpasss"></span>
<br>

<label for="addr">Address: </label>
<textarea type="text" id="addr" class="form-control" name="addr" required></textarea>
<br><span id="addrr"></span>
<br>

<label for="mob">Mobile: </label>
<input type="text" id="mob" class="form-control" name="mob" >
<br><span id="mobb"></span>
<br>
    
<label>Already have an account? <a href="login.php">Login</a></label>
<br>

<button type="submit" class="btn btn-primary">Register</button>                                
</form>
</section>

<!--Form validation for registration form-->
<script>
    function validation()
{
var uname = document.getElementById('uname').value;
var name = document.getElementById('name').value;
var addr = document.getElementById('addr').value;
var mob = document.getElementById('mob').value;
var password = document.getElementById('password').value;
var conpassword = document.getElementById('conpassword').value;

//username
if (uname== "")
{
document.getElementById('unamee').innerHTML="Enter username";
return false;
}
else{
document.getElementById('unamee').innerHTML="";
}

//name
if (name== "")
{
document.getElementById('namee').innerHTML="Enter your name";
return false;
}
else{
document.getElementById('namee').innerHTML="";
}

//mobile
if (mob== "")
{
document.getElementById('mobb').innerHTML="Enter your mobile number";
return false;
}
if (mob.search(/[A-Z]/)!=-1)
{
document.getElementById('mobb').innerHTML="It should only contain integer value";
return false;
}
if (mob.search(/[a-z]/)!=-1)
{
    document.getElementById('mobb').innerHTML="It should only contain integer value";
return false;
}
if (mob.search(/[@\!\$\%\^\&\(\)\_\-\+\=\<\>\?\.]/)!=-1)
{
    document.getElementById('mobb').innerHTML="It should only contain integer value";
return false;
}
else{
document.getElementById('mobb').innerHTML="";
}

//password
if (password == "")
{
document.getElementById('passs').innerHTML="Password can't be empty";
return false;
}
if (password.length<8)
{
document.getElementById('passs').innerHTML="Password should 8 or more characters";
return false;
}
if (password.search(/[0-9]/)==-1)
{
document.getElementById('passs').innerHTML="Password should contain atleast 1 number";
return false;
}
if (password.search(/[a-z\A-Z]/)==-1)
{
document.getElementById('passs').innerHTML="Password should contain atleast 1 alphabet";
return false;
}
if (password.search(/[@\!\$\%\^\&\(\)\_\-\+\=\<\>\?\.\#\,\*]/)==-1)
{
document.getElementById('passs').innerHTML="Password should contain atleast 1 special character";
return false;
}
else{
document.getElementById('passs').innerHTML="";
}
//confirm password
if (conpassword != password)
{
document.getElementById('conpasss').innerHTML="Password isn't matching";
return false;
}
else{
    document.getElementById('conpasss').innerHTML="";
}
}
</script>

</body>
</html>