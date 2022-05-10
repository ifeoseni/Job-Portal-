 <?php

$report = "";
if(isset($_POST['emailsubscription'])){
      $name = $_POST['name'];
      $email = $_POST['email'];


      $checkemail = mysqli_query($conn,"SELECT * FROM emaillist WHERE email = '$email' ");//AND 
      if(mysqli_num_rows($checkemail) > 0) {
          $report = "<h3 class='alert alert-warning font-weight-bold'>You have subscribed to our newsletter already.</h3>"; 
      }else{
        

          $uploademail = mysqli_query($conn, "INSERT INTO emaillist(name,email) VALUES ('$name','$email') ");
          if ($uploademail) {
             
            // $sendemail = mail("ifeoseni@gmail.com","Someone just registered for the newsletter","The name is {$name} and the email is {$email}", "From: Admin"  );
            
            $_SESSION['from']="admin@interviewstories.org";//'ifeoseni@gmail.com', 'John Doe'
            $_SESSION['to']= "ifeoseni@gmail.com";
            $_SESSION['message']=  'Someone just registered for the newsletter';
            $_SESSION['body'] = '<h3>The name is '.$name.' </h3><p>The email is '.$email."</p>";
            //  include "mailer/php_mailer.php";//might ned to remove this
            
            
            //   $mail->setFrom = 'Admin <admin@interviewstories.org>';
            // $mail->addAddress = 'Ifeoluwa <ifeoseni@gmail.com>';
            // $mail->Subject = 'Someone just registered for the newsletter';
            // $mail->Body = 'The name is {$name} and the email is {$email}';
            // $headers = 'From: ' . $from;
 
//if (!mail($to, $subject, $message, $headers))

            $mail->send();
          

            $report=  "<h3 class='alert text-center alert-success'>You have successfully subscribed to our newsletter.</h3>"; 
                
          }else{
              $report ="<h3 class='alert text-center alert-danger'>We could not add your details to our newsletter database.</h3>";
          }
           
        
      }
}

 ?>

 <!-- ======= Footer ======= -->
<footer id="footer">
    
    <div class="footer-top">
      <div class="container">
        
        <div class="row">

          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 footer-info">
            <h3 class='text-md-left text-lg-left text-sm-center text-xs-center'>Uyo HR</h3>
            <p>We are an HR company dedicated in making organizations more productive. We help companies solve their HR, Recruitment and Staffing issues. Need a job, reach out to us. Have a job you need qualified staff to get, reach out to us as well.</p>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 footer-links">
            <h4 class="text-">Browse Our Website</h4>
            <ul>
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="login.php">Visit Our Job Portal</a></li>              
              <li><a href="services.php">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 bg-sm-info bg-xs-danger bg-md-success footer-contact">
            <h4>Contact Us</h4>
            <p>
              Hiltop Hotel, Etikre Nsukara <br>
              Uyo, Akwa Ibom<br>
              Nigeria <br>
              <strong>Phone:</strong> +234 817 546 1196<br>
              <strong>Email:</strong> ifeoseni@gmail.com<br>
            </p>

            

          </div>

          
       </div> <!-- end of row-->
       
       <div class="social-links text-center px-1 mx-1 my-1 py-1" >
              <a href="https://linkedin.com/in/ifeoluwaoseni/" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://linkedin.com/in/ifeoluwaoseni/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://linkedin.com/in/ifeoluwaoseni/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://linkedin.com/in/ifeoluwaoseni/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://linkedin.com/in/ifeoluwaoseni/" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
        
      </div>
    </div>

    <div class="container">
        
      <div class="copyright">
        &copy; Copyright <strong>Oseni HR</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
      -->
        Designed by <strong>ifeOseni</strong>
      </div>
    </div>
</footer><!-- End Footer -->
