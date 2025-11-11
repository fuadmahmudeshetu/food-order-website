<?php 

include('../config/constants.php');

if (isset($_GET['id']) AND isset($_GET['image_name'])) {
    
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/food/".$image_name;

        $remove = unlink($path);
    }

    $sql = "DELETE FROM tbl_food WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        $_SESSION['delete-food'] =
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
                            ✅ Food deleted successfully!
                        </div>
                        <script>
                            setTimeout(function(){
                                var popup = document.querySelector('div[style*=\"position: fixed\"]');
                                if(popup){ popup.style.display = 'none'; }
                            }, 2000);
                        </script>
                    ";

        header('location:' . SITEURL . 'admin/manage-food.php');
        exit();
        } 
        else {
            // Redirect to manage-category page
            $_SESSION['delete-food'] = "Field to delete the food, please try again";
            header('location:' . SITEURL . 'admin/manage-food.php');
        }
    }

?>