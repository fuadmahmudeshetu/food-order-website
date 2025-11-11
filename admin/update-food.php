<?php include('partials/menu.php'); ?>



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

            }
        
        
        
        
        ?>

        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title">

                <label for="description">Description</label>
                <textarea name="description" rows="4" placeholder="Enter description"></textarea>

                <label for="price">Price</label>
                <input type="number" name="price" placeholder="Enter price" id="">

                <label for="image">Select Image</label>
                <input type="file" name="image">

                <label for="category">Select Category</label>
                <select name="category" id="">
                    <?php
                    // Create php code to display categories from database
                    // Create sql to get all active categories form database

                    $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                    $result = mysqli_query($conn, $sql);

                    // Count rows to check whether we have category or not
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        // Display category

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];

                    ?>
                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                        <?php
                        }
                    } else {
                        //No category
                        ?>
                        <option value="0">No Category Found</option>
                    <?php
                    }

                    ?>

                </select>

                <label for="featured">Featured</label>
                <input type="radio" name="featured" id="" value="Yes"> Yes
                <input type="radio" name="featured" id="" value="No"> No

                <label for="active">Active</label>
                <input type="radio" name="active" id="" value="Yes"> Yes
                <input type="radio" name="active" id="" value="No"> No

                <input type="submit" name="submit" value="Add Food">

            </form>
        </div>
    </div>
</div>


<?php include('partials/footer.php'); ?>