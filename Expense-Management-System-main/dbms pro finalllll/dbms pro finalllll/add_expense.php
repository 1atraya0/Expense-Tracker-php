<?php
// Include the database configuration file
require_once 'db_config.php';

if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $amount =$_POST['amount'];
    $category =$_POST['category'];
    $description =$_POST['description'];
}
$query = "insert into expenses values('','$date','$amount','$category','$description')" ;
mysqli_query($con, $query);
echo 
"<script> alert('Data Inserted ');</script>";

?>

