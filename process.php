<?php
require_once 'admin/inc.php';
$notification = array();
$notification['error'] = array();
$notification['success'] = array();

if($_POST){
    $form_name = $_POST['form_name'];
    if($form_name and !empty($form_name))
    {
        switch($form_name)
        {
            case 'user_login_form':
                {
                    $form_type = $_POST['form_type'];
                    $user_email = $_POST['email'];
                    $user_password = $_POST['password'];
                    $admins_table = new users_table();
                    $admin_id = $admins_table->verify_user($user_email, $user_password);
                    $user_type=$admins_table->retrieve_user($admin_id);
                    $login_table = new log_table();
                    if (empty($admin_id)){
                        $reason="wrong username or password";
                        $notification['error'][] = "Please check username or password.";
                        $_SESSION['errup']= "Please check username or password.";
                        $notification_string = create_notification_string($notification);
                        $redirect_path = 'login.php';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?errup=Y"; ?>'; </script><?php

                    }

                    $errors = $notification['error'];
                    if($errors and !empty($errors))
                    {

                        $notification_string = create_notification_string($notification);
                        $_SESSION['login_error']=$notification_string;
                        $redirect_path = 'login.php';

                        if($form_type!="ajax")
                        {
                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?login_error=Y"; ?>'; </script><?php
                        }
                        else
                        {
                            foreach($errors as $error)
                                $notification['error']= array();

                        }
                    }
                    else
                    {
                        if($form_type=="ajax")
                        {
                            if($admin_id and !empty($admin_id))
                            {

                                $_SESSION['user_id'] = $admin_id;
                                $_SESSION['timeout'] = time();
                                $_SESSION['web_session_timeout'] = 900;

                                $log_table = new log_table();
                                $log_table->create_login_log();

                            }

                            else
                            {

                                $notification['error'][] = "Something went wrong. Please check again.";
                                $_SESSION['u_no_login_error']= "Something went wrong. Please check again.";
                                setcookie("err_count",$count + 1,+time() + 60);
                                $notification_string = create_notification_string($notification);
                                $redirect_path = 'login.php';
                                ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?u_no_login_error=Y"; ?>'; </script><?php
                            }


                            $user_type=$admins_table->retrieve_user($admin_id);
                            $login_table = new log_table();
                            $redirect_path = 'index.php';


                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path;?>'; </script><?php

                        }
                    }

                    break;
                }

            case 'user_register':
                {
                    $errors = array();
                    $user_data = array();
                    $user_data['full_name'] = $_POST['full_name'];
                    $user_data['mobile'] = $_POST['mobile'];
                    $user_data['email'] = $_POST['email'];
                    $user_data['addreess'] = $_POST['address'];
                    $user_data['password'] = $_POST['password'];
                    $user_data['confirm_password'] = $_POST['confirm_password'];
                    $user_table = new users_table();
                    $user_check = $user_table->retrieve_user_by_email($_POST['email']);
                    if (!empty($user_check)){
                        $notification['error'][] = "User Already Exist.";
                        $_SESSION['alus']= "User Already Exist.";
                        $notification_string = create_notification_string($notification);
                        $redirect_path = 'register.php';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?alus=Y"; ?>'; </script><?php


                    }else{
                        $user_id = $user_table->add_new_user($user_data);
                        //send confirmation email
                        if($user_id and !empty($user_id)) {
                            $hash = $user_table->generate_confirmation_hash($user_id);
                            if ($hash != false) {
                                $subject = 'Account Confirmation';
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $headers .= 'From: <no-reply@test.com>' . "\r\n";
                                $message_body = 'Dear Customer,' . $_POST['full_name'];
                                $message_body .= '\r\n Thank you for your registration. Please click on this link to activate your account\r\n';
                                $password_url = 'http://localhost/web_p_project/process.php?confirmation=' . $hash;
                                $message_body .= '\r\n <a href="' . $password_url . '">Confirmation Link</a><br/><br/>';
                                mail($_POST['email'],$subject,$message_body,$headers);
                            }
                        }

                        $redirect_path = 'register.php';
                        $_SESSION['success_add_user']="Please Check your Email To Confirm.";
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?success_add_user=Y'; ?>'; </script><?php
                    }

                    break;
                }

            case 'add_to_cart':
                {
                    $errors = array();
                    $user_data = array();
                    $user_data['user_id']    = get_login_user_id_user();
                    $user_data['book_id']    = $_POST['book_id'];
                    $cart_table              = new cart_table();
                    $add_cart_data           = $cart_table->add_new_data($user_data);
                    if($add_cart_data and !empty($add_cart_data)) {
                        $redirect_path = 'index.php';
                        $_SESSION['add_cart']="Your Book is added to cart";
                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?add_cart=Y'; ?>'; </script><?php
                            }

                    break;
                }

            case 'checkout_form':
                {
                    $errors          = array();
                    $cart_table      = new cart_table();
                    $book_table      = new books_table();
                    $sum             = 0;
                    $cart_data       = $cart_table->retrieve_cart_by_user_id(get_login_user_id_user());
                    foreach ($cart_data as $single_data){
                        $book_data = $book_table->retrieve_books_by_id($single_data['book_id']);
                        $sum += $book_data['price'];
                    }
                    //add order total to user orders
                    $user_orders                    = new userorders_table();
                    $user_order_data                = array();
                    $user_order_data['user_id']     = get_login_user_id_user();
                    $user_order_data['total_price'] = $sum;
                    $user_order_data['status']      = 0;
                    $add_user_order_data            = $user_orders->add_new_data($user_order_data);
                    if($add_user_order_data and !empty($add_user_order_data)) {
                        $order_id           = $add_user_order_data;
                        //add data to order details
                        $cart_table         = new cart_table();
                        $book_table         = new books_table();
                        $user_details_table = new orderdetails_table();
                        $cart_data          = $cart_table->retrieve_cart_by_user_id(get_login_user_id_user());
                        foreach ($cart_data as $single_data){
                            $book_data = $book_table->retrieve_books_by_id($single_data['book_id']);
                            $order_details      = array();
                            $order_details['order_id'] = $order_id;
                            $order_details['user_id']  = get_login_user_id_user();
                            $order_details['book_id'] = $single_data['book_id'];
                            $order_details['book_price']   = $book_data['price'];
                            $add_order_details   = $user_details_table->add_new_data($order_details);
                        }
                        //remove items from cart
                        $cart_table         = new cart_table();
                        $cart_delete        = $cart_table->delete_data_by_user_id(get_login_user_id_user());
                        if($cart_delete and !empty($cart_delete)) {
                            $redirect_path = 'index.php';
                            $_SESSION['com_order']="Your Order is completed";
                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?com_order=Y'; ?>'; </script><?php
                        }
                    }



                    break;
                }


        }
    }
}



