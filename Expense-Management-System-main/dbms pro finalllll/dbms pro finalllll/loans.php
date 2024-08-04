<?php

require_once('db_config.php');
$q3="select * from loans";
$res3=mysqli_query($con,$q3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Tracker</title>
    <style>
        /* Basic styling */
        body {
            height:100vh;
            background: linear-gradient(purple, black);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            margin-bottom: 10px;
            color:white
        }
        table {
            width: 100%;
            border-collapse: collapse;
            color:white
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color:black;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        /* Form styling */
        form {
            margin-bottom: 20px;
            color:white
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: calc(100% - 18px);
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Loan</h2>
        <form id="loanForm" action="add_loan.php" method="post">
            <label for="lenderName">Lender Name:</label><br>
            <input type="text" id="lenderName" name="lenderName" required><br>
            <label for="amount">Amount:</label><br>
            <input type="number" id="amount" name="amount" step="0.01" required><br>
            <label for="issueDate">Issue Date:</label><br>
            <input type="date" id="issueDate" name="issueDate" required><br>
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br>
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select><br><br>
            <input type="submit" value="Add Loan">
        </form>

        <h2>Loan List</h2>
        <table id="loanTable">
            <thead>
                <tr>
                    <th>Lender Name</th>
                    <th>Amount</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
                <tr>
                <?php
                 while ($row =mysqli_fetch_assoc($res3))
                 {
                ?>
                  <td><?php echo $row['lender_name']?></td>
                  <td><?php echo $row['amount']?></td>
                  <td><?php echo $row['issue_date']?></td>
                  <td><?php echo $row['due_date']?></td>
                  <td><?php echo $row['status']?></td>
                 </tr>
                 <?php  
                 }
                ?>
            </tr>
            </thead>
            <tbody id="loanTableBody">
                <!-- Loan data will be populated here -->
            </tbody>
        </table>
    </div>
</body>
</html>
