<?php
 include('connection.php');
 
$id = $_POST['idDelete'];
$query = " DELETE FROM `accounts` WHERE id = $id ";

mysqli_query($conn, $query);

header('location:viewdata.php');


?>