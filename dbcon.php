<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "fyp";

$con = mysqli_connect($server,$username,$password,$db);




   if($con){
      ?>
        <script>
              alert("connection sucessful");
          </script>
    
     <?php
   }else{
    
      ?>     <script>
             alert("no connection");

           </script>
          <?php
   }








?>
<!-- api key -->
<!-- AIzaSyAAQpbbRrDb_mlqXaBkPIOZY26yW-PxCZ4 -->