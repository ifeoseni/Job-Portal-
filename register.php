<?php
include "home/head.php";
$name = $email = $phone = $state = ""; // to prevent errors from popping up
$passwordError = "";
$emailReport = $nameReport = $passwordReport = $successReport = $errorMessage = ""; 
 //$nameErr = $emailErr = $phoneErr = $majorlocationErr = $addressErr = $industryErr = $passwordErr = $remotestatusErr = "";
 
          if (isset($_POST['register']) ){
            $name  = $_POST['name'];
            $accounttype= $_POST['accounttype'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $state = $_POST['state']; 

            $password = $_POST['password'];
            $cpassword = $_POST['cpassword']; 

            if(empty($accounttype)){
              $errorMessage = "<h3 class='alert text-center alert-info'>Please select a company account or an individual account.</h3>";
            }else{


              if(empty($state)){
                $errorMessage = "<h3 class='alert text-center alert-info'>Please choose a state</h3>";
              }else{
                if ($password === $cpassword) {
                  $checkEmail = mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");
                  if(mysqli_num_rows($checkEmail) > 0) {//here is to ensure no one uses another email address
                    $emailReport = "<h3 class='alert text-center alert-danger'>This email is in use. Kindly create an account with another email or login <a href='login.php'>here</a></h3>";
                    $issuewithemail = mail( "ifeoseni@gmail.com","Hi, {$email} is trying to create another account","Kindly monitor situation", "From: {$email}"  );
                            
         
                             if( $issuewithemail == true ) {
                                echo "<script>alert('Message sent successfully...')</script>";
                             }else {
                                echo "<script>alert('Message could not be sent...')</script>";
                             }
                  }else{
                    $checkName = mysqli_query($conn,"SELECT * FROM users WHERE name ='$name'");
                    if (mysqli_num_rows($checkName) > 0) {//here is to ensure no one uses another email address
                      $nameReport = "<h3 class='alert text-center alert-danger'>Someone is using that username. Please choose another username</h3>";
                    }else{
                      $checkPassword = mysqli_query($conn,"SELECT * FROM users WHERE password ='".md5($password)."' ");
                       if (mysqli_num_rows($checkPassword) > 0) {//here is to ensure no one uses another email address
                        $passwordReport = "<h3 class='alert text-center alert-danger'>That password is too common. Kindly change it to ensure you are security compliant with our system.</h3>";
                        }else{
                          $insertUser = mysqli_query($conn,"INSERT INTO users(name,accounttype,email,phone,state,password) values('".$name."','".$accounttype."','".$email."','".$phone."','".$state."','".md5($password)."')"); 

                          if($insertUser){
                            $_SESSION['login'] = true;$_SESSION['name'] = $name;  $_SESSION['email'] = $email; $_SESSION['accounttype'] = $accounttype;
                            $newuser = mail( "ifeoseni@gmail.com","Hi, a new user just registered on the website","The user is {$accounttype}", "From: {$email}"  );
                            
         
                             if( $newuser == true ) {
                                echo "<script>alert('Message sent successfully...')</script>";
                             }else {
                                echo "<script>alert('Message could not be sent...')</script>";
                             }
                            
                            
                            
                            
                            
                            $successReport = "<h3 class='alert text-center alert-success alert-dismissible text-center'>
                            Your account has been successfully created. You will be logged in to our system in the next 5 seconds. Check your biodata once again before you get into our system. If you are not in, login <a href='login.php'>here</a></h3>";
                            header('location: https://company.interviewstories.org/admin/user/dashboard.php');
                          }else{
                            $errorReport = "<h3 class='alert text-center alert-danger'>We are sorry we could not create an account for you at the moment. Try some few minutes from now.</h3>";
                          }
                        }

                     }//else of checkPassword > 0

                 }//else of checkName > 0
                }else{//end of if of $password === $cpassword
                  $emailReport = "<h3 class='alert text-center alert-danger'>Password does not match</h3>";
                } 
              }
            }

          }
          
             


?> 

  <title>Create your account.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
  <style type="text/css">
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=number]  {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}




form i {
    margin-left: -30px !important;
    cursor: pointer;
}
input[type=password]{
    display:inline !important;
}
input[type=text]{
    display:inline !important;
}
  </style>
  
    
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "home/navbar.php"; ?>
  <?php 

echo $emailReport . $nameReport . $passwordReport . $successReport . $errorMessage ; 
  ?>
 <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style='margin:auto;width:600px'>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>


    <label for="name"><b>Your account name</b></label>
    <input type="text" placeholder="Enter your company name or your own name here" name="name" id="email" value="<?php echo $name; ?>" required>

    

    <label class="col-sm-12"><b>I am creating an </b></label>
      <select class="form-select shadow-none p-0 border-0 form-control-line" name="accounttype" required="" style="color:#000066;">
        <option disabled selected>Click here to see available options</option>
        <option value="individual">Account for myself (Job applicants should select this option)</option>
        <option value="company">Account for my organization (Organizations/ Company HR representative should select this)</option>
      </select>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter your email here" name="email" id="email" value="<?php echo $email; ?>"  required >

    <label for="email"><b>Phone Number</b></label>
    <input type="number" placeholder="Enter your phone number here" min="7000000000" max="9099999999" value="<?php echo $phone; ?>" name="phone" id="email" required>


    <label for="email"><b>I/We are currently located at</b></label>
    <select id="state" name="state" class="form-select form-select-lg font-weight-bolder"  required="" style="color:#000066;">
                                            <option disabled selected>Choose your state here</option>
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
                                                

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required><i class="bi bi-eye-slash text-primary" id="togglePassword"></i>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpassword" id="cpassword" required> <i class="bi bi-eye-slash text-info" id="ctogglePassword"></i>
    <hr>

    <p class="text-center">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="register">Register</button>
  </div>

  <div class="container-fluid signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form> 




 <?php include "home/footer.php"; ?>
 <?php include "home/js.php"; ?>
 <script>
       const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');
      togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    });
    
     const ctogglePassword = document.querySelector('#ctogglePassword');
      const cpassword = document.querySelector('#cpassword');
      ctogglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
    });
 </script>

</body>

</html>