<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>


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

            <tr style="border-bottom: 1px solid #ddd;">
                <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">1.</td>
                <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">Fuad Mahmud</td>
                <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">fuadmahmud</td>
                <td style="
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                    text-align: left;">
                    <a href="#" style="
                    display: inline-block;
                    background-color: #4CAF50;
                    padding: 6px 12px;
                    margin-right: 5px;
                    font-size: 14px;
                    text-decoration: none;
                    border-radius: 4px;
                    color: white;
                    transition: background 0.3s;">Update Admin</a>
                    <a href="#" style="
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
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>