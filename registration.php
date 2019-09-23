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
    </style>
</head>
<body>
    <div class="row mt-5 ">
    	<div class="col-md-1">&nbsp;</div>
    	<div class="col-md-5">&nbsp;</div>
    	<div class="col-md-5">
    		<form action="" method="">
    			<h1>Create an account</h1>
    			<div class="row mt-5 ">
    			    <div class="col-md-6">
    			        <input type="text" name="firstName" placeholder="Firstname..." class="form-control">
    			    </div>
    			    <div class="col-md-6">
    			        <input type="text" name="lastName" placeholder="Lastname..." class="form-control">
    			    </div>
    			</div>
    			<input type="text" name="email" placeholder="Email..." class="form-control mt-2">
    			<input type="password" name="password" placeholder="Password..." class="form-control mt-2">
    			<input type="password" name="confirmPassword" placeholder="Password..." class="form-control mt-2">
    			<input type="text" name="number" placeholder="Phone..." class="form-control mt-2">
    			<label class="mt-2 text-dark font-weight-bold">Birthday</label>
    			<div class="row">
    				<div class="col-md-3">
    					<select id="selectDay" name="select_day" class="form-control day">
    						<option value="">Day</option>
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    					</select>
    				</div>		
    				<div class="col-md-3">
    					<select id="selectMonth" name="select_month" class="form-control month">
    						<option value="">Month</option>
    						<option value="10">10</option>
    						<option value="11">11</option>
    						<option value="12">12</option>
    					</select>
    				</div>	
    				<div class="col-md-3">
    					<select id="selectYear" name="select_year" class="form-control year">
    						<option value="">Year</option>
    						<option value="1994">1994</option>
    						<option value="1995">1995</option>
    						<option value="1996">1996</option>
    					</select>
    				</div>
    				<div class="col-md-3">&nbsp;</div>
    			</div>		
    			<label class="mt-2 text-dark font-weight-bold w-100">Gender</label>
    	        <strong><input type="radio" name="male" > Male 
    		    <input type="radio" name="female" class="ml-5"> Female </strong><br>
    		    <strong><input type="checkbox" name="remember" class="mt-3"> Remeber me <a href="#">Term & Conditions</a></strong><br>
    		    <button class="btn  mt-3 ">Sign up</button>
    		</form>
    	</div>
    	<div class="col-md-1">&nbsp;</div>
    </div>
</body>
</html>