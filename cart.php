<?php
require_once 'header.php';
?>

<?php
if(isset($_GET['deletecartitem']) && $_GET['deletecartitem'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['deletecartitem']."</p>";
}
?>


<div class="container">
    <table class="mt-5 table table-striped table-bordered">
        <thead>
        <tr>
            <th>Book Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cart_table  = new cart_table();
        $books_table = new books_table();
        $sum_price   = 0;
        $cart_data   = $cart_table->retrieve_cart_by_user_id(get_login_user_id_user());
        foreach ($cart_data as $single_data){
           $book_data = $books_table->retrieve_books_by_id($single_data['book_id']);
        ?>
        <tr>
            <td><?php echo $book_data['book_name'];?></td>
            <td><?php
                $sum += $book_data['price'];
                echo $book_data['price'];?></td>
            <td style="width: 100%;" class=" normal-link btn btn-danger"><a style="color: white!important; text-decoration: none;"  href="process.php?delcartid=<?php echo $single_data['id'];?>">Delete From Cart</a></td>
        </tr>
        <?php }?>

        </tbody>
    </table>

    <div class="pull-right">
        <div class="span"><div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $sum; ?></div></div>
    </div>



    <form class="" action="process.php" method="post">
        <input type="hidden" name="form_type" value="ajax">
        <input type="hidden" name="form_name" value="checkout_form">
    <button type="submit" style="width: 100%" class="mb-4 btn btn-primary">Checkout</button>
    </form>
</div>
