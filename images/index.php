<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Image upload</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        .profile-wrapper {
        	border: 1px solid black;
            box-shadow: 0 10px 15px rgba(0,0,0,0.3);            
        }
        img {
        	display: block;
        	width: 60%;
        	margin: 5% auto;
        	border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="row mt-5 m-0">
    <div class="col-md-3 m-auto bg-white  profile-wrapper ">
      	<h3 class="text-center mt-2">Profile Upload</h3>
      	<?php if (!empty($msg)) : ?>
      	<div class="alert <?= $css; ?>">
      		<?= $msg; ?>
      		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      	</div>
      <?php endif ?>
      	<form action="index.php" method="post" enctype="multipart/form-data">
      		<img src="gallary/placeholder.png" id="profileImage" onclick="triggerClick()">
            <label for="image" class="w-100 mt-1 text-center">Profile image</label>
      	    <input type="file" name="image" class="form-control" id="image" onchange="readURL(this)" style="display: none;">
      	    <button name="submit" id="submit" class="btn btn-success btn-sm mt-4 mb-5 form-control">Submit</button>	
      	</form>
      </div>
      </div>
      <script>
      	
      	function triggerClick() {
            document.querySelector('#image').click();
        }
        function readURL(e){
 var ext = e.files[0]['name'].substring(e.files[0]['name'].lastIndexOf('.') + 1).toLowerCase();
if (e.files && e.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#profileImage').attr('src', e.target.result);
        
    }

    reader.readAsDataURL(e.files[0]);
}


      </script>
</body>
</html>