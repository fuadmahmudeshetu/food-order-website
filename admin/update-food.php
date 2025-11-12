<?php
ob_start();
include('partials/menu.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>

    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        form {
            background: #ffffff;
            padding: 35px 45px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 420px;
            transition: all 0.3s ease;
        }

        form:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        /* ====== Labels ====== */
        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
            margin-top: 18px;
        }

        /* ====== Text Inputs ====== */
        form input[type="text"],
        form input[type="number"],
        form input[type="file"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
            box-sizing: border-box;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus,
        form input[type="file"]:focus,
        form select:focus,
        form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.25);
        }

        /* ====== Textarea ====== */
        form textarea {
            resize: none;
        }

        /* ====== Radio Buttons ====== */
        form input[type="radio"] {
            accent-color: #007bff;
            margin-right: 5px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }

        /* ====== Submit Button ====== */
        form input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #007bff, #00b4ff);
            color: white;
            border: none;
            padding: 12px;
            margin-top: 25px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form input[type="submit"]:hover {
            background: linear-gradient(135deg, #005fcc, #009ce3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
        }

        /* ====== Headings (optional) ====== */
        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 20px;
        }

        /* ====== File Input ====== */
        form input[type="file"] {
            padding: 8px;
            background: #f9f9f9;
        }

        /* ====== Select Dropdown ====== */
        form select {
            background-color: #fff;
            cursor: pointer;
        }

        .current-img-box {
            width: 180px;
            height: 180px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f9f9f9;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .current-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .current-img:hover {
            transform: scale(1.05);
        }

        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

</body>

</html>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <?php
        // Get Food Data

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $sql2 = "SELECT * FROM tbl_food WHERE id=$id";

            $result2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($result2);

            // Get all the data from database
            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];

        }
        else {
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        ?>

        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>">

                <label for="description">Description</label>
                <textarea name="description" rows="4" placeholder="Enter description"><?php echo $description; ?></textarea>

                <label for="price">Price</label>
                <input type="number" name="price" placeholder="Enter price" value="<?php echo $price; ?>">

                <label for="image">Current Image</label>
                <div class="current-img-box">
                    <?php
                    if ($current_image != "") {
                    ?>
                        <img class="current-img" src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" alt="Current Image">
                    <?php
                    } else { ?>
                        <span>No Image Found</span>
                    <?php }
                    ?>
                </div>

                <label for="category">Select Category</label>
                <select name="category" id="">
                    <?php

                    $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                    $result = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($result);

                    if ($count > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $category_title = $row['title'];
                            $category_id = $row['id'];

                            ?>
                                <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                        }
                    }
                    else {
                        echo "<option value='0'>Category Not Found</option>";
                    }
                    
                    ?>
                </select>

                <label for="featured">Featured</label>
                <input <?php if ($featured == 'Yes') {
                    echo "checked";
                } ?> name="featured" type="radio" value="Yes"> Yes
                <input <?php if ($featured == 'No') {
                    echo "checked";
                } ?> name="featured" type="radio" value="No"> No

                <label for="active">Active</label>
                <input <?php if ($active == 'Yes') {
                    echo "checked";
                } ?> type="radio" name="active" id="" value="Yes"> Yes
                <input <?php if ($active == 'No') {
                    echo "checked";
                } ?> type="radio" name="active" id="" value="No"> No

                <input type="submit" name="submit" value="Add Food">

            </form>
        </div>
    </div>
</div>


<?php include('partials/footer.php'); ?>