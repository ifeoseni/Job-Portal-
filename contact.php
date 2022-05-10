<?php 
include "home/head.php";

$contactmessagereport = "";

 if(isset($_POST['messageus'])){
      $contactname = $_POST['contactname'];
      $contactemail = $_POST['contactemail'];
      $contactphone = $_POST['contactphone'];
      $messagesubject  = $_POST['messagesubject'];
      $message  = $_POST['message']; 
      $date = date("d/m/Y");
    
         $checkmessage = mysqli_query($conn, "SELECT * FROM messageus WHERE contactname = '$contactname' AND contactemail = '$contactemail' AND messagesubject = '$messagesubject' AND message = '$message' AND contactphone = '$contactphone'  ");
          if(mysqli_num_rows($checkmessage) > 0) {

            $contactmessagereport = "<h3 class='alert alert-info text-center font-weight-bold'>You have sent that message to us before. We will attend to it shortly. </h3>";
          }else{
            $sendmessage = mysqli_query($conn, "INSERT INTO messageus(contactname,contactemail,contactphone,messagesubject,message,datemessaged) VALUES ('$contactname','$contactemail','$contactphone','$messagesubject','$message','$date') ");
            if ($sendmessage) {
              $contactmessagereport = "<h3 class='alert alert-success text-center font-weight-bold'>You have successfully sent your message to us.</h3>"; 
            }else{
              $contactmessagereport  ="<h3 class='alert alert-danger text-danger text-center font-weight-bold'>We could not send the message at the moment. Please try again later or send it to us via email at ifeoseni@gmail.com.</h3>";
            }  
        }        
      
    }
    include "home/head.php";
 ?> 

  <title>Contact Us Page</title>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "home/navbar.php"; ?>
    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0"> 
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31796.01216631759!2d7.926602399999999!3d5.022085699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1623862677769!5m2!1sen!2sng" style="border:4px solid rgb(13, 110, 253); width: 100%; height: 340px;" allowfullscreen alt="Kindly reload this page to see the content here" ></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-5 info">
                <i class="bi bi-geo-alt"></i>
                <p>Hiltop Hotel, Etipiri Nsukkara</p>
              </div>
              <div class="col-md-4 info">
                <i class="bi bi-envelope"></i>
                <p>ifeoseni@gmail.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="bi bi-phone"></i>
                <p title="Call me">+234 817 546 1196</p>
              </div>
            </div>

            <div class="form">
            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" ><!--  action="forms/contact.php" method="post" role="form" class="php-email-form"> -->
              <legend class="text-center text-primary font-weight-bold">Send Us A Message</legend>
              <div class="row">

                <div class="form-group mt-3 mb-3">
                <input type="text" class="form-control" name="contactname" id="name" placeholder="Please enter your name here" required>
                </div>

                <div class="col-md-6 form-group mb-sm-1 order-2">
                  <input type="number" name="contactphone" class="form-control" id="contactphone" placeholder="Your phone number" required>
                </div>
                <div class="col-md-6 form-group mb-sm-1 order-1 ">
                  <input type="email" class="form-control" name="contactemail" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="messagesubject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea> 
              </div>
        
              <div class="text-center" style="margin: 10px;"><button name="messageus" type="submit" class="bg-primary btn btn-md text-white font-weight-bold" style="border-radius:25px">Send Message</button></div>
               <?php if(!empty($contactmessagereport)){ echo $contactmessagereport; } ?>


            </form>


            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->



 <?php include "home/footer.php"; ?>
 <?php include "home/js.php"; ?>

</body>

</html>