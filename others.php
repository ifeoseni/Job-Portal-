  <style>
      .member img{
          /*height:60px !important;*/
      }
  </style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/hero-img.svg" alt="" class="img-fluid">
      </div>

      <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">
        <h2 class='text-white'>We have the<br><span class='text-info'>solutions</span><br>to your HR problems!</h2>
        <h3 class='text-white'>Are you looking for a job or the right talent(s) to hire for your organization<span class='font-weight-bolder '>?</span></h3>
           
        <div>
          <a href="about.php" class="btn-get-started scrollto">Get Started</a>
          <a href="services.php" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
   <!-- End About Section -->

    

    <!-- ======= Why Us Section ======= -->
    <section id="why-us">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h3>Why choose us?</h3>
          <p>We know how important HR is to the success of your organization and we do not want you to fail.</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="100">
              <i class="bi bi-calendar4-week"></i>
              <div class="card-body">
                <h5 class="card-title">We love corporate</h5>
                <p class="card-text">We do not go casual when we should be corporate. We give you the best services and do not joke with the quality you get from us.</p>
                <!--<a href="#" class="readmore">Read more </a>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="200">
              <i class="bi bi-camera-reels"></i>
              <div class="card-body">
                <h5 class="card-title">We help grow your organization</h5>
                <p class="card-text">Organizations only grow when everyone is interested in the growth of the company and that of his or her fellow individual.</p>
                <!--<a href="#" class="readmore">Read more </a>-->
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="300">
              <i class="bi bi-chat-square-text"></i>
              <div class="card-body">
                <h5 class="card-title">We have the experience</h5>
                <p class="card-text">Our top 3 management staff have more than 20+ years experience combined together doing </p>
                <!--<a href="#" class="readmore">Read more </a>-->
              </div>
            </div>
          </div>

        </div>

        <div class="row counters" data-aos="fade-up" data-aos-delay="100">
            <?php
                $users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users")) ;//232
                $applicants = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE accounttype ='individual'")) ;//1364
                $createdjobs = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM createdjobs")) ;
                  $anonymousjobs = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM anonymousjobs")) ;//1364
             
            
            ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $users; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Users</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $applicants;//421 ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Job Applicants</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $createdjobs; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Number Of Jobs Posted By Our Partners</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $anonymousjobs; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p>Anonymous Jobs Posted</p>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

  

  </main><!-- End #main -->