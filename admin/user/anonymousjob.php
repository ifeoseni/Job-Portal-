<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $cname = $report = "";
  $title = $description 	= 	$level 	=	$industry 	=	$salary 	=	$yearsofexperience 	=	$availablevacancy  =	$minimumqualification 	=	$jobtype =	$preferredcandidatelocation 	= 	$remotestatus 	=	$deadline= $picture = "";
if( ($_SESSION['accounttype'] != ('company' OR 'individual') )  ){
    $report = "<h3 class='alert alert-danger font-weight-bolder text-center'>This page is only for registered users.</h3>";
   header("refresh:5;url=../../login.php");
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
    Post Job Anonymously
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
              <div class="card-header"style="padding-left:30px !important;padding-right:30px !important">
                 
                  
                <h4 class="card-title"  style="padding:auto !important"> View Jobs Posted By Anonymous People</h4>
                 <?php 
                  if(!empty($report)){
                      echo $report;
                  }
                  
                  ?>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  
    <div class="row" style='background-color:#1a1aff '>
    

         
        <!--<div class="col-12">-->
            <!--<div class="card">-->
            <!--    <div class="card-body">-->
                <?php
                $today = date('Y-m-d');
                $findjob = mysqli_query($conn,"SELECT * FROM anonymousjobs WHERE deadline >= '$today'");//AND 
                 
                if(mysqli_num_rows($findjob) > 0) {
                   $i = 0;
                    while($job = mysqli_fetch_assoc($findjob)){
                        $i++;
                        echo '<div class="col-md-6 col-lg-6 col-xs-12">';
                            
                            echo "<div class='card'>";
                                echo "<h5 class='text-center ' style=''>Anonymous Job ".$i."</h5>";
                                echo "<p><strong>Please note that some of the information provided by the anonymous person may not be correct.</strong></p>";
                                
                                echo "<div class='card-header' style='margin-bottom:0px !important;padding-bottom:0px !important;'>";
                                    
  
                                    echo "<h3 class='card-title'>Job Title: ".ucfirst($job['title'])."</h3>";
                                    echo "<h4>Company Name: ".ucfirst($job['companyname'])."</h4>";
                                    echo "<h4><strong style='padding-right:10px !important;'>Available Vacancy: </strong>".$job['availablevacancy']."</strong></h4>";
                                    echo "<h5>Job Level".$job['level']."</strong>"."</h5>";
                                    echo "<h5><i>Industry: </i>".ucfirst($job['industry'])."</h5>";
                                    
                                echo "</div>";
                                echo "<div class='card-body' style='padding:0px !important;margin:0px !important;'>";
                                if(!empty($job['jobposter'])){
                                        $jobposter = $job['jobposter'];
                                        echo "<img src='../jobposter/$jobposter' class='card-img-top' alt='Hi picture'>";
                                 }
                                    
                                    echo "<h4>Job Description: </h4>";
                                    echo "<p>".ucfirst($job['description'])."</p>";
                                if($job['preferredcandidatelocation'] != "Not stated"){
                                    echo "<p>The company is looking forward to working with people based in".$job['preferredcandidatelocation']."</p>";
                                }else{
                                    echo "<p>The company is looking forward to working with Nigerians. Location was not given. </p>";
                                }
                                    
                                     
                                echo "</div>";
                                echo "<div class='card-footer'>";
                                    echo "<p>";
                                    if($job['yearsofexperience'] == 1){ 
                                        echo "It seems the organization wants someone with a year experience or less than that. ";
                                    }else{
                                        echo "The organization wants someone with ".ucfirst($job['companyname'])." years of experience. ";
                                    }
                                    
                                    if($job['salary'] == 0){ 
                                        echo "It seems the anonymous job poster does not know how much the organization is proposing to pay. ";
                                    }else{
                                        echo "The organization wants to pay ₦".number_format($job['salary'])." for the role. ";
                                    }
                                     
                                    echo "The expected minimum educational qualification is <strong>".$job['minimumqualification']."</strong>";
                                    
                                    if(!empty($job['remotestatus'])  ){ 
                                        echo "Is the job remote? ".ucfirst($job['remotestatus']);
                                    }
                                    
                                    echo "</p>";
                                    
                                    echo "<p>Application Deadline is <strong>".date("l d M Y",strtotime($job['deadline']))."<strong></p>";
                                    
                                    if( strpos($job['applicationlink'], "@") !== false  ){ 
                                        $useremail = $job['applicationlink'];
                                        echo "<p>Email to apply and send cv to is <a href='malito:$useremail' class='text-primary font-weight-bold'>".$useremail."</a></p>" ;
                                    }else{
                                        $website = $job['applicationlink'];
                                        if( (strpos($job['applicationlink'], "//") !== false  ) ){
                                            
                                            echo "<p>Web url to apply for the job is  <a href='$website' class='text-primary font-weight-bold'>".$website."</a></p>" ;
                                        }else{
                                            $url = "https://".$website;
                                             echo "<p>Web url to apply for the job is  <a href='$url' class='text-primary font-weight-bold'>".$website."</a>" ;
                                        }
                                    }
                                    
                                    
                                    
                                echo "</div>";
                              
                                
                            echo "</div>";
                        echo '</div>';
                    }
                    
                }
                
                ?>
                           	
                    
            <!--    </div>-->
            <!--</div>-->
        <!--</div>-->
        <!-- Column -->
    </div>
                <!-- Row -->

              

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