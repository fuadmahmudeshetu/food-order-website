<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>

    <style>
        form {
            max-width: 450px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #3d8bfd;
            box-shadow: 0 0 4px rgba(61, 139, 253, 0.4);
        }

        textarea {
            resize: none;
        }

        .update-btn {
            width: 100%;
            padding: 12px;
            background: #3d8bfd;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .update-btn:hover {
            background: #1e6bfd;
        }
    </style>
</head>

<body>


    <?php
    // Check whether the id is set or not

    if ($_GET['id']) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_order WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);

            $food = $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];
        } else {
        }
    } else {

        header('location:' . SITEURL . 'manage-admin.php');
    }
    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>
                Update Order

                <form action="#" method="post">

                    <div class="form-group">
                        <label for="food-name">Food Name</label>
                        <input type="text" id="food-name" name="food-name" value="<?php echo $food; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" id="qty" name="qty" value="<?php echo $qty ?>" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <b id="price">$<?php echo $price ?></b>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option <?php if ($status == "Ordered") {
                                echo "selected";
                            } ?> value="Ordered">Ordered</option>
                            <option value="Preparing">Preparing</option>
                            <option value="Out for Delivery">Out for Delivery</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" id="customer_name" name="customer_name" value="Jane Doe" required>
                    </div>

                    <div class="form-group">
                        <label for="customer_contact">Customer Contact:</label>
                        <input type="tel" id="customer_contact" name="customer_contact" value="123-456-7890" required>
                    </div>

                    <div class="form-group">
                        <label for="customer_email">Customer Email:</label>
                        <input type="email" id="customer_email" name="customer_email" value="jane@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="customer_address">Customer Address:</label>
                        <textarea id="customer_address" name="customer_address" rows="4" required>123 Main St, Apt 4B, Anytown, USA</textarea>
                    </div>

                    <button type="submit" class="update-btn">Update Order</button>
                </form>
            </h1>
        </div>
    </div>


</body>

</html>

<?php include('partials/footer.php'); ?>