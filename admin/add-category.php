<?php include('partials/menu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Page</title>
    <style>
        form {
            background: white;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 350px;
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.3);
        }

        input[type="radio"] {
            margin-right: 5px;
            accent-color: #6a11cb;
        }

        br {
            line-height: 1.5;
        }

        input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
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

            <?php

            if (isset($_POST['submit'])) {
                // Check Whether the submit button is clicked or not

                // Get the title from form
                $title =  $_POST['title'];

                //For radio, We need to check whether the button

                if (isset($_POST['featured'])) {
                    // get the value from form
                    $featured = $_POST['featured'];
                } else {
                    //Set the default value
                    $featured = "No";
                }


                if (isset($_POST['active'])) {
                    // get the value from form
                    $active = $_POST['active'];
                } else {
                    //Set the default value
                    $active = "No";
                }

                // Check whether the image is selected or not and set the value for image name accordingly
                if (isset($_FILES['image']['name'])) {
                    # Upload the image
                    // To Upload the image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //Auto rename our image 
                    //Get the extension of the image
                    $ext = end(explode('.', $image_name));

                    //Rename the image
                    $image_name = "Food_category_".rand(0000,9999).'.'.$ext; // e.g. Food_category_2345.jpg

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    // Finally upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //  Check whether the image is uploaded or not
                    // and if the image is uploaded then we will stop the process and redirect with error message
                    
                    if(!$upload){
                        $_SESSION['upload'] = "Failed to upload the image";

                        // Redirect to add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        // Stop the process
                        die();
                    }

                }
                else {
                    //Don't upload the image_name and the the value blank

                }


                // Create sql query to insert category in to database

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