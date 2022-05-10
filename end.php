<main id='main'>
    
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="clearfix">
      <div class="container" data-aos="fade-up">

        <header class="section-header text-center">
          <h3 class="section-title">Do you need skilled staff? Are you in need of a good job?</h3>
          <h4 class="section-title">Look no further. We are here to make the whole process simple for you.</h4>
          <p >Access Our Job Portal and get the right result you desire.</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 mb-1 mt-1">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active"><a href="register.php" style="color:white;text-decoration: none;">Create Your Account</a> </li>
              <li data-filter=".filter-app" style=" background-color: #00458f;"><a href="login.php" style="color:white;text-decoration: none;">Login To Your Account</a></li> 
            </ul>
          </div>
      </div>
    </div>
    </section>

      <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="section-bg">
      <div class="container" data-aso="zoom-in">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

          
                
                <?php
                
                $applicantstory = mysqli_query($conn,"SELECT * FROM users WHERE picture != '' AND testimonial !='' AND accounttype = 'individual' ");
             
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
                }
                
                ?>

                
 

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <!--<section id="team">-->
    <!--  <div class="container" data-aos="fade-up">-->
    <!--    <div class="section-header">-->
    <!--      <h3>Team</h3>-->
    <!--      <p>Meet the team behind this work</p>-->
    <!--    </div>-->

    <!--    <div class="row">-->

    <!--      <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">-->
    <!--        <div class="member">-->
    <!--          <img src="assets/img/team-1.jpg" class="img-fluid" alt="" >-->
    <!--          <div class="member-info">-->
    <!--            <div class="member-info-content">-->
    <!--              <h4>Daniel</h4>-->
    <!--              <span>Chief Executive Officer</span>-->
    <!--              <div class="social">-->
    <!--                <a href=""><i class="bi bi-twitter"></i></a>-->
    <!--                <a href=""><i class="bi bi-facebook"></i></a>-->
    <!--                <a href=""><i class="bi bi-instagram"></i></a>-->
    <!--                <a href=""><i class="bi bi-linkedin"></i></a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->

    <!--      <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="200">-->
    <!--        <div class="member">-->
    <!--          <img src="assets/img/team-2.jpg" class="img-fluid rounded-circle" alt="" style="height:250px !important">-->
    <!--          <div class="member-info">-->
    <!--            <div class="member-info-content">-->
    <!--              <h4>Dasola</h4>-->
    <!--              <span>Product Manager</span>-->
    <!--              <div class="social">-->
    <!--                <a href=""><i class="bi bi-twitter"></i></a>-->
    <!--                <a href=""><i class="bi bi-facebook"></i></a>-->
    <!--                <a href=""><i class="bi bi-instagram"></i></a>-->
    <!--                <a href=""><i class="bi bi-linkedin"></i></a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->

    <!--      <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="300">-->
    <!--        <div class="member">-->
    <!--          <img src="assets/img/team-3.jpg" class="img-fluid" alt="">-->
    <!--          <div class="member-info">-->
    <!--            <div class="member-info-content">-->
    <!--              <h4>Ridwan</h4>-->
    <!--              <span>CTO</span>-->
    <!--              <div class="social">-->
    <!--                <a href=""><i class="bi bi-twitter"></i></a>-->
    <!--                <a href=""><i class="bi bi-facebook"></i></a>-->
    <!--                <a href=""><i class="bi bi-instagram"></i></a>-->
    <!--                <a href=""><i class="bi bi-linkedin"></i></a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->

    <!--      <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="400">-->
    <!--        <div class="member">-->
    <!--          <img src="assets/img/team-4.jpg" class="img-fluid" alt="">-->
    <!--          <div class="member-info">-->
    <!--            <div class="member-info-content">-->
    <!--              <h4>Promise</h4>-->
    <!--              <span>Manager</span>-->
    <!--              <div class="social">-->
    <!--                <a href=""><i class="bi bi-twitter"></i></a>-->
    <!--                <a href=""><i class="bi bi-facebook"></i></a>-->
    <!--                <a href=""><i class="bi bi-instagram"></i></a>-->
    <!--                <a href=""><i class="bi bi-linkedin"></i></a>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->

    <!--    </div>-->

    <!--  </div>-->
    <!--</section>
    
    <!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header ">
          <h3 style='font-family:"Helvetica Neue", sans-serif'>Our Clients</h3>
          <p style='color: #252424;font-family: "Helvetica Neue", sans-serif'>Below are some of the organizations that use our platform</p>
        </div>

        <div class="row " data-aos="zoom-in" data-aos-delay="100">
            <div class='col-12 text-center'>
            
             <?php
                
                $companies = mysqli_query($conn,"SELECT * FROM users WHERE picture != '' AND testimonial !='' AND accounttype = 'company' ");
             
                if(mysqli_num_rows($companies) > 0) {
                  while ($row = mysqli_fetch_assoc($companies)) { 
                    // echo "<div class='col-3'>";
                    //   echo "<div class='client-logo'>";
                        echo '<img src="admin/userpicture/'.$row['picture'].'" alt="Company Logo Not Available" class="img-fluid" style="min-height:50px; max-height:100px;margin-left:10px" >';
                    //   echo "</div>";
                    // echo "</div>";
                  }
                }else{
                    // echo "<div class='col-lg-3 col-md-4 col-xs-6'>";
                      echo "<div class='client-logo'>";
                        echo '<img src="assets/img/clients/client-2.png" alt="Company Logo Not Available" class="img-fluid" >';
                      echo "</div>";
                    // echo "</div>";
                }
                
                ?>
            </div>


      

        </div>

      </div>

    </section><!-- End Clients Section -->

    
</main>