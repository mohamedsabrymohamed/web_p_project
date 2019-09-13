<?php
require_once 'header.php';
?>



<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Total Price</th>
            <th>Order Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $user_orders        = new userorders_table();
        $user_orders_data   = $user_orders->retrieve_orders_by_user_id(get_login_user_id_user());
        foreach ($user_orders_data as $single_data){
        ?>
        <tr>
            <td><?php echo $single_data['id'];?></td>
            <td><?php echo $single_data['total_price'];?></td>
            <td><?php if($single_data['status'] == 2){echo 'Rejected'.'<br>'.$single_data['reject_reason'];}elseif ($single_data['status'] == 1){echo 'Approved';}else{echo'Pending';} ?></td>
        </tr>
        <?php }?>

        </tbody>
    </table>


</div>
