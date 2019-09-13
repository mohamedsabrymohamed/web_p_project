<?php require_once 'inc.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book reservations</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- ==== End StyleSheets Links =====================================-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.min.css">

    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="css/datatables1.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <![endif]-->
</head>
<body>

<!-- <header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light " >
         <a class="wt navbar-brand" href="index.php">Book Reservations </a>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto linav"></ul>

            <?php
                $user_table = new users_table();
                $user_data  = $user_table->retrieve_user(get_login_user_id_user());
                $user_name  = $user_data['full_name'];
                if(get_login_user_id_user()){
            ?>
            <a style="direction: rtl" class=" wt navbar-brand" href="cart.php">
                <?php
                $cart_table = new cart_table();
                $cart_data  = $cart_table->retrieve_cart_by_user_id(get_login_user_id_user());
                echo count($cart_data);
                ?>
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                </a>
            <ul>
                <li class="nav-item dropdown" style="color: white">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $user_name;?>
                    </a>
                    <div class="dropdown-menu" style="background-color: #343a40" aria-labelledby="navbarDropdown">
                        <a style="color: white" class="dropdown-item" href="my_orders.php">My Orders</a>
                        <a style="color: white" class="dropdown-item" href="auth/logout.php">Logout</a>

                </li>
            </ul>
            <?php }else{?>
            <a style="direction: rtl" class=" wt navbar-brand" href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a>
            <?php }?>
        </div>

    </nav>
</header>