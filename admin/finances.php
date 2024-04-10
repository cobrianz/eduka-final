<?php require './header/header.php'; ?>

<body>
    <div class="container">
        <?php require './_aside-left/aside-left.php'; ?>

        <!-- main -->
        <main>
        
            <!-- end of insights -->
            <div class="recent-orders">
                <h1 style="text-align: center;">Financial Statements</h1>
                <table>
                    <thead>
                        <tr style="font-size: 1.5rem" >
                            <th>Transaction ID</th>
                            <th>User ID</th>
                            <th>Order ID</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT transaction_id, user_id, transaction_date, description, debit, credit, balance FROM finances";

                    // Execute the query
                    $result = mysqli_query($connection, $sql);

                    // Initialize total variables
                    $totalDebit = 0;
                    $totalCredit = 0;

                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Output data in each row into table rows
                            echo "<tr>";
                            echo "<td>" . $row['transaction_id'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['debit'] . "</td>";
                            echo "<td>" . $row['credit'] . "</td>";
                            echo "<td>" . $row['transaction_date'] . "</td>";
                            echo "</tr>";

                            // Accumulate totals
                            $totalDebit += $row['debit'];
                            $totalCredit += $row['credit'];
                        }

                        // Display totals row
                        echo "<tr>";
                        echo "<td colspan='2'></td>";
                        echo "<td><b>Totals</b></td>";
                        echo "<td> <b>$totalDebit</b></td>";
                        echo "<td><b>$totalCredit</b> </td>";
                        echo "<td><b>Revenue: " . ($totalCredit - $totalDebit) . "</b></td>";
                        echo "</tr>";
                    } else {
                        // If no results found
                        echo "<tr><td colspan='6'>No financial data available</td></tr>";
                    }?>
                        
                    </tbody>
                </table>
                <!-- <a href="#">Show All</a> --> <!-- You can add this if needed -->
            </div>
        </main>

        <?php require './_aside-right/aside-right.php'; ?>
    </div>

    <script src="./orders.js"></script>
    <script src="./index.js"></script>
</body>
</html>
