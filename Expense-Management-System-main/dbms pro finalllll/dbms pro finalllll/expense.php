<?php

require_once('db_config.php');
$q1="select * from expenses";
$res=mysqli_query($con,$q1);


$totalExpenseQuery = "SELECT SUM(amount) AS total_amount FROM expenses";
$totalExpenseResult = mysqli_query($con, $totalExpenseQuery);
$totalExpenseRow = mysqli_fetch_assoc($totalExpenseResult);
$totalExpense = $totalExpenseRow['total_amount'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="st2.css">
</head>
<body>
    <div class="frrrrr">
    <div class="navbar">
        <a href="./expense.php">Expenses</a>
        <a href="./debt.php">Debts</a>
        <a href="./loans.php">Loans</a>
    </div>
    <h2>Add Expense</h2>
    <form id="expenseForm" action="add_expense.php" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>
        <input type="submit" id="ad" name="submit" value="Add Expense">
    </form>

    <h2>Expense List</h2>
    <table id="expenseTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
            <tr>
                <?php
                 while ($row =mysqli_fetch_assoc($res))
                 {
                ?>
                  <td><?php echo $row['date']?></td>
                  <td><?php echo $row['amount']?></td>
                  <td><?php echo $row['category']?></td>
                  <td><?php echo $row['description']?></td>
                 </tr>
                 <?php  
                 }
                ?>


            </tr>

        </thead>
        <tbody id="expenseTableBody">
        </tbody>
    </table>

    <h2>Total Expense: <span id="totalExpense"><?php echo $totalExpense ?></span></h2>
    <canvas id="expenseChart" width="300" height="300"></canvas>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript code for pie chart -->
<script>
    // Get data for the pie chart
    var expenseData = [
        <?php
            $expenseCategoriesQuery = "SELECT category, SUM(amount) AS total_amount FROM expenses GROUP BY category";
            $expenseCategoriesResult = mysqli_query($con, $expenseCategoriesQuery);
            while ($categoryRow = mysqli_fetch_assoc($expenseCategoriesResult)) {
                echo "{
                    label: '" . $categoryRow['category'] . "',
                    data: " . $categoryRow['total_amount'] . ",
                    backgroundColor: getRandomColor(),
                },";
            }
        ?>
    ];

    // Generate random colors for the pie chart
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Draw the pie chart
    var ctx = document.getElementById('expenseChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: expenseData.map(item => item.data),
                backgroundColor: expenseData.map(item => item.backgroundColor),
            }],
            labels: expenseData.map(item => item.label),
        },
        options: {
            responsive: true,
        }
    });
</script>
    </div>
</body>
</html>
