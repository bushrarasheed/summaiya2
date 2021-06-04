<?php
if(!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html>
<head>

   
<?php include 'regstyle.php' ?>
    <?php include 'link.php' ?>
   


</head>
<?php
    include 'dbcon.php';    
    // function ISO_DATE($dat)
    // {
    //     $dt = explode("/",$dat);
    //     return $dt[4].$dt[4].$dt[5].$dt[7].$dt[2].$dt[3].$dt[0].$dt[1];
    // } 
    if (isset($_POST['submit'])) {
        $Type = mysqli_real_escape_string($con, $_POST['Type']);
        $Address = mysqli_real_escape_string($con, $_POST['Address']);
        $Pickup =mysqli_real_escape_string($con, $_POST['Pickup']);
        
//    }

        $sql = "insert into service(Type,Address,Pickup) values('$Type','$Address','$Pickup')";
        
    $iquery = mysqli_query($con, $sql);

        if ($iquery) {
           
            // $subject = "Customer Feedback";
            // $email_body = "Name: $Type."."$Address.\n\t".
                        
            //             "\nMESSAGE:$Pickup.\n";
            // $Email = "sumshafique@gmail.com";
        
            // $to = "irecyclerz@gmail.com";
			
            // $header='';
            // $header .= 'MIME-Version: 1.0' . "\r\n";
            // $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // $header .= "From: $Email \r\n" .
            //         "Reply-To: $Email \r\n" .
            //         "X-Mailer: PHP/" . phpversion();
            // mail($to, $subject, $email_body, $header);
            // echo "This email was not send";
        }
    }
 ?>
<body>
<div class="container contact">
<form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<h1 class="text-light"><?php  echo $_SESSION['username']; ?> </h1> 
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="logo.png" alt="image" style="width: 150px; height:150px;">
				
				
			</div>
		</div>
		
				<div class="col-md-9">
				<div class="contact-form" ><br><br>
                <h1 style="text-align: center;" >Service Form</h1><br><br>
            
            
              
					<div class="form-group  " style="margin-left: 150px; margin-right: 150px;" >   
					<label>Type</label>
                          
					<span class="input group-text text-dark" ><label>Type of garbage</label></i></span>
					   <select name = "Type" id = "Type" type="Type"class="form-control" required>
						 <option value="">Select Waste-Type</option>
						 <option value="Syrup glass bottles">Syrup glass bottles</option>
						 <option value="syrup plastic bottles">syrup plastic bottles</option>
                         <option value="Injections">Injections</option>
						 <option value="syrup plastic bottles">syrup plastic bottles</option>
					    </select>
					
					 
					
					</div>
					

					<div class="form-group" style="margin-left: 150px; margin-right: 150px;">
					
					
					<label>Address</label>
                    
                    <input name="Address" class="form-control text-dark" placeholder="<?php  echo $_SESSION['location']; ?>" type="address" id="Address" disabled >
					<span id="mobileerror" class="text-danger font-weight-bold"></span>  
					
					  
					</div>
                    
                    <div class="form-group" style="margin-left: 150px; margin-right: 150px;">
                    <label>Price</label>
                    <input   class="form-control" placeholder="Unit Price: 50 pkr per kg "  disabled>
					<!-- Unit Price: 50 pkr per kg  -->
					</div>
                    <div class="form-group" style="margin-left: 150px; margin-right: 150px;">
					
					
					<label>Date</label>
                    <input type="date" id="Pickup" class="form-control" name="Pickup"   required>

					<!-- <span id="mobileerror" class="text-danger font-weight-bold"></span>   -->
					
					  
					</div>


                    <div class="form-group ">        
					<div class="col-sm-offset-2 col-sm-10 " style="margin-left: 280px;">
					<button type="submit" name="submit" class="btn btn-block ">Submit</button>
					</div>
                    
					</div>
					
					
                </div>			
	</form>
</div>
<script>
	

</script>

</body>
</html>

