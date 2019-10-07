<?php include "connection.php"; ?>

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
            <table class="table table-striped table-hover table-bordered">
                <tr class="text-center bg-dark text-white sort">
                    <th>Sr No.</th>
                    <th data-id="first_name">First Name</th>
                    <th data-id="last_name">Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
<?php
	$query = "SELECT * FROM `users`" ;
	if(!empty($_GET['sort_by'])){
			$order = $_GET['sort_by'];
			if(empty($_GET['sort_order'])){
				$order = $order." asc";
			} else {
				$order = $order." " .$_GET['sort_order'];
			}
			
			//pr($order); die;
			
			$query = $query. " ORDER BY " .$order;
			
			
	}
	
	pr($query);
    
    $insert = mysqli_query($conn, $query );
    $i = 1;
    while ($result = mysqli_fetch_array($insert)) {                
?>
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
var sortOrder = "<?= empty($_GET['sort_order']) ? "asc" : (($_GET['sort_order'] == "asc") ? "desc" : "asc");  ?>";	
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
	
	$('.sort th').click(function(e){
		window.location.href =  window.location.href.split("?")[0] + "?sort_by="+$(this).attr('data-id')+"&sort_order="+sortOrder
	});
});
</script>
</body>
</html>
