<?php

//get back form data after an error occurred

$name = $_SESSION['employee-data']['name'] ?? null;
$email = $_SESSION['employee-data']['email'] ?? null;
$role = $_SESSION['employee-data']['role'] ?? null;

//delete the employee data session
unset($_SESSION['employee-data']);

?>
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
            <div class="form">
                <h1>Add Employees</h1>
                <small>Please enter details</small>
                <?php if (isset($_SESSION['add-epmloyee'])): ?>
                    <div class="alert__message error">
                        <p>
                            <?= $_SESSION['add-epmloyee'];
                            unset($_SESSION['add-epmloyee']);
                            ?>
                        </p>
                    </div>

                    <?php
                endif ?>


                <form action="addemployee-logic.php" method="POST">
                    <label for="name">Full Name *</label>
                    <input type="text" name="name" value="<?= $name ?>">
                    <label for="name">Email Address *</label>
                    <input type="email" name="email" value="<?= $email ?>">
                    <label for="name">Role *</label>
                    <input type="text" name="role" value="<?= $role ?>">
                    <button type="submit" class="btn form__btn" name="submit">Add Employee</button>
                </form>
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