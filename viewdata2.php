<?php include "connection.php"; ?>
<?php
	//parse_str($_SERVER['QUERY_STRING'], $queries); 
	
	$_GET['sort_order'] =  empty($_GET['sort_order']) ? "asc" : (($_GET['sort_order'] == "asc") ? "desc" : "asc");  

	$query = "SELECT * FROM `users`" ;
	
	if(!empty($_GET['key'])){
			$searchInFrileds = ['first_name','last_name','email','phone'];
			$whereArray = [];
			foreach($searchInFrileds as $searchInFriled){
				//$whereArray[] = $searchInFriled." LIKE '%".$_GET['key']."%'";
				$whereArray[] = $searchInFriled." = '".$_GET['key']."'";
			}
			
			$query = $query. " WHERE " . implode(" OR ", $whereArray);
				
	} 
	
	if(!empty($_GET['sort_by'])){
			$query = $query. " ORDER BY " . $_GET['sort_by']." " .$_GET['sort_order'];
	} 
	
	pr($query);
	
	unset($_GET['sort_by']);
	
	$url = $_SERVER['PHP_SELF']."?".http_build_query($_GET)."&sort_by=";
    $insert = mysqli_query($conn, $query );
    $i = 1;
?>


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
    <style>
		.sort th {cursor:pointer;}
    </style>
</head>
<body>
    <div class="raw mt-5">
        <div class="col-md-12 m-auto">
            <h1 class="text-dark text-center">Display data</h1>
            <form action="">
				<input type="text" name="key" id="searchKey" class="form-control" placeholder="Search...">
            </form>
            <table class="table table-striped table-hover table-bordered">
                <tr class="text-center bg-dark text-white sort">
                    <th>Sr No.</th>
                    <th><a href="<?= $url; ?>first_name">First Name</a></th>
                    <th><a href="<?= $url; ?>last_name">Last Name</a></th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
		<?php  while ($result = mysqli_fetch_array($insert)) { ?>
    	        <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['first_name']; ?></td>
                    <td><?php echo $result['last_name']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><button class="btn btn-primary btn-sm">Detail</button>
                        <button class="btn btn-dark btn-sm update"><a href="update.php?update=<?php echo $result['id']; ?>" class="text-white">Edit</a></button>
                        <button class="btn btn-danger btn-sm delete" id="<?php echo $result['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php
                $i++;
                }  
            ?>
            </table>
        </div>
    </div>

<script>
$(function() {
	$(".delete").click(function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?")) {
		 $.ajax({
			   type: "POST",
			   url: "delete.php",
			   data: {idDelete:id},
			   success: function(data){
				}
			});
			$(this).parents('tr').hide(); 
		 }

		return false;
	});
	
});
</script>
</body>
</html>
