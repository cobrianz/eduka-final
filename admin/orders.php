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
                <h1>Orders</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Order Name</th>
                            <th>Order Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                            <td>Nursing Research Paper</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warninng">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                     
                </table>
                <a href="#">Show All</a>
            </div>
        </main>

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