<?php include('partials/menu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Page</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            background-color: #f6f7fb;

        }

        .container form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            /* Nice fixed width */
        }

        .container form label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        .container form input[type="text"],
        .container form input[type="file"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .container form input[type="submit"] {
            background: linear-gradient(90deg, #4a00e0, #8e2de2);
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .container form input[type="submit"]:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>
            <br><br>

            <?php

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            ?>


            <!-- Add Category Form Starts -->

            <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="title">Title: </label>
                    <input type="text" name="title" placeholder="Category title" id="">
                    <br><br>
                    <label for="image">Select Image:</label>
                    <input type="file" name="image" id="">
                    <br><br>
                    <label for="featured">Featured: </label>
                    <input type="radio" name="featured" id="" value="Yes"> Yes
                    <input type="radio" name="featured" id="" value="No"> No
                    <br><br>

                    <label for="active">Active: </label>
                    <input type="radio" name="active" id="" value="Yes"> Yes
                    <input type="radio" name="active" id="" value="No"> No
                    <br><br>

                    <input type="submit" name="submit" value="Add Category">
                </form>
            </div>

            <?php

            if (isset($_POST['submit'])) {

                $title =  $_POST['title'];

                if (isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }


                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {     
                    $active = "No";
                }

                if (isset($_FILES['image']['name'])) {

                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "")   
                    {

                        $ext = end(explode('.', $image_name));

                        $image_name = "Food_category_" . rand(0000, 9999) . '.' . $ext; // e.g. Food_category_2345.jpg

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/" . $image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if (!$upload) {
                            $_SESSION['upload'] = "Failed to upload the image";

                            header('location:' . SITEURL . 'admin/add-category.php');
                            
                            die();
                        }
                    }
                } 
                
                else {

                }

                $sql = "INSERT INTO tbl_category SET 
                                title = '$title',
                                image_name = '$image_name',
                                featured = '$featured',
                                active = '$active'
                                ";
                // Execute the query and save data in database
                $result = mysqli_query($conn, $sql);

                // Check whether executed or not and the data added or not
                if ($result == true) {
                    $_SESSION['add'] =
                        "<div style='position: fixed;
                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                        background-color: #d4edda;
                                        color: #155724;
                                        border: 1px solid #c3e6cb;
                                        padding: 15px 25px;
                                        border-radius: 10px;
                                        font-family: Arial, sans-serif;
                                        font-size: 16px;
                                        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                                        text-align: center;
                                        z-index: 9999;'>
                                ✅ Category Added Successfully!
                            </div>
                            <script>
                                setTimeout(function(){
                                    var popup = document.querySelector('div[style*=\"position: fixed\"]');
                                    if(popup){ popup.style.display = 'none'; }
                                }, 2000);
                            </script>
                        ";

                    // Redirect to the the add category page
                    header('location:' . SITEURL . 'admin/manage-category.php');
                } else {
                    $_SESSION['add'] = "<div style='position: fixed; 
                                    top: 50%; 
                                    left: 50%; 
                                    transform: translate(-50%, -50%); 
                                    background-color: #f8d7da; 
                                    color: #721c24; 
                                    border: 1px solid #f5c6cb; 
                                    padding: 20px 30px; 
                                    border-radius: 10px; 
                                    font-family: Arial, sans-serif; 
                                    font-size: 16px; 
                                    box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
                                    text-align: center;'>
                        ❌ Category Adding Failed!
                        </div>
                        ";
                    // Redirect to add category page
                    header('location:' . SITEURL . 'admin/add-category.php');
                }
            }
            ?>

        </div>
    </div>

</body>

</html>

<?php include('partials/footer.php'); ?>