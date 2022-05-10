<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo = $report = "";
  $title = $description 	= 	$level 	=	$industry 	=	$salary 	=	$yearsofexperience 	=	$availablevacancy  =	$minimumqualification 	=	$jobtype =	$preferredcandidatelocation 	= 	$remotestatus = $contactemail 	= 	$contactphone 	=	$deadline=  "";
if( ($_SESSION['accounttype'] != 'company')  ){
    $report = "<h3 class='alert alert-danger font-weight-bolder text-center'>This page is for organizations only.</h3>";
   header("refresh:5;url=../../login.php");
}

if (isset($_POST['createjob'])) { 
    $name =  $_POST['name'];
    $email =  $_POST['email'];
	$title = $_POST['title'];
	$description 	= $_POST['description'];
	$level 	= $_POST['level'];
	$industry 	= $_POST['industry'];
	$salary 	= $_POST['salary'];
	$yearsofexperience 	= $_POST['yearsofexperience'];
	$availablevacancy 	= $_POST['availablevacancy'];
	$minimumqualification 	= $_POST['minimumqualification'];
	 
	$jobtype 	= $_POST['jobtype'];
	$preferredcandidatelocation 	= $_POST['preferredcandidatelocation'];
	if(empty($preferredcandidatelocation)){
	    $preferredcandidatelocation = "All states are desired";
	}
	$remotestatus = $_POST['remotestaus'];
	$contactemail 	= $_POST['contactemail'];
	$contactphone 	= $_POST['contactphone'];
	$deadline= $_POST['deadline'];


    $check = mysqli_query($conn,"SELECT * FROM createdjobs WHERE name = '$name' AND email = '$email' AND title = '$title' AND description = '$description' AND deadline = '$deadline'  ");//AND 
    if(mysqli_num_rows($check) > 0) {
        $report = "<span class='text-dark'>You have posted this  before. </span>"; 
    }else{
        $upload = mysqli_query($conn, "INSERT INTO createdjobs(name,email,title,description,level,industry,salary,yearsofexperience,availablevacancy,minimumqualification,jobtype,preferredcandidatelocation,remotestatus,contactemail,contactphone,deadline) VALUES ('$name','$email','$title','$description','$level','$industry','$salary','$yearsofexperience','$availablevacancy','$minimumqualification','$jobtype','$preferredcandidatelocation','$remotestatus','$contactemail','$contactphone','$deadline') ");
        if ($upload) {
            $report = "<span class='alert alert-success font-weight-bolder text-center'>You have successfully posted a job. </span>"; 
        }else{
            $report ="<span class='alert alert-info font-weight-bolder text-center'>We are sorry you could not create that job post at the moment right now.</span>";
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="padding-left:30px !important;padding-right:30px !important">
                  <?php 
                  if(!empty($report)){
                      echo $report;
                  }
                  
                  ?>
                  
                <h4 class="card-title"> About Job Information</h4>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  
<form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="row">
    

         
        <div class="col-12">
                                    
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Your company name</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="name" value="<?php echo $name; ?>"                                  class="form-control p-0 border-0" required readonly> 
                         
                 </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Your company email</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type='email' name="email" value="<?php echo $email; ?>"                                 class="form-control p-0 border-0" required readonly> 
                         
                 </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Job Title</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="title" placeholder="e.g Project Manager"
                        class="form-control p-0 border-0" required> 
                         
                 </div>
            </div>
            <div class="form-group mb-4">
                <label for="example-email" class="col-md-12 p-0">Job Description</label>
                <div class="col-md-12 border-bottom p-0">
                    <textarea name="description" class="form-control" required >Please give the full job description here</textarea>
                </div>
            </div> 
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Job Level</label>
                <select class="form-select form-select-sm shadow-none p-0 border-0 form-control-line" name="level" required>
                    <option disabled selected>Choose the job entry level below.</option>
                    <option value="Entry Level">Entry Level</option>
                    <option value="Mid Level">Mid Level</option>
                    <option value="Internship">Internship</option> 
                    <option value="Contract">Contract</option>                                            
                    <option value="Executive">Executive</option>                                                                                                  
                </select> 
            </div>

           
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Industry</label>
                 <input type="text" name="industry" placeholder="Enter the industry the person will be working in"
                        class="form-control p-0 border-0" min="0" required="">
                
            </div>
            
             <div class="form-group mb-4">
                <label class="col-md-12 p-0">Salary</label>
                 <input type="number" name="salary" placeholder="Enter how much you are willing to pay in Naira per month here"
                        class="form-control p-0 border-0" min="0" required="">
                <small>If you are looking for volunteers, kindly enter 0 </small>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Years of Job Experience Required </label>
                <input type="number" name="yearsofexperience" placeholder="Please enter number of years required"
                        class="form-control p-0 border-0" min="0" required> 
            </div>
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Available Vacancies</label>
                 <input type="number" name="availablevacancy" placeholder="Please enter number of people you want to hire here"
                        class="form-control p-0 border-0" min="1" required> 
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Minimum Education Qualificaton </label>
                <input type="radio" name="minimumqualification" value="SSCE">
                <label>SSCE</label><br>
                <input type="radio" name="minimumqualification" value="College Degree">
                <label>College Degree</label><br>                                 
                <input type="radio" name="minimumqualification" value="Masters">
                <label>Masters</label><br>
                <input type="radio" name="minimumqualification" value="PhD">                                                
                <label>PhD</label><br>                                        
                    
            </div>
              
            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Is Job Paid? (Please choose the best fit amongst the following four.</label>
                <div class="col-md-12 border-bottom p-0">                                            
                    <select class="form-select form-select-lgr" style="color:#000066;" name="jobtype" required="">

                        <option value="paidjob">It is a paid job</option>
                        <option value="paidinternship">It is an internship with some pay</option>                                                 
                        <option value="unpaidinternship">It is an internship without any pay</option>                                                
                        <option value="volunteeringjob">It is a volunteering role with no pay</option>                                                 
                    </select>
                </div>  
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Prefered Candidate Location (State)</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="preferredcandidatelocation" class="form-control p-0 border-0">
                    <select id="state" name="state" class="form-select form-select-sm"  required="" style="color:#000066;">
                        <option disabled selected>Choose your state here</option>
                        <option value="Abuja Fct">Abuja Fct</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nassarawa">Nassarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                    </select>
                </div>
            </div>


            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Can the desired candidate work remotely?</label>
                <div class="col-md-12 border-bottom p-0">                                            
                    <select class="form-select shadow-none p-0 border-0 form-control-line" name="remotestatus" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>                                                
                    </select>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="col-md-12 p-0">Send Application To Which Email Address Or Apply Via Which Web Link?</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="text" name="applicationlink" placeholder="Leave this blank if you want the applicant to apply on this portal"
                        class="form-control p-0 border-0"  >
                </div>
            </div>
         
         
            <div class="form-group mb-4">
                <label class="col-sm-12">Contact Phone Number</label>
                <div class="col-sm-12 border-bottom">
                    <input type="text" name="contactphone" placeholder="Leave blank if you do not want to be contacted by candidates"
                        class="form-control p-0 border-0" >
                </div>
            </div>
            <div class="form-group mb-4">
                <label class="col-sm-12">Contact Email</label>
                <div class="col-sm-12 border-bottom">
                    <input type="email" name="contactemail" placeholder="Leave blank if you do not want to be contacted by candidates"
                        class="form-control p-0 border-0">
                </div>
            </div>


             <div class="form-group mb-4">
                <label class="col-md-12 p-0">When will this job application close?</label>
                <div class="col-md-12 border-bottom p-0">
                    <input type="date" name="deadline"  
                        class="form-control p-0 border-0" required="">
                </div>
            </div>


            <div class="form-group mb-4">
                <div class="col-sm-12">
                    <button class="btn btn-success" type="submit" name="createjob">Create Job Advert</button>
                </div>
            </div>
                    
                
        </div>
        <!-- Column -->
    </div>
                <!-- Row -->
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