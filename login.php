<?php require_once 'inc.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Reservation</title>
    <link rel="stylesheet" type="text/css" href="css/style-lg.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style-md.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.9.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bkr">
<?php
if(isset($_GET['u_no_login_error']) && $_GET['u_no_login_error'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['u_no_login_error']."</p>";
}elseif (isset($_GET['login_error']) && $_GET['login_error'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['login_error']."</p>";
}elseif (isset($_GET['errup']) && $_GET['errup'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['errup']."</p>";
}elseif (isset($_GET['hash_succ']) && $_GET['hash_succ'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['hash_succ']."</p>";
}

?>
    <!--start 1st nav-->

    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-4 ">
                <div class="ferm pt-4 normal-link">
                    <p class="text-center frmhdd"><strong>Login</strong>

                    </p>
                    <form class="" action="process.php" method="post">
                        <input type="hidden" name="form_type" value="ajax">
                        <input type="hidden" name="form_name" value="user_login_form">
                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                        <input type="password" class="form-control" placeholder="password" name="password">
                        <button type="submit" class="mb-4 btn btn-primary">Submit</button>
                    </form>
                    <p class="text-center">Don't Have Account?</p>
                    <form action="">
                    <a class="mb-4 btn btn-primary" href="register.php">Register</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <script src="js/jquery-3.4.1.min.js "></script>
        <script src="js/popper.min.js "></script>
        <script src="js/bootstrap.min.js "></script>
        <script src="fontawesome-free-5.9.0-web/js/all.min.js "></script>
</body>

</html>