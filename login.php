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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
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
        $email = $_POST['email'];
        $password =$_POST['password'];
        
        $email_search = "select * from registration where email = '$email' and Status='active' ";
        $query = mysqli_query($con,$email_search);     
        $email_count = mysqli_num_rows($query);        
        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            
            $db_pass = $email_pass['password'];
            $_SESSION['username'] = $email_pass['username'];  
//            $_SESSION['reg_id'] = $email_pass['reg_id'];
            // $_SESSION['user_id'] = $email_pass["user_id"];
            
            
            $pass_decode = password_verify($password,$db_pass);
            
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
                echo "password in correct";
            }
            
        }
        
        else{
            echo "invalid email";
        }
    }
  
  ?>
  
   <div class="card  w-400 p-5">
       <article class="card-body mx-auto" style="max-width: 400px;">
           <h1 class="card-title mt-3 text-center text-light"><strong>LOGIN</strong></h1><br><br>
           <p class="text-center text-dark">Get started to login</p>
            <div>
                <p class="bg-success text-light px-8">
                <?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }else{
                        echo $_SESSION['msg'] = "You are logged out";
                    }
                
                ?></p>
            
            
            </div>
            <br>
           <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

           <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light "><i class="fa fa-envelope"></i></span>
                       
                   </div>
                   <input name="email" class="form-control" placeholder="Email address" type="email" required>
                   
               </div><br>
               <div class="form group input group">
                   <div class="input group-prepend">
                       <span class="input group-text text-light "><i class="fa fa-lock"></i></span>
                       
                   </div>
                   <input name="password" class="form-control" placeholder="Enter password" type="password" required><br>
                   
               </div><br>
               
               <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Login Now</button>
               </div><br>
               <p class="text-center text-light">Not have an account? <a href="a.php" class="text-primary">SingUp Here</a></p>
           </form>
       </article>
   </div>
    
    
</body>
</html>