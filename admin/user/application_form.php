 <form action="submitapplication.php" method="post" enctype="multipart/form-data">
                    <!-- User's Credentials  -->
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 text-center">Your Biodata Include</legend>                     
                      
                
                
                        <div class="form-group">
                            <label for="username">Your Name</label>
                            <input type="text" name="name" readonly class="form-control-plaintext font-weight-bold text-success p-2" id="username" value="<?php echo $name; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="email" value="<?php echo $email; ?>">
                        </div>
                        <?php 
                        $phone = $dateofbirth = $state = $address= $userdocument ="";
                        $getapplicantprofile = mysqli_query($conn,"SELECT * FROM users  WHERE name = '$name' AND email = '$email' ");
                        if (mysqli_num_rows($getapplicantprofile) === 1) {//here is to ensure no one uses another email address
                            while ($row = mysqli_fetch_assoc($getapplicantprofile)) {
                                $phone = $row['phone']; 
                                $dateofbirth = $row['dateofbirth']; 
                                $state = $row['state']; 
                                $address = $row['address']; 
                                $userdocument = $row['userdocument']; 
                            }
                        }
                        
                        ?>
                        <div class="form-group">
                            <label for="dateofbirth">Your Were Born On </label>
                            <input type="date" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="dateofbirth" value="<?php echo $dateofbirth; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="phone">Your Phone Number Is </label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="phone" value="<?php echo $phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="state">Your Current State Of Residence Is</label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="state" value="<?php echo $state; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Your Home Address Is</label>
                            <input type="text" readonly class="form-control-plaintext font-weight-bold text-success p-2" name="address" value="<?php echo $address; ?>">
                        </div>
                        
                        <?php 
                        if(!empty($userdocument)){
                            echo "<p>View your cv <a href='https://company.interviewstories.org/admin/document/$userdocument'>here</a></p>";
                            echo "<p>If you do not want to use this cv, please do update your profile by following the instructions below.</p>";
                        }
                        ?>
                        
                        
                        
                        <p>You can edit your information by clicking UPDATE YOUR PROFILE or <a href="https://company.interviewstories.org/admin/user/dashboard.php">here</a> to do so. </p>
                         
                    </fieldset>
                    <!-- User's Preferences  -->
                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 text-center">Why Are You Applying For This Role</legend>
                       
                        <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Why Are You Qualified For This Job?</label>
                            <div class="col-md-12 border-bottom p-0 ">
                                <input type="text" name="whyiamqualified" placeholder="What experience do you have and what can you offer?"
                                    class="form-control p-2 border-0"   required value="<?php echo $whyiamqualified; ?>" >  
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Academic/Professional Qualification You Possess?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="qualification" placeholder="Please talk about relevant degree and certificates you possess that makes you a good fit for the company e.g BSC Computer Science, PMP." class="form-control p-2 border-0"  value="<?php echo $qualification; ?>"  required> 
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Why Should You Be Picked For This Job Role?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="whyme" placeholder="What makes you unique and standout from other applicants." class="form-control p-2 border-0" value="<?php echo $whyme; ?>"  required> 
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Top Skills You Have That Will Make You Perform The Job Well?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="mytopskills" placeholder="Use a comma to seperate your skills e.g Content Writing, Digital Marketing" class="form-control p-0 border-0"   required value="<?php echo $mytopskills; ?>" > 
                            </div>                         
                        </div> 
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">How Much Do You Expect To Be Paid In Naira If You Are Choosen For The Role?</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number" name="salaryiwant" placeholder="Please note that this value can be negotiated by the company/organization you want to work for "
                                    class="form-control p-2 border-0" min="0" required="" value="<?php echo $salaryiwant; ?>" > 
                                <small>The organization is proposing ₦<?php echo $proposedsalary; ?>. Propose your counter offer here or the least amount you can collect in the text box above.</small>
                            </div>                         
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Web Link To Your CV if you do not want to use the one you uploaded when updating your profile</label>
                            
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="cviwanttouse" placeholder="Kindly ensure you set the sharing link to public and you give the current web link with the web protocol e.g https://cv.com."
                                    class="form-control p-2 border-0" value="<?php echo $cviwanttouse; ?>"  > 
                            </div> 
                            <small class="font-weight-bolder text-dark">Leave this empty if you want to use the one you updated on the portal.</small>   
                            
                            
                        </div>
                        <input type="hidden" name="id" class="form-control p-0 border-0" value="<?php echo $id; ?>" required> 
                        <input type="hidden" name="companyname" class="form-control p-2 border-0" value="<?php echo $companyname; ?>" required>
                        <input type="hidden" name="title" class="form-control p-2 border-0" value="<?php echo $title; ?>" required>                                           
                        <input type="hidden" name="deadline" class="form-control p-2 border-0" value="<?php echo $deadline; ?>" required> 
                        <input type="hidden" name="proposedsalary" class="form-control p-0 border-0" value="<?php echo $proposedsalary; ?>" required> 
                        <input type="hidden" name="oldcv" class="form-control p-0 border-0" value="<?php echo $userdocument; ?>" required> 
                        
                        


    



                    </fieldset>
                    <!-- Submit Button  -->
                    <div class="form-group row text-right">
                        <div class="col">
                            <button class="btn btn-success btn-primary" type="submit" name="apply">Apply For This Role</button>
                        </div>
                    </div>
                </form>