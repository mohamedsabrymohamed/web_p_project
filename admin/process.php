<?php
require_once 'inc.php';
$notification = array();
$notification['error'] = array();
$notification['success'] = array();

if($_POST){
    $form_name = $_POST['form_name'];
    if($form_name and !empty($form_name))
    {
        switch($form_name)
        {
            case 'admin_login_form':
                {
                    $form_type = $_POST['form_type'];
                    $user_email = $_POST['email'];
                    $user_password = $_POST['password'];
                    $admins_table = new admins_table();
                    $admin_id = $admins_table->verify_user($user_email, $user_password);
                    $user_type=$admins_table->retrieve_user($admin_id);
                    $login_table = new log_table();
                    if (empty($admin_id)){
                        $reason="wrong username or password";
                        $notification['error'][] = "Please check username or password.";
                        $_SESSION['errup']= "Please check username or password.";
                        $notification_string = create_notification_string($notification);
                        $redirect_path = 'index.php';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?errup=Y"; ?>'; </script><?php

                    }

                    $errors = $notification['error'];
                    if($errors and !empty($errors))
                    {

                        $notification_string = create_notification_string($notification);
                        $_SESSION['login_error']=$notification_string;
                        $redirect_path = 'index.php';

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

                                $_SESSION['admin_id'] = $admin_id;
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
                                $redirect_path = 'index.php';
                                ?><script type="text/javascript">window.location = '<?php echo $redirect_path."?u_no_login_error=Y"; ?>'; </script><?php
                            }


                            $user_type=$admins_table->retrieve_user($admin_id);
                            $login_table = new log_table();
                            $redirect_path = 'books.php';


                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path;?>'; </script><?php

                        }
                    }

                    break;
                }
            ////////////////////////////////////////////////////Start Books/////////////////////////////////////////////////
            case 'add_book':
                {
                    $data                    = array();
                    $data['book_name']       = $_POST['name'];
                    $data['author_id']       = $_POST['author'];
                    $data['cat_id']          = $_POST['cat_id'];
                    $data['price']           = $_POST['price'];
                    $data['qty']             = $_POST['qty'];
                    $data['book_desc']       = $_POST['desc'];
                    // upload original image
                    $upload_path = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/original/";
                    $upload_thumb_path = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/thumbnails/770_470/";
                    $upload_thumb_path2 = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/thumbnails/370_270/";
                    $target_file = basename($_FILES["image_field"]["name"]);
                    $foo = new upload($_FILES['image_field']);
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_file_name = time();

                    if ($foo->uploaded) {
                        $foo->file_new_name_body = $new_file_name;
                        $file_name = $foo->Process($upload_path);
                        if ($foo->processed) {
                            //resize 770 * 470
                            $foo->file_new_name_body = $new_file_name;
                            $foo->image_resize = true;
                            $foo->image_x = 770;
                            $foo->image_y = 470;
                            $foo->Process($upload_thumb_path);
                            if ($foo->processed) {
                                //resize 370 * 270
                                $foo->file_new_name_body = $new_file_name;
                                $foo->image_resize = true;
                                $foo->image_x = 370;
                                $foo->image_y = 270;
                                $foo->Process($upload_thumb_path2);
                                if ($foo->processed) {
                                    $foo->Clean();
                                    $data['image']        = $new_file_name.'.'.$imageFileType;
                                }
                                else {
                                    $redirect_path = 'add_book.php';
                                    $_SESSION['err_img_upload'] = $foo->error;
                                    ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                                }
                                $foo->Clean();
                            } else {
                                $redirect_path = 'add_book.php';
                                $_SESSION['err_img_upload'] = $foo->error;
                                ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                            }

                        } else {
                            $redirect_path = 'add_book.php';
                            $_SESSION['err_img_upload'] = $foo->error;
                            ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                        }
                    }
                    // end upload

                    $book_table              = new books_table();
                    $add_data                = $book_table->add_new_data($data);

                    if ( !empty($add_data) ) {
                        $redirect_path = 'books.php';
                        $_SESSION['succ_post_add'] = 'Successfully add Book';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_post_add=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'add_book.php';
                        $_SESSION['err_post_add'] = 'Error Creating Post. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_post_add=Y'; ?>'; </script><?php
                    }


                    break;
                }

            case 'edit_book':
                {
                    $data               = array();
                    $data['book_name']  = $_POST['name'];
                    $data['author_id']  = $_POST['author'];
                    $data['cat_id']     = $_POST['cat_id'];
                    $data['price']      = $_POST['price'];
                    $data['qty']        = $_POST['qty'];
                    $data['book_desc']  = $_POST['desc'];
                    if(isset ($_FILES["image_field"]["name"]) ){
                        // upload original image
                        $upload_path = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/original/";
                        $upload_thumb_path = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/thumbnails/770_470/";
                        $upload_thumb_path2 = $_SERVER["DOCUMENT_ROOT"]."/web_p_project/admin/upload/thumbnails/370_270/";
                        $target_file = basename($_FILES["image_field"]["name"]);
                        $foo = new upload($_FILES['image_field']);
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        $new_file_name = time();

                        if ($foo->uploaded) {
                            $foo->file_new_name_body = $new_file_name;
                            $file_name = $foo->Process($upload_path);
                            if ($foo->processed) {
                                //resize 770 * 470
                                $foo->file_new_name_body = $new_file_name;
                                $foo->image_resize = true;
                                $foo->image_x = 770;
                                $foo->image_y = 470;
                                $foo->Process($upload_thumb_path);
                                if ($foo->processed) {
                                    //resize 370 * 270
                                    $foo->file_new_name_body = $new_file_name;
                                    $foo->image_resize = true;
                                    $foo->image_x = 370;
                                    $foo->image_y = 270;
                                    $foo->Process($upload_thumb_path2);
                                    if ($foo->processed) {
                                        $foo->Clean();
                                        $data['image']        = $new_file_name.'.'.$imageFileType;
                                    }
                                    else {
                                        $redirect_path = 'add_book.php';
                                        $_SESSION['err_img_upload'] = $foo->error;
                                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                                    }
                                    $foo->Clean();
                                } else {
                                    $redirect_path = 'add_book.php';
                                    $_SESSION['err_img_upload'] = $foo->error;
                                    ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                                }

                            } else {
                                $redirect_path = 'add_book.php';
                                $_SESSION['err_img_upload'] = $foo->error;
                                ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_img_upload=Y'; ?>'; </script><?php
                            }
                        }
                        // end upload
                    }


                    $book_id    =  $_POST['bookd_id'];
                    $book_where = '`id`='.$book_id;
                    $book_table = new books_table();
                    $return = $book_table->update_data($data, $book_where);

                    if ( !empty($return) ) {
                        $redirect_path = 'books.php';
                        $_SESSION['succ_post_edit'] = 'Successfully Edit Book';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_post_edit=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'edit_book.php';
                        $_SESSION['err_post_edit'] = 'Error Creating Post. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_post_edit=Y'; ?>'; </script><?php
                    }


                    break;
                }

            ////////////////////////////////////////////////////End Books/////////////////////////////////////////////////
            ///
            /// ////////////////////////////////////////////////////Start Categories/////////////////////////////////////////////////

            case 'add_cat':
                {
                    $data                    = array();
                    $data['category_name']   = $_POST['name'];
                    $data['cat_desc']        = $_POST['desc'];
                    $cat_table               = new categories_table();
                    $add_data                = $cat_table->add_new_data($data);

                    if ( !empty($add_data) ) {
                        $redirect_path = 'categories.php';
                        $_SESSION['succ_cat_add'] = 'Successfully add category';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_cat_add=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'add_cat.php';
                        $_SESSION['err_cat_add'] = 'Error Creating Post. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_cat_add=Y'; ?>'; </script><?php
                    }


                    break;
            }

            case 'edit_cat':
                {
                    $data                    = array();
                    $data['category_name']   = $_POST['name'];
                    $data['cat_desc']        = $_POST['desc'];
                    $cat_id                  =  $_POST['cat_id'];
                    $cat_where               = '`id`='.$cat_id;
                    $cat_table               = new categories_table();
                    $return                  = $cat_table->update_data($data, $cat_where);

                    if ( !empty($return) ) {
                        $redirect_path = 'categories.php';
                        $_SESSION['succ_cat_edit'] = 'Successfully edit category';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_cat_edit=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'edit_cat.php';
                        $_SESSION['err_cat_edit'] = 'Error editing Category. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_cat_edit=Y'; ?>'; </script><?php
                    }


                    break;
                }

            ////////////////////////////////////////////////////End Categories/////////////////////////////////////////////////
            ///
            /// ////////////////////////////////////////////////////Start Authors/////////////////////////////////////////////////

            case 'add_auth':
                {
                    $data                    = array();
                    $data['author_name']     = $_POST['name'];
                    $data['author_desc']     = $_POST['desc'];
                    $author_table            = new authors_table();
                    $add_data                = $author_table->add_new_data($data);

                    if ( !empty($add_data) ) {
                        $redirect_path = 'authors.php';
                        $_SESSION['succ_auth_add'] = 'Successfully add Author';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_auth_add=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'add_auth.php';
                        $_SESSION['err_auth_add'] = 'Error Creating Author. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_auth_add=Y'; ?>'; </script><?php
                    }


                    break;
                }

            case 'edit_auth':
                {
                    $data                    = array();
                    $data['author_name']     = $_POST['name'];
                    $data['author_desc']     = $_POST['desc'];
                    $author_id               =  $_POST['author_id'];
                    $author_where            = '`id`='.$author_id;
                    $author_table            = new authors_table();
                    $return                  = $author_table->update_data($data, $author_where);

                    if ( !empty($return) ) {
                        $redirect_path = 'authors.php';
                        $_SESSION['succ_auth_edit'] = 'Successfully edit author';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?succ_auth_edit=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'edit_auth.php';
                        $_SESSION['err_auth_edit'] = 'Error editing Author. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_auth_edit=Y'; ?>'; </script><?php
                    }


                    break;
                }


                //reject order
            case 'reject_order':
                {
                    $data                    = array();
                    $data['status']          = 2;
                    $data['reject_reason']   = $_POST['reject_reason'];
                    $order_id                =  $_POST['order_id'];
                    $order_where             = '`id`='.$order_id;
                    $order_table             = new userorders_table();
                    $return                  = $order_table->update_data($data, $order_where);

                    if ( !empty($return) ) {
                        $redirect_path = 'reservations.php';
                        $_SESSION['rej_ord'] = 'Successfully Reject Order';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?rej_ord=Y'; ?>'; </script><?php


                    }
                    else{
                        $redirect_path = 'reservations.php';
                        $_SESSION['err_rej_edit'] = 'Error editing Author. Please Try Again';
                        ?><script type="text/javascript">window.location = '<?php echo $redirect_path.'?err_rej_edit=Y'; ?>'; </script><?php
                    }


                    break;
                }
        }
    }
}


