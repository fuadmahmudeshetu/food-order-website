<?php
ob_start();
include('partials/menu.php');
?>

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
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br><br>

            <?php
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            // Get category data
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                } else {
                    $_SESSION['no-category-found'] = "Category not found.";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                    exit();
                }
            } else {
                header('location:' . SITEURL . 'admin/manage-category.php');
                exit();
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>">

                <label for="current-image">Current Image:</label>
                <div class="current-img-box">
                    <?php if ($current_image != "") { ?>
                        <img class="current-img" src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" alt="Current Image">
                    <?php } else { ?>
                        <span>No Image Uploaded</span>
                    <?php } ?>
                </div>

                <label for="new-image">New Image:</label>
                <input type="file" name="new-image" id="">

                <label>Featured:</label>
                <input <?php if ($featured == "Yes") echo "checked"; ?> type="radio" name="featured" value="Yes"> Yes
                <input <?php if ($featured == "No") echo "checked"; ?> type="radio" name="featured" value="No"> No

                <label>Active:</label>
                <input <?php if ($active == "Yes") echo "checked"; ?> type="radio" name="active" value="Yes"> Yes
                <input <?php if ($active == "No") echo "checked"; ?> type="radio" name="active" value="No"> No

                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" name="submit" value="Update Category">
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'] ?? "No";
    $active = $_POST['active'] ?? "No";

    // Handle new image upload
    if (isset($_FILES['new-image']['name']) && $_FILES['new-image']['name'] != "") {
        $image_name = $_FILES['new-image']['name'];

        $temp = explode('.', $image_name);
        $ext = end($temp);

        $image_name = "Food_category_" . rand(0000, 9999) . '.' . $ext;

        $source_path = $_FILES['new-image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if (!$upload) {
            $_SESSION['upload'] = "❌ Failed to upload the image.";
            header('location:' . SITEURL . 'admin/add-category.php');
            die();
        }

        // Remove the old image if it exists
        if (!empty($current_image)) {
            $remove_path = "../images/category/" . $current_image;
            if (!unlink($remove_path)) {
                $_SESSION['failed-remove'] = "❌ Failed to remove the old image.";
                header('location:' . SITEURL . 'admin/manage-category.php');
                die();
            }
        }
    } else {
        $image_name = $current_image;
    }

    // Update DB
    $sql2 = "UPDATE tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
            WHERE id = '$id'";

    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == true) {
        $_SESSION['update'] = "<div style='position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);
            background:#d4edda;color:#155724;border:1px solid #c3e6cb;padding:15px 25px;border-radius:10px;
            font-family:Arial,sans-serif;font-size:16px;box-shadow:0 4px 10px rgba(0,0,0,0.2);text-align:center;z-index:9999;'>
            ✅ Category Updated Successfully!
            </div>
            <script>
                setTimeout(function(){
                    var popup=document.querySelector('div[style*=\"position:fixed\"]');
                    if(popup){ popup.style.display='none'; }
                },2000);
            </script>";
        header('location:' . SITEURL . 'admin/manage-category.php');
        exit();
    } else {
        $_SESSION['update'] = "<div style='position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);
            background:#f8d7da;color:#721c24;border:1px solid #f5c6cb;padding:20px 30px;border-radius:10px;
            font-family:Arial,sans-serif;font-size:16px;box-shadow:0 4px 10px rgba(0,0,0,0.2);text-align:center;'>
            ❌ Category Update Failed!
            </div>";
        header('location:' . SITEURL . 'admin/update-category.php?id=' . $id);
        exit();
    }
}
?>

<?php include('partials/footer.php'); ?>