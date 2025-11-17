<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <!-- Responsive Table Wrapper -->
        <div style="
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
        ">

            <table style="
            width: 100%;
            min-width: 1200px; 
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        ">

                <tr style="border-bottom: 1px solid #ddd;">
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">S.N.</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Food</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Price</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Quantity</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Total</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Order Date</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Status</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Customer Name</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Contact</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Email</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Address</th>
                    <th style="background-color: #4CAF50; color: white; padding: 12px 15px; border: 1px solid #ddd;">Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM tbl_order";
                $res = mysqli_query($conn, $sql);

                $sn = 1;
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {

                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                ?>

                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $sn++; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $food; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $price; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $qty; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $total; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $order_date; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $status; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $customer_name; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $customer_contact; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $customer_email; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;"><?php echo $customer_address; ?></td>
                            <td style="padding: 12px 15px; border: 1px solid #ddd;">
                                <a href="#" style="background-color: #4CAF50; padding: 6px 12px; color: white; border-radius: 4px; text-decoration: none;">Update</a>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    echo "<tr><td colspan='12' style='text-align:center; padding:20px;'>No Orders Found</td></tr>";
                }
                ?>

            </table>

        </div> <!-- END responsive wrapper -->

    </div>
</div>

<?php include('partials/footer.php'); ?>