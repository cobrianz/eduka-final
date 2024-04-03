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
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <div class="sales">
                    <span>
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Orders</h3>
                            <h1>Ksh. 2,250,098</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end of sales -->
                <div class="expenses">
                    <span>
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Expenses</h3>
                            <h1>Ksh. 614,160</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>62%</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end of Expenses -->
                <div class="income">
                    <span>
                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                    </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total income</h3>
                            <h1>Ksh. 1,635,938</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>44%</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end of income -->
            </div>
            <!-- end of insights -->
            <div class="recent-orders" style='display: flex; flex-wrap: wrap;
             justify-content: center; gap: 3rem; align-items: center; margin-top: 4rem;'>
            <canvas id="Chart" style="width:100%;max-width:600px"></canvas>
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </main>

        <!-- end of main -->
    <?php 
    require './_aside-right/aside-right.php';
    
    ?>
    </div>
    <?php  $statement = "SELECT * FROM users";
        $result = mysqli_query($connection, $statement);
        $users = mysqli_num_rows($result);
         $stmt = "SELECT * FROM users";
        $rslt = mysqli_query($connection, $stmt);
        $employees = mysqli_num_rows($rslt); ?>
        <script>
    const xValues = ["Customers", "Employees"];
    const yValues = [<?=$users; ?>, <?=$employees; ?>];
    const barColors = [
        "#ff8800",
        "#7380ec",
    ];

new Chart("Chart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Customers and Employees analytics as from January 2024"
    }
  }
});
const x = ["Products", "Employees", "users", "admin"];
const y = [5, <?=$employees; ?>, <?=$users; ?>, 3];
const barColor = ["green", "7380ec","#677483","#ff0000"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: x,
    datasets: [{
      backgroundColor: barColor,
      data: y,
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "All data trends since January 2024"
    }
  }
});
</script>
    <script src="./index.js"></script>
</body>
<!-- copyright @Briankipkemoi
 CREATED AND ONWNED BY BRIAN KIPKEMOI CHERUIYOT
 -->
</html>