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
                <h1 style="padding: 1rem;">Messages</h1>
                <?php
                // Fetch user data from the database
                $fetch_user_query = "SELECT * FROM messages";
                $fetch_user_result = mysqli_query($connection, $fetch_user_query);

                // Convert the record into an associative array
                while ($user_record = mysqli_fetch_assoc($fetch_user_result)):                    ?>
                    <div class="dropdown-content" Id="message">
                        <p><b>
                           From:     <?= $user_record['name'] ?>
                            </b></p>
                        <small style="font-size: 1rem;">
                           Email: <?= $user_record['email'] ?>
                        </small>
                        <p style="font-size: 1.1rem;">
                          Message: <b>  <?= $user_record['message'] ?></b>
                        </p>
                    </div>

                <?php endwhile; ?>

            </div>
        </main>

        <!-- end of main -->

        <?php
        require './_aside-right/aside-right.php';
        ?>
    </div>
    <script>
        // Add event listeners to each message row to toggle dropdown visibility
        const messageRows = document.querySelectorAll('.messageRow');
        const message = document.getElementById('#message');
        messageRows.forEach(row => {
            row.addEventListener('click', () => {
                message.style.display = 'flex';
            });
        });
    </script>

    <script src="./orders.js"></script>
    <script src="./index.js"></script>
</body>
<!-- copyright @Briankipkemoi
 CREATED AND ONWNED BY BRIAN KIPKEMOI CHERUIYOT
 -->

</html>