<?php
// Include the database configuration file
require_once 'db_config.php';

if(isset($_POST['submit'])){
    $lenderName = $_POST['lenderName'];
    $amount = $_POST['amount'];
    $issueDate = $_POST['issueDate'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];
    $query3 = "INSERT INTO loans (lender_name, amount, issue_date, due_date, status) VALUES ('$lenderName', '$amount', '$issueDate', '$dueDate', '$status')";
    if(mysqli_query($con, $query3)) {
        echo "<script>alert('Data Inserted');</script>";
    } else {
        echo "Error: " . $query3 . "<br>" . mysqli_error($con);
    }
}
?>