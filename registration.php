
<?php 
     if (!empty($_REQUEST['email'])) {
     	echo "<pre>"; print_r($_REQUEST); echo "<pre>";
     }
     die;
?>
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
    	.btn{width: 30%;background: linear-gradient(#67ae55, #578843); }
        .error{color:red !important; font-size: 15px;}
    </style>
</head>
<body>
    <div class="row mt-5 m-0">
    	<div class="col-md-1">&nbsp;</div>
    	<div class="col-md-5">&nbsp;</div>
    	<div class="col-md-5">
    		<form action="registration.php" method="post" id="registrationForm">
    			<h1>Create an account</h1>
    			<div class="row mt-5 ">
    			    <div class="col-md-6">
    			        <input type="text" name="first_name" placeholder="Firstname..." minlength="3" class="form-control" id="firstName">
                        
    			    </div>
    			    <div class="col-md-6">
    			        <input type="text" name="last_name" placeholder="Lastname..." minlength="3" class="form-control" id="lastName">
    			    </div>
    			</div>
    			<input type="text" name="email" placeholder="Email..." class="form-control mt-2" id="email">
    			<input type="password" name="password" placeholder="Password..." minlength="10" class="form-control mt-2" id="password">
    			<input type="password" name="confirm_password" placeholder="Confirm-Password..." class="form-control mt-2" id="confirmPassword">
    			<input type="text" name="phone" placeholder="Phone..."maxlength="10" class="form-control mt-2"
                id="phone">
                <span class="error" id="phoneError"></span>
    			<label class="mt-2 text-dark font-weight-bold w-100">Birthday</label>
    			<div class="row ">
    				<div class="col-md-4">
    					<select id="selectDay" name="birth"  class="form-control " id="selectDay">
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    					</select>
    				</div>		
    				<div class="col-md-4">
    					<select id="selectMonth" name="birth" class="form-control " id="selectMonth">
    						<option value="10">10</option>
    						<option value="11">11</option>
    						<option value="12">12</option>
    					</select>
    				</div>	
    				<div class="col-md-4">
    					<select id="selectYear" name="birth" class="form-control " id="selectYear">
    						<option value="1994">1994</option>
    						<option value="1995">1995</option>
    						<option value="1996">1996</option>
    					</select>
    				</div>
    			</div>		
    			<label class="mt-2 text-dark font-weight-bold w-100">Gender</label>
    	        <strong class="chek"><input type="radio" name="gender" value="male" > Male 
    		    <input type="radio" name="gender" class="ml-5" value="male"> Female </strong><br>
    		    <strong class="chek"><input type="checkbox" name="i_agree" class="mt-3" id="remember"> Remeber me <a href="#">Term & Conditions</a></strong><br>
    		    <a href="#"><button class="btn mt-1">Sign up</button></a>
    		</form>
    	</div>
    	<div class="col-md-1">&nbsp;</div>
    </div>
</body>
<script>
    $(function(){
            $('#registrationForm').validate({
            	rules:{
            		first_name:{
            			required:true,
                        minlength:3       
            		},
            		last_name:{
            			required:true,
                        minlength:3       
            		},
            		email:{
            			required:true,
                        email:true       
            		},
            		password:{
            			required:true,       
            		},
            		confirm_password:{
            			required:true,
            			equalTo:password
            		},
            		phone:{
            			required:true,
            			maxlength:10
            		},
            		gender:{
            			required:true,	
            		},
            		i_agree:{
            			required:true,
            		},
            	},
            	messages:{
            	    first_name:{
            			required:"please enter first name.",       
            		},
            		last_name:{
            			required:"please enter last name.",       
            		},
            		email:{
            			required:"please enter valid email.",      
            		},
            		password:{
            			required:"please enter password.",       
            		},
            		confirm_password:{
            			required:"please enter confirm password.",
            			equalTo:"password does not match."
            		},
            		gender:{
            			required:"please select gender.",	
            		},
            		i_agree:{
            			required:"please select i agree.",
            		},
                },	
            });            
        });

</script>
</html>
