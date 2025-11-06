<?php include('partials/menu.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category Page</title>
    <style>

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 380px;
        }

        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
            margin-top: 15px;
        }

        form input[type="text"],
        form input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="file"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        form div {
            background-color: #f9fafc;
            border: 1px dashed #ccc;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            color: #777;
            font-style: italic;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }

        form input[type="radio"] {
            accent-color: #007bff;
            margin-right: 6px;
        }

        form input[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            border: none;
            padding: 12px;
            margin-top: 20px;
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

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br><br>


            <?php 
            //Check whether the id is set or not
            $id = $_GET['id'];

            //Create sql query to get all other detail
            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            //Execute the query
            $result = mysqli_query($conn, $sql);

            //COunt the rows to check whether the id is valid or not

            $count = mysqli_num_rows($result);

            if ($count==1) {
                // Get all the data
                $row = mysqli_fetch_assoc($result);

                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];                
                $active = $row['active'];                

            }
            else {
                //Redirect to the manage category page with not found message

                $_SESSION['category-not-found'] = "Category not found";
                header('location:'.SITEURL.'admin/manage-category.php');
            }


            
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title ?>">

                <label for="current-image">Current Image:</label>
                <div class=""><?php echo $image_name; ?></div>

                <label for="new-image">New Image: </label>
                <input type="file" name="new-image" id="">

                <label for="featured">Featured: </label>
                <input type="radio" name="featured">Yes
                <input type="radio" name="featured">No

                <label for="active">Active</label>
                <input type="radio" name="active">Yes
                <input type="radio" name="active">No

                <input type="submit" name="submit" value="Update Category">

            </form>

        </div>
    </div>
</body>

</html>


<?php include('partials/footer.php') ?>