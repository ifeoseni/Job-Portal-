<?php
     include "home/head.php";
    
$conn =new mysqli("emerald6", "intervie_portal","portal2021.","intervie_companyjobportal");

    if(isset($_POST['sendresetlink'])){
      $userdetail = $_POST['userdetail'];
      $findUser = mysqli_query($conn,"SELECT * FROM users WHERE (name ='$userdetail' OR email = '$userdetail')  ");


      if (mysqli_num_rows($findUser) === 1) {   
        while ($row = mysqli_fetch_assoc($findUser) ){
            $mdpassword = $row['password'];
            
            
           
            
            $_SESSION['from']="admin@interviewstories.org";//'ifeoseni@gmail.com', 'John Doe'
            $_SESSION['to']=   $row['email'];
            $email = $row['email'];
            $_SESSION['message']=  "Here is your password reset link ".$row['name'];
            $_SESSION['body'] .='Dear '.ucfirst($row['name'])."<br/>Use this link <a href='https://company.interviewstories.org/resetpassword.php?pwd={$mdpassword}&email={$email}'>here</a> to reset your account password.";
            
            echo "<script>alert('A reset password link has been set to your email. Kindly use that link to change your password.')</script>";
            $mail->send();
            // header("Location: https://company.interviewstories.org/admin/user/dashboard.php");
        }
      }else{
         echo "<script>alert('The name or email you provided does not exist in our database. Please enter the right details.')</script>";
      }

    }
    
   


?> 

  <title>Reset Password</title> 
 
  <style type="text/css">
  

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

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "home/navbar.php";  


  ?>

 <form class="form-horizontal form-material" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-group mb-4">
        <label class="col-md-12 p-0">Enter Your Full Name Or Email Address Here</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" name="userdetail" placeholder="Enter your full name or email address here."
                class="form-control p-0 border-0"  required> 
        </div>                         
    </div>
    
   
     
    <div class="form-group mb-4">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit" name="sendresetlink">Send Reset Link</button>
        </div>
    </div>
</form>




 <?php include "home/footer.php";   ?>
 <?php include "home/js.php"; ?>

</body>

</html>