if($_GET) {

    //delete book

    $deleted_book_id = @$_GET['delbk'];
    if ($deleted_book_id and !empty($deleted_book_id)) {

        $notification_string = create_notification_string($notification);

        $book_table = new books_table();
        $book_data = $book_table->retrieve_books_by_id($deleted_book_id);

        if ($book_data) {
            $book_table  = new books_table();
            $book_delete = $book_table->delete_data($deleted_book_id);
        }
        $_SESSION['deleteb'] = "Book Deleted Successfully.";
        $redirect_path = 'books.php';
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path . '?deleteb=Y'; ?>'; </script><?php
    }


    //delete category

    $deleted_cat_id = @$_GET['delbcat'];
    if ($deleted_cat_id and !empty($deleted_cat_id)) {

        $notification_string = create_notification_string($notification);

        $cat_table = new categories_table();
        $cat_data = $cat_table->retrieve_category_by_id($deleted_cat_id);

        if ($cat_data) {
            $cat_table  = new categories_table();
            $cat_delete = $cat_table->delete_data($deleted_cat_id);
        }
        $_SESSION['deletecat'] = "Category Deleted Successfully.";
        $redirect_path = 'categories.php';
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path . '?deletecat=Y'; ?>'; </script><?php
    }


    //delete author

    $deleted_author_id = @$_GET['delbauth'];
    if ($deleted_author_id and !empty($deleted_author_id)) {

        $notification_string = create_notification_string($notification);

        $author_table = new authors_table();
        $auth_data = $author_table->retrieve_authors_by_id($deleted_author_id);

        if ($auth_data) {
            $author_table  = new authors_table();
            $auth_delete = $author_table->delete_data($deleted_author_id);
        }
        $_SESSION['deleteauth'] = "Author Deleted Successfully.";
        $redirect_path = 'authors.php';
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path . '?deleteauth=Y'; ?>'; </script><?php
    }


    //accept order

    $acc_ord = @$_GET['acc_ord'];
    if ($acc_ord and !empty($acc_ord)) {

        $notification_string = create_notification_string($notification);

        $user_orders = new userorders_table();
        $order_data  = $user_orders->retrieve_user_orders_by_id($acc_ord);

        if ($order_data) {
            $user_orders   = new userorders_table();
            $order_approve = $user_orders->approve($acc_ord);
        }
        $_SESSION['appr_ord'] = "Order Approved Successfully.";
        $redirect_path = 'reservations.php';
        ?>
        <script type="text/javascript">window.location = '<?php echo $redirect_path . '?appr_ord=Y'; ?>'; </script><?php
    }
}


