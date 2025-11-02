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
            <h1>5</h1>
            <br>
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Categories
        </div>
        <div class="col-4 text-center">
            <h1>5</h1>
            <br>
            Categories
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php') ?>