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
                   <div class="dropdown-content" id="message<?= $user_record['id'] ?>">
                        <p><b>From: <?= $user_record['name'] ?></b></p>
                        <small style="font-size: 1rem;">Email: <?= $user_record['email'] ?></small>
                        <p style="font-size: 1.1rem;">Message: <b><?= $user_record['message'] ?></b></p>
                        <button class="deleteButton" style="color: red;
                        text-align: right;
                        padding: 0.5rem 1rem;
                        background-color: transparent;
                        "
                         data-id="<?= $user_record['id'] ?>">Delete</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listeners to delete buttons
        const deleteButtons = document.querySelectorAll('.deleteButton');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const messageId = this.getAttribute('data-id');
                // Send an AJAX request to delete the message
                fetch(`delete_message.php?id=${messageId}`, {
                    method: 'DELETE',
                })
                .then(response => {
                    if (response.ok) {
                        // If deletion is successful, remove the message from the UI
                        const messageDiv = document.getElementById(`message${messageId}`);
                        messageDiv.remove();
                    } else {
                        console.error('Failed to delete message');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
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