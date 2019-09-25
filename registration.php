<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style >
    	body {background: #f3f3f3;}
    	h1 {text-shadow: 0 10px 15px rgba(0,0,0,0.3);}
    	label {text-shadow: 0 10px 15px rgba(0,0,0,0.3); font-size: 25px;}
    	.day,.month,.year  {height: 30px}
    	.btn{width: 30%;background: linear-gradient(#67ae55, #578843); }
        .error{color:red !important;}
    </style>
</head>
<body>
    <div class="row mt-5 m-0">
    	<div class="col-md-1">&nbsp;</div>
    	<div class="col-md-5">&nbsp;</div>
    	<div class="col-md-5">
    		<form action="" method="post" id="registrationForm">
    			<h1>Create an account</h1>
    			<div class="row mt-5 ">
    			    <div class="col-md-6">
    			        <input type="text" name="first_name" placeholder="Firstname..." class="form-control" id="firstName">
                        <span class="error" id="firstNameError"></span>
    			    </div>
    			    <div class="col-md-6">
    			        <input type="text" name="last_name" placeholder="Lastname..." class="form-control" id="lastName">
                        <span class="error" id="lastNameError"></span>
    			    </div>
    			</div>
    			<input type="text" name="email" placeholder="Email..." class="form-control mt-2" id="email">
                <span class="error" id="emailError"></span>
    			<input type="password" name="password" placeholder="Password..." class="form-control mt-2" id="password">
                <span class="error" id="passwordError"></span>
    			<input type="password" name="confirm_password" placeholder="Confirm-Password..." class="form-control mt-2" id="confirmPassword">
                <span class="error" id="confirmPasswordError"></span>
    			<input type="text" name="phone" placeholder="Phone..." class="form-control mt-2"
                id="phone">
                <span class="error" id="phoneError"></span>
    			<label class="mt-2 text-dark font-weight-bold w-100">Birthday</label>
    			<div class="row">
    				<div class="col-md-3">
    					<select id="selectDay" name="select_day" class="form-control day" id="selectDay">
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    					</select>
    				</div>		
    				<div class="col-md-3">
    					<select id="selectMonth" name="select_month" class="form-control month" id="selectMonth">
    						<option value="10">10</option>
    						<option value="11">11</option>
    						<option value="12">12</option>
    					</select>
    				</div>	
    				<div class="col-md-3">
    					<select id="selectYear" name="select_year" class="form-control year" id="selectYear">
    						<option value="1994">1994</option>
    						<option value="1995">1995</option>
    						<option value="1996">1996</option>
    					</select>
    				</div>
    				<div class="col-md-3">&nbsp;</div>
    			</div>		
    			<label class="mt-2 text-dark font-weight-bold w-100">Gender</label>
    	        <strong><input type="radio" name="gender" value="male" > Male 
    		    <input type="radio" name="gender" value="female" class="ml-5"> Female </strong><br>
    		    <strong><input type="checkbox" name="remember" class="mt-3" id="remember"> Remeber me <a href="#">Term & Conditions</a></strong><br>
                <span class="error" id="rememberError"></span><br>
    		    <a href="#"><button class="btn mt-3">Sign up</button></a>
    		</form>
    	</div>
    	<div class="col-md-1">&nbsp;</div>
    </div>
</body>
<script>
    $(function(){
       $('#registrationForm').submit(function(e){
                   e.preventDefault();
                   var error = false;
                   var remember = $('input[type="checkbox"]:checked');
                   var PassWord = $('#password').val();
                   var confirmPassword = $('#confirmPassword').val();
                   if($('#firstName').val().length <= 0){
                       error = true;
                       $('#firstNameError').html("Please enter first name.");
                    } else {
                        $('#firstNameError').html("");
                    }
                   if($('#lastName').val().length <= 0){
                       error = true;
                       $('#lastNameError').html("Please enter last name.");
                    } else {
                        $('#lastNameError').html("");
                    }   
                   if ($('#email').val().length <= 0){
                       error = true;
                       $('#emailError').html("Please enter email.");
                    } else {
                        $('#emailError').html("");
                    } 
                    if ($('#phone').val().length <= 0) {
                        error = true;
                        $('#phoneError').html("please enter phone number");
                    }else if ($('#phone').val().length > 10) {
                        error = true;
                        $('#phoneError').html("please enter only 10 element");
                    }else{
                        $('#phoneError').html("");
                    }     
                    if( $('#password').val().length <= 0 ){
                       error = true;
                       $('#passwordError').html("Please enter password.");
                    }else {
                        $('#passwordError').html("");
                    }               
                    if( confirmPassword.length <= 0  ){
                         error = true;
                         $('#confirmPasswordError').html("Please enter password ");
                    }else if (confirmPassword != PassWord){
                          error = true;
                        $('#confirmPasswordError').html(" password does not match");
                    }else {
                        $('#confirmPasswordError').html("");
                       }
                    if (remember.length <= 0) {
                        error = true;
                        $('#rememberError').html("please select aggree.");
                    }else{
                        $('#rememberError').html("");
                    }     
                });
        
        });            
</script>
</html>
