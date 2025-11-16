<?php include('partials-front/menu.php') ?>

<?php

// Check Whether id is passed or not

if (isset($_GET['category_id'])) {
    // Category Id Is Set And Get The Id
    $category_id = $_GET['category_id'];
    // Get All Category Title Based On Category Id
    $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

    // Execute Query
    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $category_title = $row['title'];
} else {
    header('location:' . SITEURL);
}

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        // Sql Query To get the food using category id

        $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id";

        $res2 = mysqli_query($conn, $sql2);

        $count = mysqli_num_rows($res2);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

        ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<h1>The Is No Food In This Category</h1>";
        }

        ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>