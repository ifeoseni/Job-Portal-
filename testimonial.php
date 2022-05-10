t<?php include "home/head.php"; ?>

  <title>Home Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
</head>


<body>

  <!-- ======= Header ======= -->
  <?php include "home/navbar.php"; ?>


 <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="section-bg">
      <div class="container" data-aso="zoom-in">

       
        



         <header class="section-header">
          <h3> Read What Some Of Our Partner Organizations Have To Say About Our Platform</h3>
        </header>
        <div class="row justify-content-center"><!-- begin company review -->          
          <div class="col-lg-8">
            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <?php


                $applicantstory = mysqli_query($conn,"SELECT * FROM users WHERE accounttype = 'individual' AND testimonial !='' ");
             
                if(mysqli_num_rows($applicantstory) > 0) {
                  while ($row = mysqli_fetch_assoc($applicantstory)) { 
                    echo '<div class="swiper-slide">';
                      echo '<div class="testimonial-item">';
                        echo '<img src="admin/userpicture/'.$row['picture'].'" alt="Applicant Image Not Available" class="testimonial-img" >';
                        echo "<h3>".$row['name']."</h3>";
                       echo "<h4>".$row['aboutuser']."</h4>";
                        echo "<p>".$row['testimonial']."</p>";
                      echo '</div>';
                    echo '</div>';
                  }
                }else{
                     echo '<div class="swiper-slide">';
                      echo '<div class="testimonial-item">';
                        
                        echo "<p> We just launched the website. No job applicant has given a testimonial yet. </p>";
                      echo '</div>';
                    echo '</div>';
                }

                ?>
                
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
         </div><!-- end of company review -->


        <header class="section-header" style="padding-top:30px;">
          <h3> Read What Some Of Our Applicants Have To Say About Our Platform</h3>
        </header>
        <div class="row justify-content-center">

          <div class="col-lg-8">            
            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <?php


                $companyreview = mysqli_query($conn,"SELECT * FROM users WHERE accounttype = 'company' AND testimonial !='' ");
             
                if(mysqli_num_rows($companyreview) > 0) {
                  while ($review = mysqli_fetch_assoc($companyreview)) { 
                    echo '<div class="swiper-slide">';
                      echo '<div class="testimonial-item">';
                        echo '<img src="admin/userpicture/'.$review['picture'].'" alt="Applicant Image Not Available" class="testimonial-img" >';
                        echo "<h3>".$review['name']."</h3>";
                       echo "<h4>".$row['aboutuser']."</h4>";
                        echo "<p>".$review['testimonial']."</p>";
                      echo '</div>';
                    echo '</div>';
                  }
                }else{
                     echo '<div class="swiper-slide">';
                      echo '<div class="testimonial-item">';
                        
                        echo "<p> We just launched the website. We are working towards getting a positive review from our partner organizations. </p>";
                      echo '</div>';
                    echo '</div>';
                }

                ?>
                
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


 <?php include "home/footer.php"; ?>
 <?php include "home/js.php"; ?>

</body>

</html>