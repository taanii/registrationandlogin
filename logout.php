<?php session_start();
if(empty($_SESSION['username'])){
    header('location:./login.php');
}
?>

<!DOCTYPE html>
<html>
<body>

<div style="width:150px;margin:auto;height:500px;margin-top:300px">
    <?php
     include('connect.php');
     session_destroy();
     echo '<meta http-equiv="refresh" content="2;url=login.php">';
     echo '<span class="itext">Logging out please wait!...</span>';
    ?>
</div>

</body>
</html>