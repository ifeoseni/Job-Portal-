<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];
$report = "";

if( $_SESSION['accounttype'] != ('company' OR 'individual') ){
    $report = "<h3  class='alert alert-warning text-center font-weight-bolder'>You do not have access to the dashboard.</h3>";
   header("refresh:5;url=../../login.php");
}

if (isset($_POST['uploaddocument'])) {
    $filename = $_FILES['documentToUpload']['name'];
    $destination = "../userpicture/".$filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
         // the physical file on a temporary uploads directory on the server
    $file = $_FILES['documentToUpload']['tmp_name'];
    $size = $_FILES['documentToUpload']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['documentToUpload']['size'] > 2000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large! Your document should not be more than 2MB";
    } else {
        // move the uploaded (temporary) file to the specified destination
        $searchuser =  mysqli_query($conn,"SELECT * FROM users WHERE name = '$name' AND email = '$email' ");
        
             move_uploaded_file($file, $destination);
            if (mysqli_num_rows($searchuser) > 0) {
               
                 $updatedocument =  mysqli_query($conn,"UPDATE users SET  userdocument = '$filename' WHERE name = '$name' AND  email = '$email'");
                    if ($updatedocument) {
                        echo "<script>alert('You have just updated your document in our database. Document successfully upload.')</script>";
                    }else {
                        echo "<script>alert('We found it difficult to update your document in our database at the moment.')</script>";
                    }
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
        <div class="card">
              <div class="card-header"  style="padding-left:30px !important;padding-right:30px !important">
                  
                  <?php  if(!empty($report)){echo $report; $report ="";} ?>
                <h4 class="card-title" > Upload your document on this page</h4>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                <?php 

                    $finddocument =  mysqli_query($conn,"SELECT * FROM users WHERE name = '$name' AND email = '$email' AND userdocument != '' ");
                    if (mysqli_num_rows($finddocument) > 0) {
                        while ($row = mysqli_fetch_assoc($finddocument) ) {
                            echo "<p class='text-dark'><strong>You have uploaded a cv with the name {$row['userdocument']} previously. To change your current cv, upload it below</strong></p>";
                        }
                    }else{
                        echo "<p class='text-dark'><strong>Please upload a document for the first time .</strong></p>";
                    }      
                ?>
              <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-12"> 
                    <h5>
                      <?php 
                      if ($_SESSION['accounttype'] == 'company') { echo "Upload Your company document here"; }
                      if ($_SESSION['accounttype'] == 'individual') { echo "Upload Your CV here"; }

                      ?> 
                    </h5>  
                    <input type="file" class="form-control" name="documentToUpload" id="documentToUpload" required>
                    <button type="submit"  name="uploaddocument" class=" text-center btn btn-sm border-rounded" style='background:blue;color:white'>Upload Document</button>
                    
                    <p class='text-center'><i>Note: After selecting the file, click upload document above to upload your document</i></p>

                       
                  </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
              </form>

              
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