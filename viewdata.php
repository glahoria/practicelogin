
<!DOCTYPE html>
<html>
<head>
	<title>view database</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
    <div class="raw mt-5">
    	<div class="col-md-12 m-auto">
    		<h1 class="text-dark text-center">Display data</h1>
    		<table class="table table-striped table-hover table-bordered">
    			<tr class="text-center bg-dark text-white">
    				<th>Id</th>
    				<th>First_name</th>
    				<th>Last_name</th>
    				<th>Email</th>
    				<th>password</th>
    				<th>Phone</th>
    				<th>Date_of_birth</th>
    				<th>Gender</th>
    				<th>Action</th>
    			</tr>
<?php
include "connection.php";
    $query = "SELECT * FROM `accounts`" ;
    $insert = mysqli_query($conn, $query );
    $id = 1;
    while ($result = mysqli_fetch_array($insert)) {                
?>
    			<tr>
    				<td><?php echo $result['id']; ?></td>
    				<td><?php echo $result['first_name']; ?></td>
    				<td><?php echo $result['last_name']; ?></td>
    				<td><?php echo $result['email']; ?></td>
    				<td><?php echo $result['password']; ?></td>
    				<td><?php echo $result['phone']; ?></td>
    				<td><?php echo $result['date_of_birth']; ?></td>
    				<td><?php echo $result['gender']; ?></td>
    				<td><button class="btn btn-danger">delete</button>
                        <button class="btn btn-primary">update</button>
    				</td>
    			</tr>

    			<?php
    			 }  
    			?>
    		</table>
    	</div>
    </div>
</body>
</html>