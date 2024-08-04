<?php

require_once('db_config.php');
$q2="select * from debts";
$res2=mysqli_query($con,$q2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debt Tracker</title>
    <style>
        /* Basic styling */
        *{
            color:white;
        }
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
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        tr th{
            color:black;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        /* Form styling */
        form {
            margin-bottom: 20px;
        }
        form input{
            color:black
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
            color:black;
            background-color: #45a049;
        }
        #status{
            color:grey;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Debt</h2>
        <form id="debtForm" action="add_debt.php" method="post">
            <label for="debtorName">Debtor Name:</label><br>
            <input type="text" id="debtorName" name="debtorName" required><br>
            <label for="amount">Amount:</label><br>
            <input type="number" id="amount" name="amount" step="0.01" required><br>
            <label for="dueDate">Due Date:</label><br>
            <input type="date" id="dueDate" name="dueDate" required><br>
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
            </select><br><br>
            <input type="submit" value="Add Debt">
        </form>

        <h2>Debt List</h2>
        <table id="debtTable">
            <thead>
                <tr>
                    <th>Debtor Name</th>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
                <tr>
                <?php
                 while ($row =mysqli_fetch_assoc($res2))
                 {
                ?>
                  <td><?php echo $row['debtor_name']?></td>
                  <td><?php echo $row['amount']?></td>
                  <td><?php echo $row['due_date']?></td>
                  <td><?php echo $row['status']?></td>
                 </tr>
                 <?php  
                 }
                ?>


            </tr>
            </thead>
            <tbody id="debtTableBody">
                <!-- Debt data will be populated here -->
            </tbody>
        </table>
    </div>
</body>
</html>
