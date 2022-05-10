<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo =  ""; 
if($_SESSION['accounttype'] != 'individual' ){
//     $update = "<h3 class='alert alert-warning text-center font-weight-bolder'>You do not have access to this dashboard. Only job applicants can have access to this page</h3>";
    
//   header("refresh:5;url=../../login.php");
    
    header("location: ../../login.php");
}
$id;                              
if(  isset($_GET['searchid']) ){
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
if( isset($_GET['id']) ){
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
$proposedsalary = $companyname = $title = $deadline = "";
$whyiamqualified = $qualification = $whyme = $mytopskills = $salaryiwant = $cviwanttouse = "";



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
                  
                <h3>Apply For Job</h3>

                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  <?php 
                  if(!empty($update)){
                      echo $update;
                  }
                  
                  ?>
                <div class="row"> 
                    <div class="col-12 " id="spacing"> 
                        <?php 
                        $jobsappliedto = mysqli_query($conn,"SELECT * FROM jobapplication  WHERE name='$name' AND email='$email'");
                                 $jobids  = array();
                                 $counter = 0;
                         if(mysqli_num_rows($jobsappliedto ) > 0) {
                             while($get = mysqli_fetch_assoc($jobsappliedto)){
                                $jobids [$counter] = $get['jobid']; 
                                $counter += 1; 
                             }
                         }
                         
                         
                         $appliedjobs = implode("', '",$jobids);
                        
                        
                        $viewjobdescription = mysqli_query($conn,"SELECT * FROM createdjobs  WHERE id = '$id' AND id NOT IN ('$appliedjobs') ");
                          
                        $alljobs =mysqli_num_rows( mysqli_query($conn,"SELECT * FROM createdjobs "));

                        if (mysqli_num_rows($viewjobdescription) === 1) {//here is to ensure no one uses another email address
                            while ($row = mysqli_fetch_assoc($viewjobdescription)) {
                                // echo "<h2>Job Posted by <br/>". $row['name']."</h2>";
                                $proposedsalary = $row['salary'];
                               
                                $title = $row['title'];
                                $deadline = $row['deadline']; 
                                $companyname = $row['name'];


                                echo "<p> You are applying for the position of ". $row['title']." at ".$row['name']."</p>";
                                
                                 echo '<form action="aboutuser.php"  method="GET" >';
                                
                                    echo "<p>Click ";
                                    echo "<a href='aboutuser.php?username={$row['name']}'>here</a>";
                                     echo " to know more about the organization</p>";
                                 echo '</form>';
                                 
                                
                                
                                // .$row['name']."
                                echo "<p>This role is a ".$row['level'].". The industry you will be working in is ".$row['industry'].". The organization proposed salary is <b>₦".number_format($row['salary'])."</b>. The organization desire that the applicant has <b>".$row['yearsofexperience']."</b> years of experience. The preferred candidate location is ".$row['preferredcandidatelocation'].". Please note that this job is ".$row['jobtype'].".</p>";
                                echo "<p>";
                                if($row['remotestatus'] == 'yes'){ 
                                    echo "This job is remote in nature";
                                }
                                if($row['remotestatus'] == 'no'){ 
                                    echo "This job is not remote in nature";
                                }
                                if(empty($row['remotestatus'])){ 
                                    echo "The remote state of this job is unknown as of now";
                                }
                                
                                echo "  </p>";
                                
                                echo "<p> Minimum Education Status Desired is ".$row['minimumqualification']."</p>";
                                
                                $contactemail = $row['contactemail'];
                                if (!empty($row['contactemail'])) {
                                    echo "<p>You can contact this email <a href='malito:$contactemail' class='text-info font-weight-bolder'>".$row['contactemail']." </a>for more information</p>";
                                }

                                $contactphone = $row['contactphone'];
                                if (!empty($row['contactphone'])) {
                                    echo "<p>You can call this number <a href='tel:$contactphone' class='text-primary font-weight-bolder'>".$row['contactphone']." </a>for more information</p>";
                                }
                               
                                if($row['deadline'] > date("Y-m-d")){
                                    echo "<p>Application Will Close On  ".date("l, d M Y",strtotime($row['deadline']))."</p>";
                                }else{
                                    echo "<p class='text-danger font-weight-bolder'>Please note that this job application has closed. Do not apply for this job anymore unless you have contacted the organization first. </p>";
                                }
                                 

                            }

                       }
                        else{ 
                            $checkifalreadyapplied = mysqli_query($conn,"SELECT * FROM createdjobs  WHERE id = '$id' AND id IN ('$appliedjobs') ");
                            if(mysqli_num_rows($checkifalreadyapplied) === 1){
                                echo "<p class='alert alert-warning text-center font-weight-bolder'>You have already applied for this role already. Kindly wait for a response.</p>";
                                 echo "<p class='text-info font-weight-bolder'>If you were redirected here after entering an ID previously, it means you have applied for a job with that ID. That means you should not enter the ID {$id} in the search box below again.</p>";
                            }else{
                                echo "<p class='alert alert-info font-weight-bolder'>Please enter the Job ID you want to apply for in the box below. Click <a href='availablejobs.php'>here</a> to see latest jobs </p>";
                                //   echo "<h4 class='alert font-weight-bolder text-white' style='background:black'>Job ID available are 1 to ".$alljobs."<h4>";
                            }
                            
                            
                           
                            
                         
                            echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'"  method="GET" class="text-center form-inline mb-2">';
                                // echo '<div class="form-group">';
                                    echo '<input type="number" placeholder="Enter Job ID here" name="id" class="form-control" style="width:80% !important;">';
                                    // echo '<div class="input-group-append">';
                                        echo '<button type="submit" name="searchid" style="background:blue;display:inline;"><i class="fa fa-search text-white"></i></button>';
                                // echo '<div>';
                                // echo '</div>';

                           
                            
                            
                            echo '</form>';
                            echo "<p>Job IDs you have applied to include <br/>";
                            for($m = 0; $m < $counter;$m++){
                               
                                if($m == ($counter-1)){
                                    echo "<b>".$jobids[$m]."</b>";
                                }else{
                                     echo "<b>".$jobids[$m]."</b>, ";
                                }
                               
                               
                            } 
                            echo ". Do not use or search for any of these Job IDs in the search box above because you have applied for jobs with those Job Ids already.</p>";
                        }
                        
                        

                       ?>


                    </div>
                </div><!--  end of row div  -->    
                <hr>
            
            
            
            <form action="submitapplication.php" method="post" enctype="multipart/form-data">
                    <!-- User's Credentials  -->
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 text-center">Your Biodata Include</legend>                     
                      
                
                
                        <div class="form-group">
                            <label for="username">Your Name</label>
                            <input type="text" name="name" readonly class="form-control-plaintext font-weight-bold text-success p-2" id="username" value="<?php echo $name; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="email" value="<?php echo $email; ?>">
                        </div>
                        <?php 
                        $phone = $dateofbirth = $state = $address= $userdocument ="";
                        $getapplicantprofile = mysqli_query($conn,"SELECT * FROM users  WHERE name = '$name' AND email = '$email' ");
                        if (mysqli_num_rows($getapplicantprofile) === 1) {//here is to ensure no one uses another email address
                            while ($row = mysqli_fetch_assoc($getapplicantprofile)) {
                                $phone = $row['phone']; 
                                $dateofbirth = $row['dateofbirth']; 
                                $state = $row['state']; 
                                $address = $row['address']; 
                                $userdocument = $row['userdocument']; 
                            }
                        }
                        
                        ?>
                        <div class="form-group">
                            <label for="dateofbirth">Your Were Born On </label>
                            <input type="date" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="dateofbirth" value="<?php echo $dateofbirth; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="phone">Your Phone Number Is </label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="phone" value="<?php echo $phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="state">Your Current State Of Residence Is</label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="state" value="<?php echo $state; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Your Home Address Is</label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="address" value="<?php echo $address; ?>">
                        </div>
                        
                        <?php 
                        if(!empty($userdocument)){
                            echo "<p>View your cv <a href='https://company.interviewstories.org/admin/document/$userdocument'>here</a></p>";
                            echo "<p>If you do not want to use this cv, please do update your profile by following the instructions below.</p>";
                        }
                        ?>
                        
                        
                        
                        <p>You can edit your information by clicking UPDATE YOUR PROFILE or <a href="https://company.interviewstories.org/admin/user/dashboard.php">here</a> to do so. </p>
                         
                    </fieldset>
                    <!-- User's Preferences  -->
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 text-center">Why Are You Applying For This Role</legend>
                       
                        <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Why Are You Qualified For This Job?</label>
                            <div class="col-md-12 border-bottom p-0 ">
                                <input type="text" name="whyiamqualified" placeholder="What experience do you have and what can you offer?"
                                    class="form-control p-2 border-0"   required value="<?php echo $whyiamqualified; ?>" >  
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Academic/Professional Qualification You Possess?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="qualification" placeholder="Please talk about relevant degree and certificates you possess that makes you a good fit for the company e.g BSC Computer Science, PMP." class="form-control p-2 border-0"  value="<?php echo $qualification; ?>"  required> 
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Why Should You Be Picked For This Job Role?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="whyme" placeholder="What makes you unique and standout from other applicants." class="form-control p-2 border-0" value="<?php echo $whyme; ?>"  required> 
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Top Skills You Have That Will Make You Perform The Job Well?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="mytopskills" placeholder="Use a comma to seperate your skills e.g Content Writing, Digital Marketing" class="form-control p-0 border-0"   required value="<?php echo $mytopskills; ?>" > 
                            </div>                         
                        </div> 
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">How Much Do You Expect To Be Paid In Naira If You Are Choosen For The Role?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number" name="salaryiwant" placeholder="Please note that this value can be negotiated by the company/organization you want to work for "
                                    class="form-control p-2 border-0" min="0" required="" value="<?php echo $salaryiwant; ?> > 
                                <small>The organization is proposing ₦<?php echo $proposedsalary; ?>. Propose your counter offer here or the least amount you can collect in the text box above.</small>
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Web Link To Your CV if you do not want to use the one you uploaded when updating your profile</label>
                            
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="cviwanttouse" placeholder="Kindly ensure you set the sharing link to public and you give the current web link with the web protocol e.g https://cv.com."
                                    class="form-control p-2 border-0" value="<?php echo $cviwanttouse; ?>"  > 
                            </div> 
                            <small class="font-weight-bolder text-dark">Leave this empty if you want to use the one you updated on the portal.</small>   
                            
                            
                        </div>
                        <input type="hidden" name="id" class="form-control p-0 border-0" value="<?php echo $id; ?>" required> 
                        <input type="hidden" name="companyname" class="form-control p-2 border-0" value="<?php echo $companyname; ?>" required>
                        <input type="hidden" name="title" class="form-control p-2 border-0" value="<?php echo $title; ?>" required>                                           
                        <input type="hidden" name="deadline" class="form-control p-2 border-0" value="<?php echo $deadline; ?>" required> 
                        <input type="hidden" name="proposedsalary" class="form-control p-0 border-0" value="<?php echo $proposedsalary; ?>" required> 
                        <input type="hidden" name="oldcv" class="form-control p-0 border-0" value="<?php echo $userdocument; ?>" required> 
                        
                        


    



                    </fieldset>
                    <!-- Submit Button  -->
                    <div class="form-group row text-right">
                        <div class="col">
                            <button class="btn btn-success btn-primary" type="submit" name="apply">Apply For This Role</button>
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