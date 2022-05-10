<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo = $onlinepresence = $gender =  ""; 
if($_SESSION['accounttype'] != ('company' OR 'individual') ){
    $update = "<h3 class='alert alert-warning text-center font-weight-bolder'>Please relax and login with your credentials to access this page. </h3>";
   
  header("refresh:5;url=../../login.php");
}

$getUserDetails = mysqli_query($conn,"SELECT * FROM users WHERE name='$name' AND email = '$email' ");
    if(mysqli_num_rows($getUserDetails) === 1){
        while ($row = mysqli_fetch_assoc($getUserDetails)) {
          
            $phone  = $row['phone'];
            $address  = $row['address'];
            $state = $row['state'];
            $dateofbirth = $row['dateofbirth'];
            $picinfo = $row['picture'];
            $gender = $row['gender'];
            $onlinepresence = $row['linktoonlinepresence'];
        }
    }

    if (isset($_POST['updateapplicant'])) {
        $phone = $_POST['phone'];
        $state = $_POST['state'];
        $address = $_POST['address'];
        $picture = $_FILES["picture"]["name"];
        $dateofbirth = $_POST['dateofbirth'];
        $onlinepresence =  $_POST['onlinepresence'];
        $gender = $_POST['gender'];
        // echo "<script>$picture.sss</script>";
        
        if(!empty($picture)){
            
            $updateuserwithpicture = mysqli_query($conn,"UPDATE users SET phone='$phone', state = '$state',  address='$address', picture ='$picture', dateofbirth='$dateofbirth', linktoonlinepresence= '$onlinepresence', gender='$gender'  WHERE name='$name' AND email='$email'");
            if($updateuserwithpicture ){
                move_uploaded_file($_FILES["picture"]["tmp_name"], "../userpicture/".$picture);
                $update = "<h4 class='alert alert-success'>You have updated your profile data including profile picture successfully</h4>";
            }else{
                $update = "<h4 class='alert alert-danger'>We could not update your profile with picture right now. Try updating your profile without picture right now and see if the update will take place</h4>";
            }
            
            
        }else{
             $updateuser = mysqli_query($conn,"UPDATE users SET phone='$phone', state = '$state',  address='$address',dateofbirth='$dateofbirth', linktoonlinepresence= '$onlinepresence',gender='$gender' WHERE name='$name' AND email='$email'");
            if ($updateuser) {
                $update = "<h4 class='alert alert-success'>Profile update was successful. You did not update your picture with this update</h4>"; 
            }else{
                $update = "<h4 class='alert alert-danger'>We could not update your profile now</h4>";
            }
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
    Welcome to the portal
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
                  
                  ?>
                  
                <h4 class="card-title"> Update your profile on this page</h4>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                

                <form class="form-horizontal form-material text-dark" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label class="col-md-12 p-1"><?php 
                      if ($_SESSION['accounttype'] == 'company') { echo "Your organization name is"; }
                      if ($_SESSION['accounttype'] == 'individual') { echo "Your name is"; } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="text" name="name" class="form-control p-3" value="<?php echo $name; ?>" required readonly> 
                          <small>You can not change your name. If your name is wrong, then kindly create another account with the right account details.</small>
                  </div>                         
              </div>
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1"><?php 
                      if ($_SESSION['accounttype'] == 'company') { echo "Your organization (representative) email address"; }
                      if ($_SESSION['accounttype'] == 'individual') { echo "Your email address is"; } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly required>
                          <small>Your email is permanent.</small>
                  </div>                         
              </div>
               <div class="form-group mb-4">
                  <label class="col-md-12 p-1"><?php 
                      if ($_SESSION['accounttype'] == 'company') { echo "Date your organization was established"; }
                      if ($_SESSION['accounttype'] == 'individual') { echo "Your date of birth"; } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="date" name="dateofbirth" class="form-control p-1 border-0" value="<?php echo $dateofbirth; ?>"   required> 
                  </div>                         
              </div>
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1">Your Phone Number Is</label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="number" name="phone" placeholder="Enter your phone number here. Ignore the country code"
                          class="form-control p-1 border-0" 
                          id="example-email"  min="7000000000" max="9099999999" value="<?php echo $phone; ?>" required >
                  </div>                         
              </div>
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1">Your Current City/State Location Is</label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="text" name="state"  
                          class="form-control p-1 border-0" value="<?php echo $state; ?>"   required> 
                  </div>                         
              </div>
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1"><?php 
                      if($_SESSION['accounttype'] == 'company'){ 
                          echo "Our office address is";
                      }
                      if($_SESSION['accounttype'] == 'individual'){ 
                          echo "Your home address is"; 
                      } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="text" name="address" placeholder="<?php 
                      if ($_SESSION['accounttype'] == 'company') { echo 'Enter your office address here'; }
                      if ($_SESSION['accounttype'] == 'individual') { echo 'Enter where you live here'; } ?>"
                          class="form-control p-1 border-0" value="<?php echo $address; ?>"  required> 
                  </div>                         
              </div> 
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1"><?php 
                      if($_SESSION['accounttype'] == 'company'){ 
                          echo "Is it a Male or Female that is handling this company account?";
                      }
                      if($_SESSION['accounttype'] == 'individual'){ 
                          echo "Please Enter Your Gender Below"; 
                      } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="text" name="gender" placeholder="<?php 
                      if ($_SESSION['accounttype'] == 'company') { echo 'Male or Female are the only options available here'; }
                      if ($_SESSION['accounttype'] == 'individual') { echo 'Male or Female are the only options available'; } ?>"
                          class="form-control p-1 border-0" value="<?php echo $gender; ?>"  > 
                  </div> 
                  <small>Values acceptable are <b>Male</b> and <b>Female</b></small>
              </div> 
              
              <div class="form-group mb-4">
                  <label class="col-md-12 p-1"><?php 
                      if($_SESSION['accounttype'] == 'company'){ 
                          echo "Our website address is ";
                      }
                      if($_SESSION['accounttype'] == 'individual'){ 
                          echo "Link to your online page or LinkedIn profile"; 
                      } 
                    ?></label>
                  <div class="col-md-12 border-bottom p-1">
                      <input type="text" name="onlinepresence" placeholder="<?php 
                      if ($_SESSION['accounttype'] == 'company') { echo 'Enter your website url with https:// e.g https://linkedin.com/'; }
                      if ($_SESSION['accounttype'] == 'individual') { echo 'Enter your profile url with https:// e.g https://linkedin.com/in/ifeoluwa-oseni'; } ?>"
                          class="form-control p-1 border-0" value="<?php echo $onlinepresence; ?>"  required> 
                  </div>                         
              </div> 
              <!--picture upload-->
              
                      
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="picture">
                      <label class="custom-file-label" for="customFile"><?php 
                      if($_SESSION['accounttype'] == 'company'){ 
                          echo "Upload/Update your company logo here";
                      }
                      if($_SESSION['accounttype'] == 'individual'){ 
                          echo "Upload/Update picture here"; 
                      } 
                    ?></label>
                    <small >
                    <?php 
                        if(!empty($picinfo)){
                            echo "<strong>You have uploaded a picture before. By selecting an image will change that picture. If you do not want to change your picture just leave that part blank</strong>";
                        }
                    
                    ?></small>
                    </div>
                      
                     
              <!-- end of picture segment-->
                
              <div class="form-group mb-4">
                  <div class="col-sm-12">
                      <button class="btn btn-success" type="submit" name="updateapplicant">Update Profile</button>
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
</body>

</html>