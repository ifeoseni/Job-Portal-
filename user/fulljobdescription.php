<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo = $company=  ""; 
if($_SESSION['accounttype'] != 'individual' ){
    $update = "<h3 class='alert alert-warning font-weight-bolder text-center'>You do not have access to this page.</h3>";
   header("refresh:5;url=../../login.php");
}
                                    
if( (empty($_GET['id'])) ){
    echo "<script>alert('You did not select any job previously. Kindly do so to view the job description.  ')</script>";     
   
    header("refresh:1;url= https://company.interviewstories.org/admin/user/avaialablejobs.php");
}else{    
    $id = $_GET['id'];
    $title= $_GET['title'];
    $deadline= $_GET['deadline'];
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
      /*#spacing h3{*/
      /*   line-height: 1em !important;*/
      /*}*/
      /*#spacing h4{*/
      /*   line-height: 0.8em !important;*/
      /*}*/
      /*#spacing p{*/
      /*   line-height: 0.4em !important;*/
      /*}*/
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
                  
                  ?>
                <h3>Job Full Description</h3>

                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  
                <div class="row"> 
                    <div class="col-12 " id="spacing"> 
                        <?php 
                        $viewjobdescription = mysqli_query($conn,"SELECT * FROM createdjobs  WHERE id = '$id' AND title = '$title' AND deadline = '$deadline'");

                        if (mysqli_num_rows($viewjobdescription) === 1) {//here is to ensure no one uses another email address
                            while ($row = mysqli_fetch_assoc($viewjobdescription)) {
                                $company = $row['name'];
                                echo "<h2>Job Posted by <br/>". $row['name']."</h2>";
                                echo "<h3> Job title: ". $row['title']."</h3>";
                                echo "<h4><u>Job Full Description </u></h4>";
                                    echo "<p>".$row['description']."</p>";
                                
                                echo "<h4> Job Level : ".$row['level']."</h4>";
                                echo "<h4>Job Industry : ".$row['industry']."</h4>";
                                echo "<h4>Proposed Salary is ₦".$row['salary']."</h4>";
                                echo "<p> Desired Years Of Experience Needed ".$row['yearsofexperience']."</p>";
                                echo "<p>Avaialable Vacancy ".$row['availablevacancy']."<p>";
                                
                                echo "<p> Minimum Education Status Desired".$row['minimumqualification']."</p>";
                                echo "<h4> Job Type </h4>";
                                    echo "<p>".$row['jobtype']."</p>";
                                echo "<h4> Preferred Candidate Location </h4>";
                                echo "<p>".$row['preferredcandidatelocation']."</p>";
                                echo "<h4> Remote Status  </h4>";
                                 echo "<p>".$row['remotestatus']."</p>";

                                $applicationlink = $row['applicationline'];
                                if (!empty($row['applicationline'])) {
                                    echo "<p>You can also apply at <a href='https://$applicationlink'>".$row['applicationline']."</a></p>";
                                }
                                $contactemail = $row['contactemail'];
                                if (!empty($row['contactemail'])) {
                                    echo "<p>You can ccontact this email <a href='malito:$contactemail'>".$row['contactemail']." </a>for more information</p>";
                                }

                                $contactphone = $row['contactphone'];
                                if (!empty($row['contactphone'])) {
                                    echo "<p>You can call this number <a href='tel:$contactphone'>".$row['contactphone']." </a>for more information</p>";
                                }
                               

                                 echo "<h4>Application Will Close On  ".date("l, d M Y",strtotime($row['deadline']))."</h4>";

                            }

                       }

                       ?>


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