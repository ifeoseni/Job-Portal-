<h3 class='text-center font-weight-bolder text-dark mt-1 mb-1'>View Anonymous Jobs Posted By Other Users</h3>
    
<?php
      if (isset($_GET['page_no1']) && $_GET['page_no1']!="") {
        $page_no1 = $_GET['page_no1'];
      }else {
        $page_no1 = 1;
      }

      $total_records1_per_page1 = 4;
      $offset1 = ($page_no1-1) * $total_records1_per_page1;
      $previous_page1 = $page_no1 - 1;
      $next_page1 = $page_no1 + 1;
      $adjacent = "2"; 

      $result_count1 = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM anonymousjobs WHERE deadline > '$today'");
      $total_records1 = mysqli_fetch_array($result_count1);
      $total_records1 = $total_records1['total_records'];
      $total_no_of_pages1 = ceil($total_records1 / $total_records1_per_page1);
      $second_last1 = $total_no_of_pages1 - 1; // total page minus 1

    

    
      $anonymous= mysqli_query($conn,"SELECT * FROM anonymousjobs WHERE deadline >= '$today' 
      ORDER BY deadline ASC LIMIT $offset1, $total_records1_per_page1 ");//WHERE deadline > date('Y m d');");
      $i = 100;
    echo '<div class="container">';
        echo '<div class="row" >';
        if(mysqli_num_rows($anonymous) > 0 ) {
       
            while ($row = mysqli_fetch_assoc($anonymous)) {
                
                echo "<div class='col-md-2 col-lg-3 col-sm-3 col-xs-6' height='auto !important' style='margin-bottom:20px !important;'>";
                echo "<div class='card' style='border:1px solid #ebebeb;background-color:#f5f5f5;'>";
                
                    if($row['jobposter']  != ''){
                         echo '<img src="admin/jobposter/'.$row['jobposter'].'" alt="Image unavailable" class="img-fluid mx-auto" style="min-height:50px;max-height:120px;width:auto;display:block">'; 
                    }
                    
                    // $picture1 = mysqli_fetch_assoc($anonymouspicture)['jobposter'];
                   
                       
                    //   '<img src="admin/userpicture/'.mysqli_fetch_assoc($getpicture)['picture'].'"
                         
                       
                          
                    
                    echo "<p style='margin-left:50px;'><strong>".$row['companyname']." </strong>needs a/an ". $row['title']."<br/><i>Proposed Salary is</i> <strong>₦".number_format($row['salary'])."</strong><br/>Available Vacancy: <strong>".$row['availablevacancy']."</strong><br/><strong> Offer open till ".date("l d M Y",strtotime($row['deadline']))." </strong></p>";
                    $jobid = $row['id'];
                    echo "<div class='text-center'>";
                    echo "<button style='margin-bottom:10px;' class='btn btn-primary'><a href='admin/applyforjob.php?id={$row['id']}&title={$row['title']}&description={$row['description']}'  class='text-white bg-primary display-7 '>Apply Now</a></button> ";
                    echo "</div>";
                    
                 echo "</div>";//for card
                    
                echo "</div>";
                $i+=100;
            }
               
        } 
        echo "</div>";
    echo "</div>";

    ?>
 
<div class='container'>
    <div class='row' >
        <div class='col-12 text-center mx-auto my-auto mb-3 text-primary font-weight-bolder' style="display:flex;justify-content: center;align-items: center;">
            <ul class="pagination" width='70% !important;' style='font-size:10px !important;'>
              <?php // if($page_no1 > 1){ echo "<li><a href='?page_no1=1'>First Page</a></li>"; } ?>
                
              <li <?php if($page_no1 <= 1){ echo "class='disabled'"; } ?>>
              <a <?php if($page_no1 > 1){ echo "href='?page_no1=$previous_page'"; } ?>>Previous</a>
              </li>
                   
                <?php 
              if ($total_no_of_pages1 <= 10){     
                for ($counter = 1; $counter <= $total_no_of_pages1; $counter++){
                  if ($counter == $page_no1) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no1=$counter'>$counter</a></li>";
                    }
                    }
              }
              elseif($total_no_of_pages1 > 10){
                
              if($page_no1 <= 4) {     
               for ($counter = 1; $counter < 8; $counter++){     
                  if ($counter == $page_no1) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no1=$counter'>$counter</a></li>";
                    }
                    }
                echo "<li><a>...</a></li>";
                echo "<li><a href='?page_no1=$second_last1'>$second_last1</a></li>";
                echo "<li><a href='?page_no1=$total_no_of_pages1'>$total_no_of_pages1</a></li>";
                }
            
               elseif($page_no1 > 4 && $page_no1 < $total_no_of_pages1 - 4) {     
                echo "<li><a href='?page_no1=1'>1</a></li>";
                echo "<li><a href='?page_no1=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for ($counter = $page_no1 - $adjacent; $counter <= $page_no1 + $adjacent; $counter++) {     
                       if ($counter == $page_no1) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no1=$counter'>$counter</a></li>";
                    }                  
                   }
                   echo "<li><a>...</a></li>";
                 echo "<li><a href='?page_no1=$second_last1'>$second_last1</a></li>";
                 echo "<li><a href='?page_no1=$total_no_of_pages1'>$total_no_of_pages1</a></li>";      
                        }
                
                else {
                    echo "<li><a href='?page_no1=1'>1</a></li>";
                echo "<li><a href='?page_no1=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
            
                    for ($counter = $total_no_of_pages1 - 6; $counter <= $total_no_of_pages1; $counter++) {
                      if ($counter == $page_no1) {
                   echo "<li class='active'><a>$counter</a></li>";  
                    }else{
                       echo "<li><a href='?page_no1=$counter'>$counter</a></li>";
                    }                   
                            }
                        }
              }
            ?>
                
              <li <?php if($page_no1 >= $total_no_of_pages1){ echo "class='disabled'"; } ?>>
              <a <?php if($page_no1 < $total_no_of_pages1) { echo "href='?page_no1=$next_page1'"; } ?>>Next</a>
              </li>
                <?php if($page_no1 < $total_no_of_pages1){
                echo "<li><a href='?page_no1=$total_no_of_pages1'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
            </ul>
        </div>
    </div>   
</div>

