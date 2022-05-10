<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];
$update1 = $update = "";
if( ($_SESSION['accounttype'] != 'company')  ){
    $update1 = "<h3 class='alert alert-danger text-center font-weight-bolder'>You do not have access to the dashboard.</h3>";

   header("refresh:5;url=../../login.php");
}
$id = $jobid  = $hrresponse = $update = "";
if(!empty($_GET['id']) ){
     $id = $_GET['id'];
     $jobid = $_GET['jobid']; 
     
}
if(isset($_GET['submitresponse'])){
    $response  = $_GET['response'];
    $hrresponse = $_GET['hrresponse'];
    
     $id = $_GET['id'];
     $jobid = $_GET['jobid']; 
     
     if(empty($response) OR empty($hrresponse)){
         $update = "<h4 class='text-warning font-weight-bolder'>You have either not selected an option or given the reason why you selected that option</h4>";
     }
    
    
    // echo $response. $hrresponse;
    
    $sendresponse = mysqli_query($conn,"UPDATE jobapplication SET response = '$response', reasongiven ='$hrresponse' WHERE id = '$id' AND jobid = '$jobid' ");
    if($sendresponse){
        $update = "<p class='text-success font-weight-bolder'>You have sent your response to the applicant</p>";
    }else{
        $update = "<p class='text-danger font-weight-bolder'>Your response could not be sent. Please try again.</p>";   
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
  <style>
  th{
  font-size:15px !important;
  }
  table{
    width:100%;
  }
  </style>
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
                  if(!empty($update1)){
                      echo $update1;
                  }
                  if(!empty($update)){
                      echo $update;
                  }
                  ?>
                  
                <h3>Decide Applicant Fate</h3>

              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  
                <div class="row"> 
                    <div class="col-12"> 
                    <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                     <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Status Of Applicant Application</label>
                        <select required name="response" class="form-select form-select-md font-weight-bold" style="color:#000066;">
                            <option disabled selected>Please let the applicant know his application status by selecting any other option below.</option>>
                          <option value="Accepted">Accepted</option>
                          <option value="Rejected">Rejected</option>
                          <option value="Undecided">Undecided</option>
                          <option value="Underreview">Underreview</option>
                          <option value="We will contact you soon">We will contact you soon</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Send Applicant A Reason For This Decision Of Yours Or What Is Expected Of Him To Do</label>
                        
                        <input type="text" placeholder="This message will be visible to applicant" class="form-control" name="hrresponse" value="<?php echo $hrresponse; ?>"  required >
                        <input type="hidden" name="jobid" value="<?php echo $jobid; ?>"  required >
                        <input type="hidden" name="id" value="<?php echo $id; ?>"  required >
                    </div>
                      
                        <button type="submit" class="btn btn-info text-dark font-weight-bolder" name="submitresponse">Decide Applicant Fate</button>
                      </div>
                    </form> 

                      


                    </div>
                </div><!--  end of row div  -->            

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