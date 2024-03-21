<aside>
            <div class="top">
                <div class="logo">
                   <a href="../index.php"><h2>E<span class="danger">duka</span></h2></a> 
                    <div class="close" id="close-btn"><span><i class="fa fa-times"></i></span></div>
                </div>
            </div>
            <div class="sidebar">
                <a href="index.php" class="active">
                    <span><i class="fa fa-th-large" aria-hidden="true"></i></span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./customers.php">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>

                    <h3>Customers</h3>
                </a>
                <a href="./orders.php">
                    <span><i class="fa fa-clipboard" aria-hidden="true"></i></span>

                    <h3>Orders</h3>
                </a>
                <a href="./products.php">
                    <span> <i class="fa fa-line-chart" aria-hidden="true"></i></span>

                    <h3>Products</h3>
                </a>
                <a href="messages.php">
                    <span> <i class="fa fa-envelope-open" aria-hidden="true"></i></span>

                    <h3>Messages</h3>
                    <?php
                     $statement = "SELECT * FROM messages";
                     $result = mysqli_query($connection, $statement);
                     $row = mysqli_num_rows($result);
                    ?>
                    <span class="message-count"><?=$row?></span>
                </a>
                <a href="./employees.php">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>

                    <h3>Employees</h3>
                </a>
                <a href="#">
                    <span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>

                    <h3>Reports</h3>
                </a>
                <a href="setting.php">
                    <span> <i class="fa fa-cogs" aria-hidden="true"></i></span>

                    <h3>Settings</h3>
                </a>
                <a href="addEmployees.php">
                    <span><i class="fa fa-plus" aria-hidden="true"></i></span>

                    <h3>Add Employees</h3>
                </a>
                <a href="./logout.php">
                    <span><i class="fa fa-sign-out" aria-hidden="true"></i></span>

                    <h3>Logout</h3>
                </a>
            </div>
        </aside>