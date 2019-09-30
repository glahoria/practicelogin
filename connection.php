<?php
$conn = mysqli_connect("localhost", "root", "lahoria6522", "dw");
   if (isset($_REQUEST['submit'])) {
        $first = $_REQUEST['first_name'];
        $last = $_REQUEST['last_name'];
        $email= $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $phone  = $_REQUEST['phone'];
        $birth_date = $_POST['birth_year'] . '-' . $_POST['birth_month'] . '-' . $_POST['birth_day'];
        $gender = $_REQUEST['gender'];
        $i_agree = $_REQUEST['i_agree'];
        $query = "INSERT INTO accounts (first_name,last_name,email,password,phone,date_of_birth,gender,i_agree) VALUES ('$first','$last','$email','$password','$phone','$birth_date','$gender','$i_agree')" ;
        $insert = mysqli_query($conn, $query );
        mysqli_close($conn);
    }
?>