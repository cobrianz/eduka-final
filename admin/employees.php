
<?php
require './header/header.php';
?>
<body>
    <div class="container">
    <?php
        require './_aside-left/aside-left.php';
        ?>

        <!-- main -->
        <main>
            <!-- end of insights -->
            <div class="recent-orders">
                <h1>Employees</h1>
                <?php if(isset($_SESSION['add-employee-success'])): ?>
    
                    <div class="alert__message success">
                    <p><?= $_SESSION['add-employee-success'];
                    unset($_SESSION['add-employee-success']);
                    ?></p>
                    </div>
                    <?php endif;?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                // Fetch user data from the database
                $fetch_user_query = "SELECT * FROM employees";
                $fetch_user_result = mysqli_query($connection, $fetch_user_query);

                // Convert the record into an associative array
                while($user_record = mysqli_fetch_assoc($fetch_user_result)):
            ?>
                <tr>
                    <td><?= $user_record['id'] ?></td>
                    <td><?= $user_record['name'] ?></td>
                    <td><?= $user_record['email'] ?></td>
                    <td class="primary"><?= $user_record['role'] ?></td>
                    <td></td>
                </tr>
            <?php endwhile; ?>

                </table>
                <a href="#">Show All</a>
            </div>
        </main>

        <!-- end of main -->
        <?php 
        require './_aside-right/aside-right.php';
        ?>
    </div>

    <script src="./orders.js"></script>
    <script src="./index.js"></script>
</body>
<!-- copyright @Briankipkemoi
 CREATED AND ONWNED BY BRIAN KIPKEMOI CHERUIYOT
 -->
</html>