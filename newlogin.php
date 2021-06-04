<?php
if(!isset($_SESSION))
    session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include 'regstyle.php' ?>
    <?php include 'link.php' ?>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
 <style>  
    
     /* .card{
            
            
            background: url(imag2.jpg);
            background-size: cover;
            background-position: center;
            
            
            
        }  */
       
</style> 
</head>


<body>
  <?php
  include 'dbcon.php';
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password =$_POST['password'];
        
        $email_search = "select * from registration where email = '$email' and Status='active' ";
        $query = mysqli_query($con,$email_search);     
        $email_count = mysqli_num_rows($query);        
        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            
            $db_pass = $email_pass['password'];
            $_SESSION['username'] = $email_pass['username'];  
            $_SESSION['Location'] = $email_pass['Location'];
//            $_SESSION['reg_id'] = $email_pass['reg_id'];
            // $_SESSION['user_id'] = $email_pass["user_id"];
            
            
            $pass_decode = password_verify($password,$db_pass);
            $msg="";
            if($pass_decode){
                echo "login sucessful";
                ?>
                
            
                <script>
                    location.replace("home.php");
    
                </script>
                

                
              <?php
            
            $id_search = "SELECT user_id FROM registration where email = '$email'";
                            

            $query = mysqli_query($con,$id_search);
            $id_select = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $id_select["user_id"];
            echo $_SESSION['user_id'];
                
            }else{
                $msg = "password incorrect";
                // echo "password in correct";
            }
            
        }
        
        else{
            echo "invalid email";
        }
    }
  
  ?>
  <div class="container contact">
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="logo.png" alt="image" style="width: 150px; height:150px;">
				
				
			</div>
		</div>
		
				<div class="col-md-9">
				<div class="contact-form" ><br><br>
                <h1 style="text-align: center;" >Login</h1><br><br>
                <p class="text-center text-dark">Get started to login</p>
            
                <p class="bg-success text-light " style="text-align: center;">
                <?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }else{
                        echo $_SESSION['msg'] = "You are logged out";
                    }
                
                ?></p>
					<div class="form-group  " style="margin-left: 150px; margin-right: 150px;" >   
					<span class="input group-text text-dark"><i class="fa fa-user"></i>  <label>Email</label></span>
                     
                    <input name="email" class="form-control" placeholder="Email address" type="email" required>
					 <span id="usererror" class="text-danger font-weight-bold"><?=$msg;?></span>
					
					
					</div><br>
					

					<div class="form-group" style="margin-left: 150px; margin-right: 150px;">
					
					
					<span class="input group-text text-dark"><i class="fa fa-phone"></i>  <label>Password</label></span>
                    <input name="password" class="form-control" placeholder="Enter password" type="password" required><br>
					<span id="mobileerror" class="text-danger font-weight-bold"></span>  
					
					  
					</div>

                    <div class="form-group ">        
					<div class="col-sm-offset-2 col-sm-10 " style="margin-left: 280px;">
					<button  type="submit" name="submit" class="btn btn-block text-center">Login Now</button>
                    
					</div><br>
                    <p class="text-center text-dark">Not have an account? <a href="register.php" class="text-primary">SingUp Here</a></p>
					</div>
					
					
                </div>			
	</form>
</div>
</body>
</html>