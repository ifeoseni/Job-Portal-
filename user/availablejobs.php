<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo =  ""; 
if($_SESSION['accounttype'] != 'individual' ){
    $update = "<h3 class='alert alert-warning font-weight-bolder'>You do not have access to the dashboard. Only job applicants can have access to this page</h3>";
    
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
    Apply For Job
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
                  
                <h3>View  Available Jobs</h3>
                <h4>Please note the ID of every job you are interested in and you can also know more about it by clicking find job</h4>

                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                 
                <div class="row"> 
                    <div class="col-12 table-responsive"> 
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

                        $today = date('Y-m-d');
                        $availablejobs = mysqli_query($conn,"SELECT * FROM createdjobs  WHERE deadline >= '$today' AND id NOT IN ('$appliedjobs')");

                        if (mysqli_num_rows($availablejobs) > 0) {//here is to ensure no one uses another email address
                        ?>
                        <table class="table ">
                            <thead class="thead-light text-success font-weight-bolder">
                                <tr class="text-danger">
                                    <th class="border-top-0 ">S/N</th>
                                    <th class="border-top-0">Job Title</th>
                                    <th class="border-top-0">Job Posted By</th>
                                    <th class="border-top-0">Job Level</th> 
                                    <th class="border-top-0">Job Industry</th> 
                                    <th class="border-top-0">Proposed Salary</th> 
                                    <th class="border-top-0">Deadline</th> 
                                    <th class="border-top-0">View Job Descriptions</th>
                                    <th class="border-top-0">Apply For Job</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                 
                                while ($row = mysqli_fetch_assoc($availablejobs)) {
                                    $i++;
                                    $id =  $row['id'];
                                         
                                    ?>
                                <tr>

                                    <td> <?php echo $i; ?></td>
                                    <td> <?php echo $row['title']; ?></td>
                                    <td> 
                                    
                                      <form action="aboutuser.php"  method="GET" >
                                        <a href="aboutuser.php?username=<?php echo $row['name']; ?>" title='Find out more about the company'><?php echo $row['name']; ?>
                                        </a> 
                                    
                                        </form>
                                    
                                    </td>
                                    <td> <?php echo $row['level']; ?></td>
                                    <td> <?php echo $row['industry']; ?></td>
                                    <td> <?php echo $row['salary']; ?></td>
                                    <td>
                                    <?php 
                                    $future = $row['deadline'];
                                    $difference = abs(strtotime($future)) -abs(strtotime($today));
                                    echo $difference/(60*60*24) . " days";
                                    ?>
                                    
                                     
                                  
                                     </td>
                                    <td> <?php
                                        echo "<button class='btn btn-primary font-weight-bolder'><a href='fulljobdescription.php?id={$row['id']}&title={$row['title']}&deadline={$row['deadline']}' class='text-dark bg-warning'>View Full Job Description</a></button>";
                                    ?>
  

                                    </td>
                                     <td> <?php
                                        echo "<button class='btn btn-info text-dark font-weight-bolder'><a href='applyforjob.php?id={$row['id']}&title={$row['title']}&deadline={$row['deadline']}' class='text-dark bg-info'>Apply For This Job With ID $id</a></button>";
                                    ?>
  

                                    </td>
                                </tr>              
                                <?php
                                } 
                            }else{
                                    echo "<h3>There are no available jobs right now. More jobs coming soon</h3>";
                            } 
                            ?>
                            </tbody>
                        </table>


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