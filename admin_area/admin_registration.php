<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap CSS link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font ossum-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <style>
body{
    overflow: hidden;
}
        </style>
</head>
<body>
    <div class="conatiner-fluid m-3 pt-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center">
    <div class="col-lg-6 col-x-5">
        <img src="../images/admin.jpg" alt="Admin Registration" class="img-fluid">
    </div>
    <div class="col-lg-6 col-x-4 ">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password again" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-dark text-light py-2 px-3" name="admin_registration" value="Register">
                <p class="text-bold mt-2 pt-1">Do already you have an account?<a href="admin_login.php" class="text-danger">Login</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>

<!--php code-->
<?php
if(isset($_POST['admin_registration'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$hash_password=password_hash($password,PASSWORD_DEFAULT);
$confirm_password=$_POST['confirm_password'];

//select_query
$select_query= "Select * from `admin_table` where admin_name='$username' or admin_email='$email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
   echo "<script>alert('Username or email already exist')</script>";
}else if($password!=$confirm_password){
   echo "<script>alert('Passwords do not match, try again!')</script>";
}

// insert_query
$insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values('$username', '$email' , '$hash_password')";
$sql_execute=mysqli_query($con,$insert_query);
}
?>