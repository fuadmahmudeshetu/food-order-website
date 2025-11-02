<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        
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