<!DOCTYPE html>
 <html>
 <head>
    <title>welcome to my site</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        body {background: #f3f3f3;}
        .email{text:center;font-size:200px; color:white;}
        .error{color:red !important;} 
    </style>
 </head>
 <body>
    <div class="row mt-5 m-0" >
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4 bg-light rounded">
            <form action="index.php" method="post" id="loginForm">
                <h1 class="font-weight-bold text-center text-dark">Login</h1>
                <label>Username</label>
                <input type="text" name="email" placeholder="Type your username" class="form-control">
                <label class="w-100">Password</label>
                <input type="Password" name="Password" placeholder="********" class="form-control">
                <p class="text-right mt-1"><a href="#">Forgot password ?</a></p>
                <button class="btn btn-primary form-control rounded">Login</button>
                <p class=" mt-2 my-5"><a href="registration.php">create new account</a></p>
            </form>    
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>
    <script>
        $(function() {
            $('#loginForm').validate({
               rules:{
                    email: {required:true},
                    Password: {required:true},
                },
            });
        });

    </script>
 </body>
 </html>