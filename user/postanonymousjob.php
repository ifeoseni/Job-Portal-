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

if (isset($_POST['postanonymously'])) { 
    $cname =  $_POST['cname'];
    $email =  $_POST['email'];//this is to identify who posted the job on our portal
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
	$remotestatus = $_POST['remotestaus'];
	$deadline= $_POST['deadline'];
	$picture = $_FILES["picture"]["name"];
	
	if(empty($preferredcandidatelocation)){
	    $preferredcandidatelocation = "Not stated.";
	}
	if(empty($cname)){
	    $cname = "No company name";
	}
	
	 
  	 

    $check = mysqli_query($conn,"SELECT * FROM anonymousjobs WHERE  jobposteremail = '$email' AND title = '$title' AND description = '$description' AND companyname = '$cname'  ");//AND  AND deadline = '$deadline'
    if(mysqli_num_rows($check) > 0) {
        $report = "<h3 class='alert alert-info font-weight-bolder'>You or someone else have posted this job anonymously before. </h3>"; 
    }else{
        
        $upload = mysqli_query($conn, "INSERT INTO anonymousjobs(companyname,jobposteremail,title,description,jobposter,level,industry,salary,yearsofexperience,availablevacancy,minimumqualification,jobtype,preferredcandidatelocation,remotestatus,deadline) VALUES ('$cname','$email','$title','$description','$picture','$level','$industry','$salary','$yearsofexperience','$availablevacancy','$minimumqualification','$jobtype','$preferredcandidatelocation','$remotestatus','$deadline') ");
            if(!empty($picture)){
                 move_uploaded_file($_FILES["picture"]["tmp_name"], "../jobposter/".$picture);
            }else{
                $report = "<h3>No picture of file was uploaded with this anonymous job.</h3>";
            }
            
        if ($upload) {
            $report = "<h3 class='alert alert-success font-weight-bolder text-center'>You have successfully posted a job anonymously. </h3>"; 
        }else{
            $report ="<h3 class='alert alert-info font-weight-bolder text-center'>We are sorry you could not post that job anonymously at the moment. Please try again later.</h3>";
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
                 
                  
                <h4 class="card-title"> Post Job Anonymous</h4>
                 <?php 
                  if(!empty($report)){
                      echo $report;
                  }
                  
                  ?>
                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  
<form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
    

         
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                      
                                    
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-1">Name Of The Organization/Company</label>
                            <div class="col-md-12">
                                <input type="text" name="cname" value="<?php echo $cname; ?>" class="form-control" > 
                                     
                             </div>
                             <small>Please type the company name in the box above, if you do not know the name you can enter company description. Leave the box blank if you do not have any of these details.</small>
                        </div>
                        
                        <div class="form-group mb-4">
                            <!--<label class="col-md-12 p-1">Your company email</label>-->
                            <div class="col-md-12">
                                <input type='hidden' name="email" value="<?php echo $email; ?>"                                 class="form-control" required readonly>
                                <!--//this part is to help us identify the person that posted the job-->
                                     
                             </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Job Title</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="title" placeholder="e.g Project Manager" value="<?php echo $title; ?>"  
                                    class="form-control p-0 border-0" required> 
                                     
                             </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Job Description</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea name="description" class="form-control" value="<?php echo $description; ?>" required >Please give the full job description here</textarea>
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
                             <input type="text" name="industry" placeholder="Enter the industry the person that will be selected for the job to be posted will work in"  value="<?php echo $industry; ?>"
                                    class="form-control p-0 border-0" min="0" required="">
                            
                        </div>
                        
                         <div class="form-group mb-4">
                            <label class="col-md-12 p-0">How Much Does does the organization want to pay in Naira</label>
                             <input type="number" name="salary" placeholder="Enter how much you heard the organization is willing to pay successful applicant." value="<?php echo $salary; ?>"
                                    class="form-control p-0 border-0" min="0" required="">
                            <small>If you are do not know, kindly enter 0 </small>
                        </div>
                         
  
                        
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">How many years of experience do you think the job require </label>
                            <input type="number" name="yearsofexperience" placeholder="Please number of years required"  value="<?php echo $yearsofexperience; ?>"
                                    class="form-control p-0 border-0" min="0" required> 
                            <small>If you are do not know, kindly enter 0 </small>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Available Vacancies</label>
                             <input type="number" name="availablevacancy" placeholder="Please enter number of people you think the company want to hire here" value="<?php echo $availablevacancy; ?>"
                                    class="form-control p-0 border-0" min="1" required> 
                            <small>If you are do not know, kindly enter 1 </small>
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
                             <small>If you are do not know, kindly enter select SSCE </small>
                                
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
                                    <option disabled selected>Choose desired state here</option>
                                     <option value="Nationwide">Entire Nigeria</option>
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
                            <label class="col-md-12 p-0">Do you think the desired candidate can work remotely?</label>
                            <div class="col-md-12 border-bottom p-0">                                            
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="remotestatus" required>
                                    <option disabled selected>Select remote status here</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>                                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Where (email or website full link) should applicants send their job info or request to?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="applicationlink"  value="<?php echo $availablevacancy; ?>" placeholder="Leave this blank if you want the applicant to apply on this portal"
                                    class="form-control p-0 border-0"  >
                                     <small>Please add the web protocol e.g http://, https:// with the website full link</small>
                            </div>
                        </div>

                         <div class="form-group mb-4">
                            <label class="col-md-12 p-0">When will this job application close?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="date" name="deadline"  
                                    class="form-control p-0 border-0" >
                                <strong>Please pick a date you think the application will close. This will help applicants apply early for the job.</strong>
                            </div>
                        </div>
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="picture">
                          <label class="custom-file-label" for="customFile">Upload multimedia about the job here</label>
                        <small>If you do not have the job flier or job description file,you can still post this job anonymously
                       </small>
                        </div>


                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit" name="postanonymously">Post Job Anonymously</button>
                            </div>
                        </div>
                        <strong>Please note that people will not be able to apply for this job on this job portal. To do so, create a company account and then create a normal job post on our job portal.</strong>
                    
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