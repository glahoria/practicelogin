<?php include "connection.php"; ?>
<?php
	$query = "SELECT * FROM `users`" ;
	
	$key = "";
	if(!empty($_REQUEST['key'])){
			$key = $_REQUEST['key'];
			$searchInFields = ['first_name','last_name','email','phone'];
			$whereArray = [];
			foreach($searchInFields as $searchInField){
				$whereArray[] = $searchInField." LIKE '%".$key."%'";
				//$whereArray[] = $searchInFriled." = '".$_GET['key']."'";
			}
			
			$query = $query. " WHERE " . implode(" OR ", $whereArray);
			$_GET['key'] = $key;
				
	} 
	
	
    $exe = mysqli_query($conn, $query );
    $limit = 2;
    $rows = mysqli_num_rows($exe);
    $pages = ceil($rows/$limit);
    $page = isset($_GET['page']) ?  $_GET['page'] : 1;
    $offset = ($page-1)*$limit;
    $Previous = $page-1 ;
    $Next = $page+1 ;
    $i = 1;
	
	$_GET['sort_order'] =  empty($_GET['sort_order']) ? "asc" : (($_GET['sort_order'] == "asc") ? "desc" : "asc");  
	
	if(!empty($_GET['sort_by'])){
			$query = $query. " ORDER BY " . $_GET['sort_by']." " .$_GET['sort_order'];
	} 
	
	unset($_GET['sort_by']);
	
	$query = $query. " LIMIT ".$offset.",".$limit;
	
	$exe = mysqli_query($conn, $query );
	
	$url = $_SERVER['PHP_SELF']."?".http_build_query($_GET)."&page=PAGE&sort_by=";
    
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
		.active a{color:red !important;}
    </style>
</head>
<body>
    <div class="raw mt-5">
        <div class="col-md-12 m-auto">
            <h1 class="text-dark text-center">Display data</h1>	
            <div class="col-md-4 float-left">
                <h3 class="text-primary font-weight-bold">Showing Page: <?= $page; ?> / <?php echo $pages; ?></h3>
            </div>
            
            <div class="col-md-4 float-right my-3">
            <form action="viewdata2.php?page=<?= $page; ?>" method="post">
				<input type="text" name="key" id="searchKey" class="form-control-sm form-control" value="<?= $key; ?>" placeholder="Search...">
            </form>
            </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <tr class="text-center bg-primary text-white sort">
                    <th>Sr No.</th>
                    <th><a class="text-white" href="<?= str_replace("PAGE", $page, $url); ?>first_name">First Name</a></th>
                    <th><a class="text-white" href="<?= str_replace("PAGE", $page, $url); ?>last_name">Last Name</a></th>
                    <th><a class="text-white" href="<?= str_replace("PAGE", $page, $url); ?>email">Email</a></th>
                    <th><a class="text-white" href="<?= str_replace("PAGE", $page, $url); ?>phone">Phone</a></th>
                    <th>Action</th>
                </tr>
		 
	        	<?php	while ($result = mysqli_fetch_array($exe)) { ?>
    	        <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['first_name']; ?></td>
                    <td><?php echo $result['last_name']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><button class="btn btn-success btn-sm"><i class="fa fa-eye-slash"></i> View</button>
                        <button class="btn btn-warning btn-sm update"><a href="update.php?update=<?php echo $result['id']; ?>" class="text-white"><i class="fa fa-pencil"></i> Edit</a></button>
                        <button class="btn btn-danger btn-sm delete" id="<?php echo $result['id']; ?>"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>
            <?php
                $i++;
                }  
            ?>
            </table>
        </div>
    <div class="col-md-6 float-right">
    	<nav aria-label="Page navigation example">
    	    <ul class="pagination">
    	    	<?php if ($page > 1) { ?>
                <li class="page-item"><a class="page-link" href="<?= str_replace("PAGE", $Previous, $url); ?>" aria-label="Previous">&laquo; Previous</a></li>
                <?php } ?>
                <?php for($i = 1; $i <= $pages; $i++) : ?>
                    <li <?php if($page == $i) { ?>class="active" <?php } ?>><a  class="page-link" href="<?= str_replace("PAGE", $i	, $url); ?>"><?= $i; ?></a></li>     
		        <?php endfor; ?>
		        <?php if ($page != $pages) { ?>
                <li class="page-item"><a class="page-link" href="<?= str_replace("PAGE", $Next, $url); ?>" aria-label="Next">Next &raquo;</a></li>
                <?php } ?>
            </ul>
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
