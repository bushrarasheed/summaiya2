<?php
 include 'dbcon.php';    


if(isset($_POST["query"])){
    $output = '';
    $query = "Select * from  tbl_location where location like '%".$_POST["query"]."%'";
    $_result = mysqli_query($con, $query);
    $output = '<ul class = "list-unstyled">';
    if(mysqli_num_rows($_result)>0){
        while($row = mysqli_fetch_array($_result))
        {
            $output.= '<li>'.$row["location"].'</li>';
        }
    }
    else{
        $output .= '<li>Location Not found</li>';
    }
    $output .= '</ul>';
    echo $output;
}



?>