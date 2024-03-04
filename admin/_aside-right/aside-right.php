<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </span>
        </button>
        <div class="theme-toggler">
            <span class="active"><i class="fa fa-sun" aria-hidden="true"></i>
            </span>
            <span><i class="fa fa-moon" aria-hidden="true"></i></span>
        </div>
        <div class="profile">
            <div class="info">
                <?php
                if (isset($_SESSION['user-id'])):
                    $id = $_SESSION['user-id'];
                    $fetch_user_query = "SELECT * FROM users WHERE id = $id";
                    $run_query = mysqli_query($connection, $fetch_user_query);
                    $user_record = mysqli_fetch_assoc($run_query);
                    echo '<p> Hey '.'<b>' . $user_record['name'].'</b>' . '</p>';
                    ?>
                    <small class="text-muted">
                        Admin
                    </small>
                <?php else:
                    header('Location :' . ROOT_URL . 'login.php');
                endif
                ?>

            </div>
            <div class="profile-photo">
                <img src="./images/profile.svg" alt="">
            </div>
        </div>
    </div>

    <!-- end of top -->
    <div class="recent-updates">
        <h2>Recent Updates</h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile.svg" alt="">
                </div>
                <div class="message">
                    <p><b>Brian Cheruiyot</b> Received his order of Oraimo Digital headphones</p>
                    <small class="text-muted">2 minutes ago</small>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile.svg" alt="">
                </div>
                <div class="message">
                    <p><b>Cyrus Cheruiyot</b> Received his order of Vitron 24" Tv</p>
                    <small class="text-muted">5 minutes ago</small>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="./images/profile.svg" alt="">
                </div>
                <div class="message">
                    <p><b>Maureen Cheruiyot</b> Received his order of Asus Notebook 15 laptop</p>
                    <small class="text-muted">8 minutes ago</small>
                </div>
            </div>
        </div>

        <!-- End of Recent Updates -->

        <div class="sales-analytics">
            <h2>Users Analytics</h2>
            <div class="item online">
                <div class="icon">
                    <span>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>NEW ORDERS</h3>
                        <small class="text-muted">Last 24hrs</small>
                    </div>
                    <h5 class="success">+39%</h5>
                    <h3>3849</h3>
                </div>
            </div>
            <div class="item offline">
                <div class="icon">
                    <span>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>DELIVERED ORDERS</h3>
                        <small class="text-muted">Last 24hrs</small>
                    </div>
                    <h5 class="success">+17%</h5>
                    <h3>1100</h3>
                </div>
            </div>

            <div class="item offline">
                <div class="icon">
                    <span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>DECLINED ORDERS</h3>
                        <small class="text-muted">Last 24hrs</small>
                    </div>
                    <h5 class="danger">-14%</h5>
                    <h3>849</h3>
                </div>
            </div>
            <div class="item customers">
                <div class="icon">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>NEW CUSTOMERS</h3>
                        <small class="text-muted">Last 24hrs</small>
                    </div>
                    <h5 class="success">+25%</h5>
                    <h3>849</h3>
                </div>
            </div>
            <div class="item online">
                <div class="icon">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>NEW EMPLOYEES</h3>
                        <small class="text-muted">Last 24hrs</small>
                    </div>
                    <h5 class="success">+25%</h5>
                    <h3>849</h3>
                </div>
            </div>
            <a href="./addproduct.php">
                <div class="item add-product">
                    <div><span><i class="fa fa-plus" aria-hidden="true"></i></span></div>
                    <h3>Add Products</h3>
                </div>
            </a>
        </div>
    </div>
</div>