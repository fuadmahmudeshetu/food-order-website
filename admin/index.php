<?php include('partials/menu.php'); ?>
<?php ob_start(); ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                ob_end_flush();
            }
        ?>

        <h1>Dashboard</h1>

        <div class="col-4 text-center">
            <?php 
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Categories
        </div>
        <div class="col-4 text-center">
            <?php 
                $sql1 = "SELECT * FROM tbl_food";
                $res1 = mysqli_query($conn, $sql1);
                $count1 = mysqli_num_rows($res1);
             ?>
            <h1><?php echo $count1; ?></h1>
            <br>
            Foods
        </div>
        <div class="col-4 text-center">
            <?php $sql2 = "SELECT * FROM tbl_order";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            Total Order
        </div>
        <div class="col-4 text-center">
            <?php 
              $sql3 = "SELECT SUM(total) AS TotalRevenue FROM tbl_order";
              $res3 = mysqli_query($conn, $sql3);
              $row = mysqli_fetch_assoc($conn, $res3);

              $total_revenue = $row['TotalRevenue'];
            ?>
            <h1><?php echo $total_revenue; ?></h1>
            <br>
            Revenue Generated
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php') ?>