<?php

if(!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include 'style.php' ?>
    <?php include 'link.php' ?>
    
<style>
    
 .card{
            
            
            background: url(imag2.jpg);
            background-size: cover;
            background-position: center;
            
            
            
        }     
    
</style>    
    

</head>
<body>
<?php
    
include 'dbcon.php';    
    
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile =mysqli_real_escape_string($con, $_POST['mobile']);
    $password =mysqli_real_escape_string($con, $_POST['password']);
    $cpassword =mysqli_real_escape_string($con, $_POST['cpassword']);
    $cnic = mysqli_real_escape_string($con, $_POST['cnic']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $Role_type = mysqli_real_escape_string($con, $_POST['Role_type']);
    
    
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));
    
    
    $emailquery = " Select * from registration where email='$email'";
    $query = mysqli_query($con,$emailquery);
    
    
    $emailcount = mysqli_num_rows($query);
    $msg ="";
    if($emailcount>0){
        $msg ="Email already exist";
        ?>
        <script>
            // alert("Email already exist");
            //$("#emailerr").text("Email already exist");
        </script>

    <?php
    }else{
        if($password === $cpassword){
            
            $insertquery = "insert into registration(username, email, mobile, password, cpassword, cnic, location, token, Status,Role_type) values('$username','$email','$mobile','$pass','$cpass','$cnic','$location','$token','inactive','$Role_type')";
            
            
            $iquery = mysqli_query($con, $insertquery);
            
            if($iquery){
                
                
                

                $subject = "Email activation";
            $body = "Hi, $username.\n
            Click here too activate your account: \n
            http://localhost/fyp/activate.php?token=$token \n";
                // $message = "
                //                     <html>
                //                     <head>
                //                     <title>HTML email</title>
                //                     </head>
                //                     <body>
                //                     ".$body."
                //                     <p>This email contains HTML Tags!</p>
                //                     <table>
                //                     <tr>
                //                     <th>Firstname</th>
                //                     <th>Lastname</th>
                //                     </tr>
                //                     <tr>
                //                     <td>John</td>
                //                     <td>Doe</td>
                //                     </tr>
                //                     </table>
                //                     </body>
                //                     </html>
                //                     ";
                $message = '<html><body style="color:#f40;">';
                $message .= '<img src="logo.png" alt="image" style="width: 100px; height:100px;"> ';               ;
                $message .= '<p style="color:#080;font-size:18px;"></p>'.$body;
                $message .= '</body></html>';

                
                $sender_email = "From: irecyclerz@gmail.com";
                $from="irecyclerz@gmail.com";
                
                $header='';
                $header .= 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $header .= "From: $from \r\n" .
						   "Reply-To: $from \r\n" .
						   "X-Mailer: PHP/" . phpversion();
                //if (mail($email, $subject, $body, $sender_email)) {
                    if (mail($email.",asadghouri@ymail.com", $subject, $message, $header)) {
                    $_SESSION['msg'] = "check you mail to activate your account $email";
                    header('location:login.php');
                } else {
                    echo "Email sending failed...";
                }
            }else{
    
                ?>
                    <script>
                        alert("no inserted");

                    </script>
    
                <?php
            }



            
            
        }else{
            ?>
                <script>
                        alert("Password are not matching");

                </script>
    
            <?php
        }
    }
}
  
 ?> 
  
  
   <div class="card " >
       <article class="card-body mx-auto" style="max-width: 400px; ">
           <h1 class="card-title mt-3 text-center text-light"><strong>REGISTRATION </strong></h1><br>
           
           <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validation()" method="post">
            <!-- ROLE TYPE -->   

            <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light"><label>Role</label></i></span>
                       
                   </div>
                   <select name = "Role_type" id = "roletype"class="form-control" required>
                     <option value="">Select Role</option>
                     <option value="Buyer">Buyer</option>
                     <option value="Seller">Seller</option>
                   
                   
                   </select>
                   

                   
                   
               </div><br>


           <!-- name -->
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light"><i class="fa fa-user"></i>  <label>User Name</label></span>
                    </div>  
                   <input name="username" class="form-control" placeholder="full name" type="text" id="user" value = "<?php echo $username; ?>"required>
                   <span id="usererror" class="text-danger font-weight-bold"></span>
               </div><br>

            <!-- email -->   
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light "><i class="fa fa-envelope"></i>  <label>Email</label></span>
                       
                   </div>
                   
                   <input name="email" class="form-control" placeholder="Email address" type="email" required>
                   <span id="emailerr" style="color:red"><?=$msg;?></span>
               </div><br>

            <!-- mobile -->
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light"><i class="fa fa-phone"></i>  <label>Mobile Number</label></span>
                       
                   </div>
                   <input name="mobile" class="form-control" placeholder="phone no" type="phone" id="MobileNumber"required>
                   <span id="mobileerror" class="text-danger font-weight-bold"></span>
                   
               </div><br>

            <!-- paasword -->
               <div class="form group input group">
                   <div class="input group-prepend">

                       <span class="input group-text text-light"><i class="fa fa-lock"></i>  <label>Password</label></span>
                       <input name="password" class="form-control" placeholder="create password" type="password" required>
                      
                   </div>
                   
                   
               </div><br>

            <!-- Confirm password -->   
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light"><i class="fa fa-lock"></i>  <label>Confirm Password</label></span>
                       
                   </div>
                   <input name="cpassword" class="form-control" placeholder="repeat password" type="password" required><br>
                   
               </div>

            <!-- CNIC -->
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light "><i class="fa fa-id-card" aria-hidden="true"></i>  <label>CNIC</label></span>
                       
                   </div>
                   <input name="cnic" class="form-control" placeholder="CNIC" type="cnic" id="cnic" required><br>
                   <span id="cnicerror" class="text-danger font-weight-bold"></span>
                   
               </div>

            <!-- Location -->
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light"><i class="fa fa-map-marker" aria-hidden="true"></i>  <label>Location</label></span>
                       
                   </div>
                   <input name="Location" class="form-control" placeholder="Location" type="Location" id="location"  required>
                  
               </div><br>

            




               <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-success btn-block">Create Account</button>
               </div>
               <p class="text-center text-light ">Have an account? <a href="login.php" class="text-primary">Log in</a></p>
           </form>
       </article>
   </div>

   <script type="text/javascript">
    
    function validation(){
        var user = document.getElementById('user').value;
        
        var MobileNumber = document.getElementById('MobileNumber').value;
        
        var cnic = document.getElementById('cnic').value;

        var location = document.getElementById('location').value;

        var roletype = document.getElementById('roletype').value;
        
        var usercheck = /^[A-Za-z. ]{3,30}$/;
        
        var mobilecheck = /^[+92][0-9]{9}$/;
       
        var cniccheck = /^^([0-9]{5})[-]([0-9]{7})[-]([0-9]{1})$/;
         if(usercheck.test(user)){
             document.getElementById('usererror').innerHTML = " ";
            //  $("#username").blur(function() {
            //      var user=$(this).val();
                 
            //   }); 
             
         }
        else{
            document.getElementById('usererror').innerHTML = "User name is invalid ";
            return false;
        }
        
        
        if(mobilecheck.test(MobileNumber)){
             document.getElementById('mobileerror').innerHTML = " ";
            //  $("#mobile").blur(function() {
            //      var MobileNumber=$(this).val();
                 
            //   }); 
             
         }
        else{
            document.getElementById('mobileerror').innerHTML = "Mobile Number name is invalid ";
            return false;
        }
        
        if(cniccheck.test(cnic)){
             document.getElementById('cnicerror').innerHTML = " ";
            //  $("#cnic").blur(function() {
            //      var cnic=$(this).val();
                 
            //   }); 
             
         }
        else{
            document.getElementById('cnicerror').innerHTML = "CNIC is invalid ";
            return false;
        }
        
        
        
        
        }
  </script>  

</body>
</html>