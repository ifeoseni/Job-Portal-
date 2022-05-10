<?php
     include "home/head.php";
    
$conn =new mysqli("emerald6", "intervie_portal","portal2021.","intervie_companyjobportal");


   
   $oldmd = "";
   
    if(isset($_GET['pwd'])){
        $oldmd = $_GET['pwd'];
        $_SESSION['email'] = $_GET['email'];
        
        
    }
    /*else{
        echo "<script>alert('You do not have access to this page. ')</script>";
        // header("Location: https://company.interviewstories.org");
    }*/
    
    
    if(isset($_POST['changepassword'])){
        $md = $_POST['oldmd'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        if($md != $oldmd){
            echo "<script>alert('There seems to be a problem with resetting your password. Contact admin ')</script>";
        }else{
           if($password != $cpassword){
                echo "<script>alert('Your password does not match. Kindly ensure it does. ')</script>";
            }else{
                $email = $_SESSION['email'];
                $getUser = mysqli_query($conn,"SELECT * FROM users WHERE ( email = '$email' AND password='$md')  ");
                if (mysqli_num_rows($getUser) === 1) {  
                    $updatePassword = mysqli_query($conn,"UPDATE users SET password = '$password' WHERE password='$md' AND email = '$email')  ");
                    if($updatePassword){
                         echo "<script>alert('Password reset successful.')</script>";  
                         echo ' Login <a href="login.php">here</a> ';
                    }else{
                        echo "<script>alert('Something went wrong during your password reset. Kindly contact the admin for support. ')</script>"; 
                    }

                }
            } 
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
        <label class="col-md-12 p-0">Enter the new password you want to use here</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" name="password" placeholder="Enter your new password here."
                class="form-control p-0 border-0"  required> 
        </div>                         
    </div>
    
    <div class="form-group mb-4">
        <label class="col-md-12 p-0">Confirm your password here</label>
        <div class="col-md-12 border-bottom p-0">
            <input type="text" name="cpassword" placeholder="Enter your new password here again."
                class="form-control p-0 border-0"  required> 
        </div>                         
    </div>
    
    <input type="hidden" name="oldmd" value="<?php echo $oldmd; ?>" >
     
    
   
     
    <div class="form-group mb-4">
        <div class="col-sm-12">
            <button class="btn btn-success" type="submit" name="changepassword">Change Password</button>
        </div>
    </div>
</form>




 <?php include "home/footer.php";   ?>
 <?php include "home/js.php"; ?>

</body>

</html>