<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>
<style>
body{
		background-color: #25274d;
	}
	.contact{
		padding: 4%;
		height: 400px;
	}
	.col-md-3{
		background: #0df2f2;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: #25274d;
		color: #fff;
		font-weight: 600;
		width: 25%;
	}
	

</style>



<body>
<?php
    include 'dbcon.php';    

    if (isset($_POST['submit'])) {
        $Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
        $Lastname = mysqli_real_escape_string($con,$_POST['Lastname']);
        $Email =mysqli_real_escape_string($con,$_POST['Email']);
        $Message =mysqli_real_escape_string($con,$_POST['Message']);
    }

    $sql = "insert into contactus(Firstname, Lastname, Email, Message) values('$Firstname','$Lastname','$Email','$Message')";

    //  if(mysqli_query($con, $sql)){
    //      ?>
    //      <script>
    //          alert("insert succesfully");

    //       </script>
    
    //  <?php
    //    }else{
    
    //   ?>
    //  <script>
    //          alert("not insert");
    //   </script>
        
    //       <?php
         
    //  }

	 $iquery = mysqli_query($con, $sql);
	 if($iquery){
		$subject = "Customer Feedback";
		$email_body = "Name: $Firstname."."$Lastname.\n\t". 
						
						"\nMESSAGE:$Message.\n";
		
		$from="irecyclerz@gmail.com";
                
		$header='';
		$header .= 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= "From: $from \r\n" .
					"Reply-To: $from \r\n" .
					"X-Mailer: PHP/" . phpversion();
		mail($Email,$subject,$email_body,$header);
	 }
 ?>

<!------ Include the above in your HEAD tag ---------->

<div class="container contact">
<form action="" onsubmit="return validation()" method="POST">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="logo.png" alt="image" style="width: 100px; height:100px;">
				<h2>Contact Us</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		
				<div class="col-md-9">
				<div class="contact-form">
					<div class="form-group">
					<label class="control-label col-sm-2" >First Name:</label>
					<div class="col-sm-10">          
						<input name="Firstname" type="text" class="form-control" id="firstname" placeholder="Enter First Name"  required>
						<span id="fusererror" class="text-danger font-weight-bold"></span>
					</div>
					</div>
					<div class="form-group">
					<label class="control-label col-sm-2" >Last Name:</label>
					<div class="col-sm-10">          
						<input name="Lastname" type="text" class="form-control" id="lastname" placeholder="Enter Last Name" required>
						<span id="lusererror" class="text-danger font-weight-bold"></span>
					</div>
					</div>
					<div class="form-group">
					<label class="control-label col-sm-2" >Email:</label>
					<div class="col-sm-10">
						<input name="Email" type="email" class="form-control" id="email" placeholder="Enter email" required>
					</div>
					</div>
					<div class="form-group">
					<label class="control-label col-sm-2" >Message:</label>
					<div class="col-sm-10">
						<textarea name="Message" class="form-control" rows="5" id="message" required></textarea>
					</div>
					</div>
					<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="submit" class="btn btn-block ">Submit</button>
					</div>
					</div>
				</div>
			</div>
		
	</div>
	</form>
</div>

<script type="text/javascript">
    
    function validation(){
        var firstname = document.getElementById('firstname').value;
		var lastname = document.getElementById('lastname').value;
		var firstcheck = /^[A-Za-z. ]{3,30}$/;
		var lastcheck = /^[A-Za-z. ]{3,30}$/;
		 
        
         if(firstcheck.test(firstname)){
             document.getElementById('fusererror').innerHTML = " ";
             
             
         }
        else{
            document.getElementById('fusererror').innerHTML = "User name is invalid ";
            return false;
        }

		if(lastcheck.test(lastname)){
             document.getElementById('lusererror').innerHTML = " ";
             
         }
        else{
            document.getElementById('lusererror').innerHTML = "User name is invalid ";
            return false;
        }
	}

</script>  

    
</body>
</html>