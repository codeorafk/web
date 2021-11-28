<?php include('../config/constants.php'); 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_guess WHERE username='$username";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            // $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            // $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            // header('location:'.view.'admin/';
            header("Location: /index.php");
            exit;

        }
        else
        {
            header("Location: /order.php");
            exit;
        }


    }

?>

<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../public/css/register-guess.css" rel="stylesheet">
</head>

<body>

<div class="container">
<div class="d-flex justify-content-center links" style="color: red;   font-weight: bold;">
    UI only, đừng kick bậy bạ!!
</div>
<div class="card bg-light" style="max-width: 800px; min-width:600px; margin:auto">
<!-- <article class="card-body mx-auto" style="max-width: 400px;"> -->
    <!-- ok -> -->
<!-- <article class="card-body text-center" style="min-width: 500 px; max-width: 800px;">  -->
    <!-- <- ok -->
<article class="card-body" style="max-width: 600px; min-width:450px; margin:auto">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light"><b>OR</span>
    </p>
    
	<form action="register-guess.php" method="POST" class="text-center">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="full_name" class="form-control" placeholder="Full name" type="text">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="email" class="form-control" placeholder="Email address" type="email">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <!-- <select class="custom-select" style="max-width: 120px;">
                <option selected="">+971</option>
                <option value="1">+972</option>
                <option value="2">+198</option>
                <option value="3">+701</option>
            </select> -->
            <input name="phone" class="form-control" placeholder="Phone number" type="text">
        </div> 
        <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa-solid fa-map-location-dot"></i> </span>
            </div>
            <input name="address" class="form-control" placeholder="Address" type="text">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa-solid fa-user-tag"></i> </span>
            </div>
            <input name="username" class="form-control" placeholder="User name" type="text">
        </div> <!-- form-group// -->
        
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Create password" type="password" name="password">
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Repeat password" type="password" name="password_re">
        </div> <!-- form-group// -->             

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
        </div> <!-- form-group// -->      
        <p class="text-center">Have an account? <a href="login-guess2.php">Log In</a> </p>                                                                 
    </form>
</article>  <!-- card-body.// -->
</div> <!-- card.// -->

</div> 
<!--container end.//-->


</body>

</html>
