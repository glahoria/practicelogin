<?php 
$img= "";
$css= "";
$conn = mysqli_connect('localhost','root','lahoria6522','gallary');
if (isset($_POST['submit'])) {
	$image =  time() .'_'. $_FILES['image']['name'];
	$target = 'gallary/' .$image;
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$query = "INSERT INTO images (image) VALUES ('$image') ";
		if (mysqli_query($conn,$query)) {
			$msg = " Image uploaded succesfully";
		    $css = "alert-success";
		}
		
	    else{
		    $msg = "Failed to Image uploaded";
		    $css = "alert-danger";
	    }
    }
}
?>