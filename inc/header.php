<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Matt's Surfboards</title>
        <!-- link to favicon -->
        <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- link to CSS -->
        <link rel="stylesheet" href="css/main.css">

        <!-- enable HTML5 in IE 8 and below -->
        <!--[if IE]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <header>
            <section id="top">
                <div class="container">
                    <?php if($user_type == 'anon') { ?>                    
                        <ul>
                            <li><a href="index.php?pageid=login">Login</a></li>
                            <li><a href="index.php?pageid=login">Register</a></li>
                        </ul>
                        <?php
                    }
                    if ($user_type == 'authen') {
                        ?>                    
                        <ul>
                            <li><a href="index.php?pageid=invoices">Previous Invoices</a></li>                            
                            <li><a href="index.php?pageid=checkout">My Account</a></li>
                            <li><a href="index.php?pageid=logout">Logout</a></li>
                        </ul>
                        <?php
                    }
                    if ($user_type == 'admin') {
                        ?>                                   
                        <ul>
                            <li><a href="index.php?pageid=showusers">Users</a></li>
                            <li><a href="index.php?pageid=showcat">Categories</a></li>
                            <li><a href="index.php?pageid=showprod">Products</a></li>
                            <li><a href="index.php?pageid=logout">Logout</a></li>
                        </ul>           
                        <?php
                    }
                    ?>
                </div> <!-- end container -->
            </section> <!-- end top -->
        </header>
        <?php
        if ($user_type != 'admin') {
            ?>                
            <nav>
                <div class="container">
                    <div class="left">
                        <p class="logo"><img src="images/logo.png" alt="logo"></p>
                    </div> <!-- end left -->
                    <div class="right">
                        <ul>
                            <li class="active"><a href="index.php?pageid=home">Home</a></li>
                            <li><a href="index.php?pageid=shop">Shop</a></li>
                            <?php
                            if (isset($_SESSION['cart_items'])) {
                                ?>                
                                <li><img src="images/cart.png" alt="cart icon"><span class="icon"><a href="index.php?pageid=showcart">My Cart</a></span></li>
                                <?php
                            } else {
                                ?>                
                                <li><img src="images/cart_disabled.png" alt="cart icon"><span class="icon_disabled">My Cart</span></li>
                                <?php
                            }
                            ?>                        
                        </ul>
                    </div> <!-- end right -->
                </div> <!-- end container -->
            </nav>	     
        <div class="container content">
            <?php
        }
        ?>