if($_GET) {

    // update user activate

    $hash_code = @$_GET['confirmation'];
    if ($hash_code and !empty($hash_code)) {
        $notification_string = 'Invalid Confirmation Code';
        $_SESSION['hash_err'] = $notification_string;
        $redirect_path = create_url('register.php?hash_err=Y');
        if (strlen($hash_code) > 64) {
            $user_table = new users_table();
            $user_id = $user_table->validate_confirmation_hash($hash_code);
            if ($user_id and !empty($user_id)) {
                $validation_status = $user_table->confirm_user($user_id);
                $notification['error'] = array();
                $notification['error'][] = 'Something went wrong. Please Try Again.';
                $_SESSION['hash_succ'] = $notification_string;
                $notification_string = create_notification_string($notification);

                $redirect_path = create_url('login.php?hash_succ=' . $notification_string);
                if ($validation_status) {
                    $notification_string = 'Thank you for email confirmation.Please Fill below information';
                    $_SESSION['hash_succ'] = $notification_string;
                    $uid = base64_encode($user_id);
                    $redirect_path = create_url('index.php');

                }
            }
        }
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path; ?>'; </script><?php
    }


    //delete item from cart

    $delcartid = @$_GET['delcartid'];
    if ($delcartid and !empty($delcartid)) {

        $notification_string = create_notification_string($notification);

        $cart_table = new cart_table();
        $cart_data = $cart_table->retrieve_cart_item_by_id($delcartid);

        if ($cart_data) {
            $cart_table  = new cart_table();
            $cart_delete = $cart_table->delete_data($delcartid);
        }
        $_SESSION['deletecartitem'] = "Item Deleted Successfully.";
        $redirect_path = 'cart.php';
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path . '?deletecartitem=Y'; ?>'; </script><?php
    }
}