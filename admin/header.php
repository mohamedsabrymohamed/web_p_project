<?php
require_once 'inc.php';
if(!get_login_user_id())
{
    ?><script>window.location = 'index.php';</script><?php
}

?>
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
         <a class="wt navbar-brand" >Book Reservations </a>

        <div class="col-md-8">
            <ul class="menu text-right">
                <li><a  class="btn btn-primary" href="books.php">Books</a></li>
                <li><a  class="btn btn-danger" href="categories.php">Categories</a></li>
                <li><a  class="btn btn-warning" href="authors.php">Authors</a></li>
                <li><a  class="btn btn-success" href="clients.php">Clients</a></li>
                <li><a  class="btn btn-info" href="reservations.php">Orders</a></li>
                <?php
                $admins_table = new admins_table();
                $admins_data  = $admins_table->get_full_name(get_login_user_id());
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $admins_data;?>
                    </a>
                    <div class="dropdown-menu" style="background-color: #343a40" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="auth/logout.php">Logout</a>

                </li>
            </ul>
        </div>

    </nav>
</header>