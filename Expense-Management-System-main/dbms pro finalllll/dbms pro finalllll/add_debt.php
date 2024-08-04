<?php
// Include the database configuration file
require_once 'db_config.php';

if(isset($_POST['submit'])){
    $debtor_name = $_POST['debtorName'];
    $amount = $_POST['amount'];
    $due_date = $_POST['dueDate'];
    $status = $_POST['status'];
}
$query = "INSERT INTO debts (debtor_name, amount, due_date, status) VALUES ('$debtor_name', '$amount', '$due_date', '$status')";
mysqli_query($con, $query);
echo 
"<script> alert('Data Inserted ');</script>";

?>
