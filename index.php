<?php session_start(); ?>
<html lang=en>
    <head>
        <?php include('includes/header.php'); ?>
        <title>Welcome to Discount Juice!</title>
        <style>
            footer {
                display: block;
                text-align: center;
                padding: 3px;
                font-style: italic;
                font-size: 80%;
            }
        </style>
    </head>
    <body>
        <!-- Here's the header -->
        <table>
            <tbody>
                <tr>
                    <td>
                        <img alt="Juice Shop Logo" src="img/JuiceShop_Logo.png" width="40" />
                    </td>
                    <td>
                        <h1>Discount Juice Shop</h1> 
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Homepage body-->
        <p>Thanks for stopping by!</p>
        <p>You can find all the juices we have for sale on our <a href="./products.html" title="Products">products</a> page. We have the best juices.</p>
        
        <!-- Here's the footer -->
        <footer>
            <p>This site is sponsored by <a href="//www.wctc.edu">www.wctc.edu</a> and <a href="https://www.google.com/search?q=funny+cat">www.google.com</a></p>
        </footer>
    </body>
</html>