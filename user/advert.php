<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];
 
$aboutadvert = $adsheader = $adsdescription =  $adscontact =  $update = "";
if($_SESSION['accounttype'] != ('company' OR 'individual') ){
    $update = "<h3 class='alert alert-warning text-center font-weight-bolder'>Please relax and login with your credentials to access this page. </h3>";
   
  header("refresh:5;url=../../login.php");
}


if (isset($_POST['submitads'])){
        $aboutadvert = $_POST['aboutadvert'];
        $adsheader = $_POST['adsheader'];
        $adsdescription = $_POST['adsdescription'];
        $adscontact = $_POST['adscontact'];
        $adsimage = $_FILES["fileToUpload"]["name"];
        $dateapplied = date("d/m/Y");

    if(file_exists('ads/'.$_FILES["fileToUpload"]["name"])){
      $store = $_FILES["fileToUpload"]["name"];
      $update = "<h4 class='alert alert-info font-weight-bolder text-center'>Image already exists. \n  Rename your image and try uploading it if you are sure you are uploading the right image. <br/> Old image name is ".$store."</h4>";
      //echo "Bad boy";//header('location: ../index.php');
    }else{
      $checkads = mysqli_query($conn ,"SELECT * FROM ads WHERE name = '$name' AND aboutadvert = '$aboutadvert' AND adsheader= '$adsheader' AND adsdescription = '$adsdescription' AND dateapplied = '$dateapplied'");
      if(mysqli_num_rows($checkads) > 0 ){
        $update = "<h3 class='alert alert-info font-weight-bolder text-center'>You just submitted an ads like this. We have seen it. Kindly wait for us to contact you first.</h3>"; 
      }else{
         $submitads = mysqli_query($conn ,"INSERT INTO ads (aboutadvert,adsheader,adsdescription,adscontact,adsimage,name,email,dateapplied) VALUES ('$aboutadvert','$adsheader','$adsdescription','$adscontact','$adsimage','$name','$email','$dateapplied')");  
          if ($submitads){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "ads/".$_FILES["fileToUpload"]["name"]);//to upload images
             $update = "<h3 class='alert alert-success font-weight-bolder text-center'>You have submitted your ads to us. Kindly wait for a response </h3>"; 
          }else{ 
            $update = "<h3 class='alert alert-danger font-weight-bolder text-center'>We could not get your ads at this time.</h3>"; 
          }

        
      } 
            //echo "jjj";
     
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
    Advertise Here
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
              <div class="card-header">
                <?php 
                  if(!empty($update)){
                      echo $update;
                  }
                 
                  ?>
                  
                <h4 class="card-title"> Update your profile on this page</h4>
                
              </div>
              <div class="card-body">
                

              <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST" enctype="multipart/form-data" > 

                <div class="form-group">
                    <label class="">What Product Or Service Are You Advertising? <span class="text-danger">*</span></label>
                    <input type="text" name="aboutadvert" class="form-control" placeholder="What Product Are You Advertising Or Selling" value="<?php echo $aboutadvert; ?>" required>
                </div>

                <div class="form-group">
                    <label>What You Want People To See First In Your Advert <span class="text-danger">*</span> </label>
                    <input type="text" name="adsheader" class="form-control" placeholder="Your Ads Header" value="<?php echo $adsheader; ?>"  required>
                </div>

                <div class="form-group">
                    <label>Full Ads Description <span class="text-danger">*</span></label>
                    <textarea name="adsdescription" class="form-control" required value="<?php echo $adsdescription; ?>" >What Your Ads Is About. Please let it benefit job applicants. </textarea>
                </div>

                <div class="form-group">
                    <label>Contact of who is running the ads <span class="text-danger">*</span> </label>
                    <input type="text" name="adscontact" class="form-control" placeholder="How do you want to be contacted e.g via phone on 08175461196 and email via ifeoseni@gmail.com" value="<?php echo $adscontact; ?>"  required>
                </div>
                  
                <div class="form-group">
                    <label>Upload Relevant Ads Graphics</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>                                  
                </div>  
                <button type="submit" name="submitads" class="btn btn-primary btn-md">Submit Advert</button>       

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