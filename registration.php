<?php include "connection.php"; ?>
<?php 
 if (isset($_REQUEST['submit'])) {
        $first = $_REQUEST['first_name'];
        $last = $_REQUEST['last_name'];
        $email= $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $phone  = $_REQUEST['phone'];
        $birth_date = $_POST['birth_year'] . '-' . $_POST['birth_month'] . '-' . $_POST['birth_day'];
        $gender = $_REQUEST['gender'];
        $iAgree = $_REQUEST['i_agree'];
        $created = date('Y-m-d H:i:s');
        $modified = date('Y-m-d H:i:s');
        
        $query = "INSERT INTO users (first_name,last_name,email,password,phone,date_of_birth,gender,i_agree,created,modified) VALUES ('$first','$last','$email','$password','$phone','$birth_date','$gender','$iAgree','$created','$modified')" ;
        $insert = mysqli_query($conn, $query );
        mysqli_close($conn);
        pr($insert);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
                <input type="text" name="phone" placeholder="Phone..."maxlength="15" class="form-control mt-2"
                id="phone">
                <span class="error" id="phoneError"></span>
                <label class="mt-2 text-dark font-weight-bold w-100">Birthday</label>
                <div class="row ">
                    <div class="col-md-4">
                        <select id="selectDay" name="birth_day"   class="form-control " id="selectDay">
                            <?php 
                            $day = range(1,31);
                            foreach ($day as $i) { ?>
                             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
                            <?php  } ?>
                            
                        </select>
                    </div>      
                    <div class="col-md-4"> 
                        <select id="selectMonth" name="birth_month" class="form-control " id="selectMonth">
                            <?php 
                            $month = range(1,12);
                            foreach ($month as $i) { ?>
                             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
                            <?php  } ?>
                        </select>
                    </div>  
                    <div class="col-md-4">
                        <select id="selectYear" name="birth_year" class="form-control " id="selectYear">
                            <?php 
                            $year = range(1900,2001);
                            foreach ($year as $i) { ?>
                             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
                            <?php  } ?>
                        </select>
                    </div>
                </div>         
                <label class="mt-2 text-dark font-weight-bold w-100">Gender</label>
                <strong><input type="radio" name="gender" value="male" > Male 
                <input type="radio" name="gender" value="female" class="ml-5"> Female </strong>
                <br>
                <label id="gender-error" class="error" for="gender" style="display:none">please select gender.</label> <br />

                <strong><input type="checkbox" name="i_agree" class="mt-3" id="remember"> Remeber me <a href="#">Term & Conditions</a></strong><br>
                <label id="i_agree-error" class="error" for="i_agree" style="display:none">please select i agree.</label> <br />
                <a href="#"><button name="submit" class="btn mt-3">Sign up</button></a>
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
                        minlength:10       
                    },
                    confirm_password:{
                        required:true,
                        equalTo:password
                    },
                    phone:{
                        required:true,
                        maxlength:15
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
