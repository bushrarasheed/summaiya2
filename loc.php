<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Muli&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  
    <title>Document</title>
</head>
<body>
    <div class="container" style="width: 500px;">
    <input type="text" name="country" id="country" class="form-control" placeholder="location">
    <div id="countrylist">
    </div>
    </div>
<script>
$(document).ready(function(){
    $('#country').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.ajax({
                url:"Select.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#countrylist').fadeIn();
                    $('#countrylist').html(data);
                }
            });
        }
        else{
            $('#countrylist').fadeOut();
            $('#countrylist').html(data);
        }
    });
    $(document).on('click','li',function(){
        $('#country').val($(this).text());
        $('#countrylist').fadeOut();
    });
});
</script>
</body>
</html>