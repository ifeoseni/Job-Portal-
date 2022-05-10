<?php
include "../../home/head.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];
$accounttype = $_SESSION['accounttype'];

 $phone = $address = $state = $address = $dateofbirth = $picinfo =  ""; 
if($_SESSION['accounttype'] != ('individual' OR 'company') ){
    $update = "<h3 class='alert alert-warning text-center font-weight-bolder'>You do not have access to this dashboard at the moment, kindly login with the right credentials. </h3>";
    
   header("refresh:5;url=../../login.php");
}
$usertobefound = "";                             
if( isset($_GET['username']) ){
    $usertobefound = $_GET['username'];
}

if( isset($_GET['usernamegotten']) ){
    $usertobefound = $_GET['username'];
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
    Find information about user here
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
                  <h3> 
                  <?php 
                    if(!empty($usertobefound)){
                        echo "About ".$usertobefound;
                    }else{
                        echo "Find information about a user here";
                    } 
                    
                    ?>
                  
                  </h3>
                

                
              </div>
              <div class="card-body" style="padding-left:30px;padding-right:30px;">
                  <?php 
                  if(!empty($update)){
                      echo $update;
                  }
                  
                  if( empty($usertobefound) ){
                      echo "Find out information about an applicant or organization here. Just input the name in the search box below.";
                      echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'"  method="GET" class="text-center form-inline mb-2">';
                                // echo '<div class="form-group">';
                                    echo '<input type="text" placeholder="Enter the name here" name="username" class="form-control" style="width:80% !important;">';
                                    // echo '<div class="input-group-append">';
                                        echo '<button type="submit" name="usernamegotten" style="background:blue;display:inline;"><i class="fa fa-search text-white"></i></button>';
                                // echo '<div>';
                                // echo '</div>';

                           
                            
                            
                    echo '</form>';
                  }
                  
                  
                  ?>
                <div class="row"> 
                    <div class="col-12 " id="spacing"> 
                    
                        <?php 
                        $officialccounttype = "";
                    
                        
                        
                        $finduser = mysqli_query($conn,"SELECT * FROM users WHERE name='$usertobefound'");
                               

                        if (mysqli_num_rows($finduser) >0) {//here is to ensure no one uses another email address
                            while ($row = mysqli_fetch_assoc($finduser)) {
                                if($row['accounttype'] == 'individual'){
                                     $officialccounttype = "Applicant";
                                }if($row['accounttype'] == 'company'){
                                    $officialccounttype = "Company";
                                } 
                                
                             if(!empty($row['picture']))  {
                                 echo "<div class='text-center'>";
                                     echo "<img src='../userpicture/{$row['picture']}' class='img-fluid'>";
                                 echo "</div>";
                             }                        
                             
                            echo "<p>" .$officialccounttype. " name is <b>".$row['name']."</b>. ";
                            if((!empty($row['gender'])) AND (($row['accounttype']) == "individual") ){
                                 echo $row['name']. "is a ".$row['gender'];
                            }
                            if((!empty($row['gender'])) AND (($row['accounttype']) == "company") ){
                                 echo $row['name']. " account is being handled by a ".$row['gender'];
                            }
                            
                            echo ".</p>";
                            
                            echo "<p>Email address provided is ".$row['email']." and phone number is ".$row['phone'].".</p>";
                              
                            if(!empty($row['linktoonlinepresence'])){
                                 echo "<p> You can visit this ".$officialaccounttype. " online page by visiting this web link <a href='{$row['linktoonlinepresence']}'>".$row['linktoonlinepresence']."</a></p>";
                            }
                              
                            echo "<p>".$officialccounttype. " location is ".$row['address']." in ".$row['state']." state.</p>";
                            
                            if(!empty($row['userdocument'])){
                                 echo "<p> You can know more about the user by checking the document uploaded by the ".$officialaccounttype. "<a href='../document/{$row['userdocument']}'>here</a>"."</p>";
                            }
                              
                              
                             
                            
                         
                              

                            }

                       }
                        else{ 
                            if(!empty($usertobefound)){
                                 echo "<h4 class='alert alert-danger text-white text-center'>The name {$usertobefound} does not exist in our database. Please check that the name is correct</h4>";
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