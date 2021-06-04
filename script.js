
    
    $('document').ready(function(){
 var username_state = false;
 var email_state = false;
 $('#user').on('blur', function(){
  var username = $('#user').val();
  if (username == '') {
  	username_state = false;
  	return;
  }
  $.ajax({
    url:'register.php',
    type: 'post',
    data: {
    	'user_check' : 1,
    	'user' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
      	username_state = false;
      	$('#user').parent().removeClass();
      	$('#user').parent().addClass("form_error");
      	$('#user').siblings("span").text('Sorry... Username already taken');
      }else if (response == 'not_taken') {
      	username_state = true;
      	$('#user').parent().removeClass();
      	$('#user').parent().addClass("form_success");
      	$('#user').siblings("span").text('Username available');
      }
    }
  });
 });		
  $('#email').on('blur', function(){
 	var email = $('#email').val();
 	if (email == '') {
 		email_state = false;
 		return;
 	}
 	$.ajax({
		url:'register.php',
      type: 'post',
      data: {
      	'email_check' : 1,
      	'email' : email,
      },
      success: function(response){
      	if (response == 'taken' ) {
          email_state = false;
          $('#email').parent().removeClass();
          $('#email').parent().addClass("form_error");
          $('#email').siblings("span").text('Sorry... Email already taken');
      	}else if (response == 'not_taken') {
      	  email_state = true;
      	  $('#email').parent().removeClass();
      	  $('#email').parent().addClass("form_success");
      	  $('#email').siblings("span").text('Email available');
      	}
      }
 	});
 });

 $('#reg_btn').on('click', function(){
 	var username = $('#user').val();
 	var email = $('#email').val();
 	var password = $('#password').val();
 	if (username_state == false || email_state == false) {
	  $('#error_msg').text('Fix the errors in the form first');
	}else{
      // proceed with form submission
      $.ajax({
		url:'register.php',
      	type: 'post',
      	data: {
      		'save' : 1,
      		'email' : email,
      		'user' : username,
      		'password' : password,
      	},
      	success: function(response){
      		alert('user saved');
      		$('#user').val('');
      		$('#email').val('');
      		$('#password').val('');
      	}
      });
 	}
 });
});
 