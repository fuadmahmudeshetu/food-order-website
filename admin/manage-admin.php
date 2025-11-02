<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Displaying the session message
            unset($_SESSION['add']); // Removing the session message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['password-changed'])) {
            echo $_SESSION['password-changed'];
            unset($_SESSION['password-changed']);
        }


        ?>

        <a href="add-admin.php" style="
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
            ">Add Admin</a>
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
                    Full Name
                </th>
                <th style="background-color: #4CAF50; /* green header */
                    color: white;
                    padding: 12px 15px;
                    text-align: left;
                    border: 1px solid #ddd;">
                    Username
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
            // Query to get all admin from database
            $sql = "SELECT * FROM tbl_admin";
            // Execute Query
            $result = mysqli_query($conn, $sql);

            // Check whether the query is executed or not
            if ($result == True) {

                $rows = mysqli_num_rows($result); // Function to get all the rows from database 
                $sn = 1;

                if ($rows > 0) {
                    // We have data in the database
                    while ($rows = mysqli_fetch_assoc($result)) {
                        // Using while loop to get all the data from the database
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                    ?>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="
                            padding: 12px 15px;
                            border: 1px solid #ddd;
                            text-align: left;"><?php echo $sn++; ?></td>
                                    <td style="
                            padding: 12px 15px;
                            border: 1px solid #ddd;
                            text-align: left;"><?php echo $full_name; ?></td>
                                    <td style="
                            padding: 12px 15px;
                            border: 1px solid #ddd;
                            text-align: left;"><?php echo $username; ?></td>
                                    <td style="
                            padding: 12px 15px;
                            border: 1px solid #ddd;
                            text-align: left;">
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" style="
                            display: inline-block;
                            background-color: #24A0ED;
                            padding: 6px 12px;
                            margin-right: 5px;
                            font-size: 14px;
                            text-decoration: none;
                            border-radius: 4px;
                            color: white;
                            transition: background 0.3s;">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" style="
                            display: inline-block;
                            background-color: #4CAF50;
                            padding: 6px 12px;
                            margin-right: 5px;
                            font-size: 14px;
                            text-decoration: none;
                            border-radius: 4px;
                            color: white;
                            transition: background 0.3s;">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" style="
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
                    // we do not have data in the database
                }
            }
            ?>

        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>