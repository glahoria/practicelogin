<?php 
include 'connection.php';
?>
<?php 
 if (isset($_GET['update'])) {
 	$id = $_GET['update'];
 	$query = "SELECT * FROM `users` WHERE id = $id" ;
    $updateQuery = mysqli_query($conn, $query );
    $user = mysqli_fetch_assoc($updateQuery);
    }
?>
<!---update query---->
<?php 
  if (isset($_POST['update'])) {
  	$first_name = $_POST['first_name'];
  	$last_name = $_POST['last_name'];
  	$email = $_POST['email'];
  	$phone = $_POST['phone'];
  	$query = "UPDATE users SET first_name = '$first_name',last_name ='$last_name',email ='$email',phone ='$phone' WHERE id=$id ";
  	if(mysqli_query($conn,$query)){
		header('location:viewdata.php?message=updated');
	}  else {
		header('location:viewdata.php?message=not-updated');
		}
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>update user detail</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style >
        body {background: #f3f3f3;}
    </style>
</head>
<body>
    <div class="row mt-5 m-0 ">   
        <div class="col-md-5 m-auto bg-white">
            <form action="" method="post" id="registrationForm">
                <h1>update data</h1>
                <label class="mt-2 text-dark font-weight-bold w-100">First Name:</label>
                <input type="text" value="<?php echo $user['first_name']; ?>" name="first_name" placeholder="Firstname..." minlength="3" class="form-control" id="firstName">
                <label class="mt-2 text-dark font-weight-bold w-100">Last Name:</label>
                <input type="text" value="<?php echo $user['last_name']; ?>" name="last_name" placeholder="Lastname..." minlength="3" class="form-control" id="lastName">
                <label class="mt-2 text-dark font-weight-bold w-100">Email:</label>
                <input type="text" value="<?php echo $user['email']; ?>" name="email" placeholder="Email..." class="form-control mt-2" id="email">
                <label class="mt-2 text-dark font-weight-bold w-100">Phone:</label>
                <input type="text" value="<?php echo $user['phone']; ?>" name="phone" placeholder="Phone..."maxlength="15" class="form-control mt-2"id="phone">
                <a href="#"><button name="update" class="btn btn-success  mt-1 my-3 float-left form-control">Update</button></a>
            </form>
        </div>
    </div>
</body>
