<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

$notification = ""; 
if($_SESSION['accounttype'] != ('company' OR 'individual') ){
    $update = "<h3 class='alert alert-warning text-center font-weight-bolder'>You do not have access to the dashboard. Login with the right credentials. </h3>";
   
  header("refresh:5;url=../../login.php");
}

    if (isset($_POST['updatepassword'])) {
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];
        // echo "<script>$picture.sss</script>";
        
        
        if($password === $cpassword){
            $getUser =  mysqli_query($conn,"SELECT * FROM users WHERE  email = '$email' AND password ='".md5($oldpassword)."' ");
            if (mysqli_num_rows($getUser) > 0){
                $updatePassword =  mysqli_query($conn,"UPDATE users SET password ='".md5($password)."' WHERE email = '$email'  "); 
                if($updatePassword){
                    $notification = "<h4 class='alert alert-success font-weight-bolder text-center'>Password has been successfully updated.</h4>";
                }else{
                    $notification = "<h4 class='alert alert-danger font-weight-bolder text-center'>We could not update your password at the moment. Kindly try again later.</h4>";
                }
            }
        }else{
            $notification = "<h4 class='alert alert-danger font-weight-bolder  text-center'>New Password does not match. Kindly use a password you can always remember.</h4>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <style>
    form i {
        margin-left: -30px !important;
        cursor: pointer;
    }
    input[type=password]{
        display:inline !important;
    }
    input[type=text]{
        display:inline !important;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">

      <?php include "sidebar.php"; ?>

    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <?php include "topbar.php"; ?>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="padding-left:30px !important;padding-right:30px !important">
                <?php 
                  if(!empty($update)){
                      echo $update;
                  }
                  echo  $_SESSION['notification'];
                  ?>
                  
                <h4 class="card-title"> Change Password</h4>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                <?php
                    if(!empty($notification)){ 
                       echo $notification;
                    }
                ?>
                    

                <form class="form-horizontal form-material text-dark" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group mb-4">
                    <label class="col-md-12 p-1 font-weight-bolder">Enter your current password
                  <div class="col-md-12 border-bottom p-1">
                      <input type="password" name="oldpassword" class="form-control"  required  id="oldpassword" > 
                        <i class="bi bi-eye-slash" id="oldtogglePassword"></i>
                  </div>                         
              </div>
            <div class="form-group mb-4">
                    <label class="col-md-12 p-1 font-weight-bolder">Enter new password
                  <div class="col-md-12 border-bottom p-1">
                      <input type="password" name="password" class="form-control p-3"  required id="password" > 
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                  </div>                         
              </div>
              <div class="form-group mb-4">
                    <label class="col-md-12 p-1 font-weight-bolder">Confirm new password
                  <div class="col-md-12 border-bottom p-1">
                      <input type="password" name="cpassword" class="form-control p-3"  required id="cpassword" > 
                        <i class="bi bi-eye-slash" id="ctogglePassword"></i>
                      <input type="hidden" name="email" class="form-control" value="<?php echo $email; ?>"  >
                  </div>                         
              </div>
            
              
                     
              <!-- end of picture segment-->
                
              <div class="form-group mb-4">
                  <div class="col-sm-12">
                      <button class="btn btn-success" type="submit" name="updatepassword">Change Password</button>
                  </div>
                </div>
        </form>
              
              

              </div>
            </div>
          </div>
           
          </div>
        </div>
      </div>
      <?php include "dashboard-footer.php"; ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');
      togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    });
    
    const oldtogglePassword = document.querySelector('#oldtogglePassword');
      const oldpassword = document.querySelector('#oldpassword');
      oldtogglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = oldpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    oldpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    });
    
     const ctogglePassword = document.querySelector('#ctogglePassword');
      const cpassword = document.querySelector('#cpassword');
      ctogglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    });
  </script>
</body>

</html>