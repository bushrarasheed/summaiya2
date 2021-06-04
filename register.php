<?php

if(!isset($_SESSION))
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
   
    <title>Document</title>
	<?php include 'link.php' ?>
	<?php include 'regstyle.php' ?>
</head>

<!-- https://codewithawa.com/posts/check-if-user-already-exists-without-submitting-form -->



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
            alert("Email already exist");
            $("#emailerr").text("Email already exist");
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
                     if (mail($email, $subject, $message, $header)) {
                     $_SESSION['msg'] = "check you mail to activate your account $email";
                     header('location:newlogin.php');
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
  


<!------ Include the above in your HEAD tag ---------->

<div class="container contact">
<form id="registration_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validation()" method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="logo.png" alt="image" style="width: 100px; height:100px;">
				<h1 style="margin-left: -20px;">Registration</h1>
				<h6 style="margin-left: 10px;">if you want to sell or buy waste then first register youself</h6>
			</div>
		</div>
		
				<div class="col-md-9">
				<div class="contact-form"><br><br>

					<div class="form-group">
					<div class="row">
					<div class="col">          
					<span class="input group-text text-dark"><label>Role</label></i></span>
					   <select name = "Role_type" id = "roletype"class="form-control" required>
						 <option value="">Select Role</option>
						 <option value="Buyer">Buyer</option>
						 <option value="Seller">Seller</option>
					    </select>
					</div>
					<div class="col">     
					<span class="input group-text text-dark"><i class="fa fa-user"></i>  <label>User Name</label></span>
                     
					 <input name="username" class="form-control" placeholder="Username" type="text" id="user" value = "<?php echo $username; ?>" required>
					 <span id="usererror" class="text-danger font-weight-bold"></span>
					</div>    
					</div>
					</div>
					

					<div class="form-group">
					<div class="row">
					<div class="col">
					<span class="input group-text text-dark"><i class="fa fa-envelope"></i><label>Email</label></span>
					   <input name="email" class="form-control" placeholder="abc@gmail.com" type="email" id = "email" required>
					   
					</div>
					<div class="col">
					<span class="input group-text text-dark"><i class="fa fa-phone"></i>  <label>Mobile Number</label></span>
                    <input name="mobile" class="form-control" placeholder="+921234567891" type="phone" id="mobile"   required>
					<span id="mobileerror" class="text-danger font-weight-bold"></span>  
					
					  
					</div>
					</div>
					</div>
					
					

					<div class="form-group">
					<div class="row">
					<div class="col">
                        <span class="input group-text text-dark"><i class="fa fa-lock"></i>  <label>Password</label></span>
                        <input name="password" class="form-control" placeholder="create password" type="password"  id="Pas"required>
                        <input type="checkbox" onclick="myFunction()">Show Password

                        <span id="passerror" class="text-danger font-weight-bold"></span> 
                     </div>
					<div class="col">
					   <span class="input group-text text-dark"><i class="fa fa-lock"></i>  <label>Confirm Password</label></span>
					   <input name="cpassword" class="form-control" placeholder="repeat password" type="password" required>
					
                    </div>
					</div>
					</div>

					<div class="form-group">
					<div class="row">
					<div class="col">
					<span class="input group-text text-dark "><i class="fa fa-id-card" aria-hidden="true"></i>  <label>CNIC</label></span>
                       
					  
					   <input name="cnic" class="form-control" placeholder="CNIC" type="cnic" id="cnic"  required>
					   <span id="cnicerror" class="text-danger font-weight-bold"></span>
					</div>
					<div class="col">
					<span class="input group-text text-dark"><i class="fa fa-map-marker" aria-hidden="true"></i>  <label>Address</label></span>
                    <input name="Location" class="form-control" placeholder="Address" type="Location" id="Location"    required>  
					<span id="locerror" class="text-danger font-weight-bold"></span> 
                    <!-- <div id="loclist"></div>  
					    -->
					</div>
					</div>
					</div><br>
					
					<div class="form-group ">        
					<div class="col-sm-offset-2 col-sm-10 " style="margin-left: 280px;">
					<button  type="submit" name="submit" class="btn btn-block text-center">Submit</button>
					</div>
					</div>
				</div>
			</div>
		
	</div>
	</form>
</div>
 <script>
function validation(){
      //   var user = document.getElementById('user').value;
        
      //   var MobileNumber = document.getElementById('mobile').value;
        
      //   var cnic = document.getElementById('cnic').value;

      //   var location = document.getElementById('location').value;

      //   var roletype = document.getElementById('roletype').value;

        var password = document.getElementById('Pas').value;
        
      //   var usercheck = /^[A-Za-z. ]{3,30}$/;
        
      //   var mobilecheck = /^[+92][0-9]{9}[0-9]{3}$/;
       
      //   var cniccheck = /^([0-9]{5})[-]([0-9]{7})[-]([0-9]{1})$/;

        var passwordcheck = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;


      //   if(usercheck.test(user)){
      //        document.getElementById('usererror').innerHTML = " ";
           
             
      //    }
      //   else{
      //       document.getElementById('usererror').innerHTML = "User name is invalid ";
      //       return false;
      //   }
        
        
        
        
        
      //   if(mobilecheck.test(MobileNumber)){
      //        document.getElementById('mobileerror').innerHTML = " ";
           
             
      //    }
      //   else{
      //       document.getElementById('mobileerror').innerHTML = "Mobile Number  is invalid ";
      //       return false;
      //   }

      //   if(cniccheck.test(cnic)){
      //        document.getElementById('cnicerror').innerHTML = " ";
            
             
      //    }
      //   else{
      //       document.getElementById('cnicerror').innerHTML = "CNIC is invalid ";
      //       return false;
      //   }
        
        
            if(passwordcheck.test(password)){
                document.getElementById('passerror').innerHTML = " ";
                
                
            }
            else{
                document.getElementById('passerror').innerHTML = "Password must contain atleat 8 charachter \n 1 uppercase \n 1 special character \n atleat one number  ";
                return false;
            }
        
        }
        
function myFunction() {
  var x = document.getElementById("Pas");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 


   </script> 



 <script type="text/javascript">
      $(function() {

         $("#usererror").hide();
         
         $("#mobileerror").hide();
         
         $("#cnicerror").hide();
         

         var error_user = false;
        
         var error_mobile = false;
         var error_password = false;
         var error_cnic = false;
         

         $("#user").focusout(function(){
            check_user();
         });
         
         $("#mobile").focusout(function() {
            check_mobile();
         });
         $("#password").focusout(function() {
            check_password();
         });
         $("#cnic").focusout(function() {
            check_cnic();
         });
         

         function check_user() {
            var pattern = /^[a-zA-Z]*$/;
            var fname = $("#user").val();
            if (pattern.test(fname) && fname !== '') {
               $("#usererror").hide();
               $("#user").css("border-bottom","2px solid #34F458");
            } else {
               $("#usererror").html("Should contain only Characters");
               $("#usererror").show();
               $("#user").css("border-bottom","2px solid #F90A0A");
               error_user = true;
            }
         }

        

         
        

         function check_mobile() {
            var pattern = /^[+92][0-9]{9}[0-9]{3}$/;
            var mobile = $("#mobile").val();
            if (pattern.test(mobile) && mobile !== '') {
               $("#mobileerror").hide();
               $("#mobile").css("border-bottom","2px solid #34F458");
            } else {
               $("#mobileerror").html("Invalid Mobile Number");
               $("#mobileerror").show();
               $("#mobileerror").css("border-bottom","2px solid #F90A0A");
               error_mobile = true;
            }
         }
         function check_cnic() {
            var pattern = /^([0-9]{5})[-]([0-9]{7})[-]([0-9]{1})$/;
            var cnic = $("#cnic").val();
            if (pattern.test(cnic) && cnic !== '') {
               $("#cnicerror").hide();
               $("#cnic").css("border-bottom","2px solid #34F458");
            } else {
               $("#cnicerror").html("Invalid CNIC");
               $("#cnicerror").show();
               $("#cnicerror").css("border-bottom","2px solid #F90A0A");
               error_cnic = true;
            }
         }
        

         $("#registration_form").submit(function() {
            error_user = false;
            
            error_mobile = false;
            error_password = false;
            error_cnic = false;
            

            check_user();
            
            check_mobile();
            check_password();
            check_cnic();
            

            if (error_user === false &&   error_mobile === false  && error_cnic === false ) {
               alert("Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });
      });
   </script> 
 


</body>
</html>
