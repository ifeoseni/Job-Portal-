<?php include "home/head.php"; ?>

  <title>Home |  Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
        .inline{   
            /*display: inline-block;   */
            float: right;    
            margin: auto !important;  
        }   
         
         
  
    .pagination {   
        /*display: inline-block;   */
        /*background:red;*/
        
        
        margin: auto !important;  
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;      
        text-decoration: none;   
        border:1px solid black; 
        
        margin: auto !important; 
        padding: 5px !important;
        font-size:10px !important;
    }   
    .pagination a.active {   
            background-color: blue;  
            padding: 5px !important;
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;  
        padding: 5px !important;
    }   
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "home/navbar.php"; ?>
  
  <?php include "others.php"; ?>
  
  
    <h3 class='text-center font-weight-bolder text-dark mt-1 mb-1'>See Some Of The Recent Job Posted On Our Job Portal</h3>
    <p class='text-center'>You can apply by registering <a href='register.php'>here</a> or login <a href='login.php'>here</a></p>
<?php
      if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
      }else {
        $page_no = 1;
      }

      $today = date('Y-m-d');
      $total_records_per_page = 4;
      $offset = ($page_no-1) * $total_records_per_page;
      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;
      $adjacents = "2"; 

      $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM createdjobs WHERE deadline > '$today'");
      $total_records = mysqli_fetch_array($result_count);
      $total_records = $total_records['total_records'];
      $total_no_of_pages = ceil($total_records / $total_records_per_page);
      $second_last = $total_no_of_pages - 1; // total page minus 1

    

    
      $result = mysqli_query($conn,"SELECT * FROM createdjobs WHERE deadline >= '$today' 
      ORDER BY deadline ASC LIMIT $offset, $total_records_per_page ");//WHERE deadline > date('Y m d');");
      $i = 100;
    echo '<div class="container">';
        echo '<div class="row" >';
        if(mysqli_num_rows($result) > 0 ) {
       
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<div class='card-deck'>";
                echo "<div class='card' style='background-color:white;margin-bottom:10px;border: 1px solid rgb(0, 74, 153);padding-bottom:10px;'>";
                
                
                    $cname =$row['name'];
                    $getpicture = mysqli_query($conn,"SELECT picture FROM users WHERE name='$cname' AND picture != ''"); 
                    
                    echo '<div class="row">';
                        echo '<div class="col-md-4 col-lg-3 col-sm-12 col-xs-12">';
                           echo '<img src="admin/userpicture/'.mysqli_fetch_assoc($getpicture)['picture'].'" alt="Image unavailable" class="img-fluid img-circle mx-auto my-auto" style="max-height:120px;width:auto">'; 
                        echo '</div>';
                          
                        echo '<div class="col-md-6 col-lg-7 col-sm-12 col-xs-12 my-auto px-auto">';
                            echo "<p style=''><strong>".$row['name']." </strong>needs a/an ". $row['title']."</p>";
                            echo "<p><i>Proposed Salary is</i> <strong>₦".number_format($row['salary'])."</strong><br/>Available Vacancy: <strong>".$row['availablevacancy']."</strong><br/><strong> Offer open till ".date("l d M Y",strtotime($row['deadline']))." </strong></p>";
                            $jobid = $row['id'];
                            
                        
                        echo '</div>';
                        
                        echo '<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12 my-auto text-center ">';
                             echo "<button style='' class='btn btn-primary text-center'><a href='admin/user/applyforjob.php?id={$row['id']}&title={$row['title']}'  class='text-white bg-primary display-7 '>Apply Now</a></button> ";
                        echo '</div>';
                    echo '</div>';
                    
                    
                   
                       
                         
                       
                          
                
                    
                 echo "</div>";//for card
                    
                echo "</div>";
                $i+=100;
            }
               
        } 
        echo "</div>";
    echo "</div>";

    ?>
 
<div class='container'>
    <div class='row'>
        <div class='col-12 text-center mx-auto my-auto mb-3 text-primary font-weight-bolder' style="display:flex;justify-content: center;align-items: center;">
            <ul class="pagination" >
              <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
                
              <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
              <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
              </li>
                   
                <?php 
              if ($total_no_of_pages <= 10){     
                for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                  if ($counter == $page_no) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
                    }
              }
              elseif($total_no_of_pages > 10){
                
              if($page_no <= 4) {     
               for ($counter = 1; $counter < 8; $counter++){     
                  if ($counter == $page_no) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
                    }
                echo "<li><a>...</a></li>";
                echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                }
            
               elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
                echo "<li><a href='?page_no=1'>1</a></li>";
                echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
                       if ($counter == $page_no) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }                  
                   }
                   echo "<li><a>...</a></li>";
                 echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                 echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                        }
                
                else {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
            
                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                      if ($counter == $page_no) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }                   
                            }
                        }
              }
            ?>
                
              <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
              <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
              </li>
                <?php if($page_no < $total_no_of_pages){
                echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
            </ul>
        </div>
    </div>   
</div>


<!--end of pagination-->



   
<?php include "end.php"; ?>
<!--<?php include "anonymous.php"; ?>-->




<div class="container-fluid">
    <div class="row font-weight-bolder text-center" style="background:#0b6bd3;color:white;">

        <h4 class="">Our Newsletter</h4>
        <p class="">We know the importance of communication. We will love to send you some useful emails to you. Please tell us your name and give us your email address below.</p>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
           <div class="row" >
              <div class="col-md-5 col-sm-12 col-lg-5">
                  <input type="text" name="name" placeholder="Enter your name here" class="form-control" required><br/>
              </div>
              <div class="col-md-5 col-sm-12 col-lg-5">
                  <input type="email" name="email" class="form-control" placeholder="Enter your email address here" required>
              </div>                  
              <div class="col-md-2 col-sm-12 col-lg-2  text-center ">
                  <button name="emailsubscription" type="submit"  class="btn btn-dark text-white btn-block" >Subscribe</button><br>
              </div>
           </div>

         
        </form>
         <?php if (!empty($report)) {
           echo $report;
         }  ?>

      

      
    </div>
</div>  
 <?php include "home/footer.php"; ?>
 <?php include "home/js.php"; ?>

</body>

</html>