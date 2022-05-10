<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login Here</title>
  </head>
  <body>
    <?php
$conn =new mysqli("localhost", "root","","sidegigs");

  if(!empty($_SESSION['name'])){
      echo "<script>".$_SESSION['name']."</script>";
  }  

$userlogindetail = $userpassword  = $userlogindetail = $name  = $loginStatus = $suggestOption = ""; // to prevent errors from popping up
$passwordError = "";

$emailReport = $nameReport = $passwordReport = $successReport = $errorMessage = ""; 

 //$nameErr = $emailErr = $phoneErr = $majorlocationErr = $addressErr = $industryErr = $passwordErr = $remotestatusErr = "";
 
if (isset($_POST['login']) ){
    
    $userlogindetail  = $_POST['userlogindetail'];
    $userpassword= $_POST['userpassword'];
    $checkDetails = mysqli_query($conn,"SELECT * FROM users WHERE (name ='$userlogindetail' OR email = '$userlogindetail') AND password ='".md5($userpassword)."' ");
   
    if (mysqli_num_rows($checkDetails) === 1) {  
        
        while ($row = mysqli_fetch_assoc($checkDetails) ){
                        
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['accounttype'] = $row['accounttype'];
            
            // $sendemail = mail("ifeoseni@gmail.com","Someone just logged in","Hi admin, <b>{$_SESSION['name']}</b> {$_SESSION['email']} just logged into the system. His account type is ", "From: Admin"  );
            // if($sendemail){
            //     $_SESSION['notification'] = "Welcome user";
            // }else{
            //     $_SESSION['notification'] = "Error";
            // }
            
            // $_SESSION['from']="admin@interviewstories.org";//'ifeoseni@gmail.com', 'John Doe'
            // $_SESSION['to']=   "ifeoseni@gmail.com";
            // $_SESSION['message']=  $_SESSION['name'].' just logged into his/her account';
            // $_SESSION['body'] = 'Monitor progress';
            

            // $mail->send();
            
            // echo "<script>alert('login successful')<script>";
            
        }
        echo "<script>window.location.href='admin/user/dashboard.php';</script>";
        //$loginStatus = "loggedin";
    }else{
        $loginStatus = "<h3 class='alert alert-danger font-weight-bolder text-center'>User details not correct. Kindly check your login details and login with the right one if you have an account with us.</h3>";
    }
            
    
}//end if isset


?> 
    <!-- ======= Header ======= -->
  <?php include "home/navbar.php";  

    if (!empty($loginStatus)) {
      echo $loginStatus;
    }
  ?>


  <div class="container">
    <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style='max-width:600px;margin:auto'>
    <h1 class='text-center font-weight-bolder text-dark'>Login Here</h1>
    <h3  class='text-center font-weight-bolder text-dark'>If you were redirected here, it is because you are not logged in to your account already. Kindly do so here.</h3>
    <p  class='text-center font-weight-bolder text-dark'>Please fill in your details to login into your account.</p>
    <hr>


    <label for="logindetail"><b>Enter your email address or your name </b></label>
    <input type="text" placeholder="Enter your name or email address here" name="userlogindetail"  value="<?php echo $userlogindetail; ?>" required>
                                                

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="userpassword" value="<?php echo $userpassword; ?>" required>
    <button type="submit" class="login loginbtn" name="login">Login</button>
    <p class='text-center'>Do not have an account? <a href="register.php">Register</a>.</p>
    </form> 
  </div>

    







 <?php include "home/footer.php"; ?>
 <?php include "home/js.php"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




<html lang="en">

<head>
    
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="nigeria,internship in nigeria,nysc jobs in nigeria,jobs for entry level in nigeria">
    <meta name="description"
        content="Nigeria Internship helps students and NYSC get good placements in the country">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->


   <link href="././css/style.min.css" rel="stylesheet">
 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" integrity="sha384-tKLJeE1ALTUwtXlaGjJYM3sejfssWdAaWR2s97axw4xkiAdMzQjtOjgcyw0Y50KU" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">



  <title>Login Page</title> 
 
  <style type="text/css">
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=number]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.loginbtn {
  background-color: red;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.loginbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.login {
  background-color: green;
  text-align: center;
}
  </style>
</head>

<body>

  

</body>

</html>