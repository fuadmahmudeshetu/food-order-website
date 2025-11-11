<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete-food'])) {
            echo $_SESSION['delete-food'];
            unset($_SESSION['delete-food']);
        }
        ?>


        <a href="<?php echo SITEURL; ?>admin/add-food.php" style="
            display: inline-block;
            background-color: #1da1f2; /* blue */
            color: white;
            font-weight: bold;
            font-size: 16px;
            width: 120px; /* slightly wider for text */
            height: 45px; 
            line-height: 45px; /* vertically center text */
            text-align: center;
            border-radius: 10px;
            border: none;
            margin: 10px 0;
            cursor: pointer;
            text-decoration: none; /* remove underline */
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            ">
            Add Food
        </a>
        <table style="
                    width: 100%;
                    border-collapse: collapse; /* remove double borders */
                    margin: 20px 0;
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;">

            <tr style="border-bottom: 1px solid #ddd;">
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    S.N.
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Title
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Price
                </th>

                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Description
                </th>

                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Image
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Featured
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Active
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Actions
                </th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_food";

            $result = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($result);

            $sn = 1;

            if ($count > 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr style="border-bottom: 1px solid #ddd;">

                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;"><?php echo $sn++; ?></td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;"><?php echo $title; ?></td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">$<?php echo $price; ?></td>

                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;"><?php echo $description; ?></td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">
                            <?php

                            if ($image_name != "") {
                            ?>
                                <img style="width: 100px;
                                    height: 100px;          
                                    object-fit: cover;     
                                    border-radius: 8px;    
                                    border: 1px solid #ccc; 
                                    display: block;
                                    margin: auto;"
                                    src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="">
                            <?php
                            } else {
                                echo "<p>Image not found</p>";
                            }

                            ?>

                        </td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;"><?php echo $featured ?></td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;"><?php echo $active; ?></td>
                        <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">
                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" style="
                    display: inline-block;
                    background-color: #4CAF50;
                    padding: 6px 12px;
                    margin-right: 5px;
                    font-size: 14px;
                    text-decoration: none;
                    border-radius: 4px;
                    color: white;
                    transition: background 0.3s;">Update Admin</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" style="
                    display: inline-block;
                    background-color: #f44336;
                    padding: 6px 12px;
                    margin-right: 5px;
                    font-size: 14px;
                    text-decoration: none;
                    border-radius: 4px;
                    color: white;
                    transition: background 0.3s;
                    ">Delete Admin</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <h2>No Category Added</h2>
                    </td>
                </tr>
            <?php
            }

            ?>

        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>