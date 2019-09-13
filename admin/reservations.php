<?php
require_once 'header.php';

if (isset($_GET['appr_ord']) && $_GET['appr_ord'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['appr_ord']."</p>";
}elseif (isset($_GET['rej_ord']) && $_GET['rej_ord'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['rej_ord']."</p>";
}elseif (isset($_GET['err_rej_edit']) && $_GET['err_rej_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_rej_edit']."</p>";
}
?>

<style>
    .modal,body.modal-open {
        padding-right: 0!important
    }

    body.modal-open {
        overflow: auto
    }

    body.scrollable {
        overflow-y: auto
    }

    .modal-footer {
        display: flex;
        justify-content: flex-start;
    .btn {
        position: absolute;
        right: 10px;
    }
    }

</style>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">

                    <div class="row add-actions">
                        <div class="col-md-10">
                             <h2> All Reservations </h2>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-lg btn-add" href="add_res.php"> Add New </a>
                        </div>
                    </div>

                    <table data-toggle="table" data-pagination="true" data-search="true" data-sortable="true">

                        <thead>
                        <tr>
                            <th data-sortable="true">User Name</th>
                            <th data-sortable="true">Total Price</th>
                            <th data-sortable="true">Status</th>
                            <th data-sortable="true">Created At</th>
                             <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $user_orders = new userorders_table();
                        $users_table = new users_table();
                        $data   = $user_orders->retrieve_all_pending_orders();
                        foreach ($data as $single_data){
                            $user_data = $users_table->retrieve_user($single_data['user_id']);
                            ?>
                            <tr>
                                <td><a><?php echo $user_data['full_name'];?></a></td>


                                <td><?php echo $single_data['total_price'];?></td>
                                <td><?php echo $single_data['status'];?></td>
                                <td><?php echo $single_data['created_at'];?></td>
                                <td>
                                    <button class="btn btn-warning "><a class="normal-link" href="process.php?acc_ord=<?php echo $single_data['id'];?>">Accept Order</a></button>
                                    <a data-target="#modalIMG" data-toggle="modal" class="btn btn-danger ">Reject Order</a>
                                    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form method="post" action="process.php">
                                                        <input type="hidden" name="form_name" value="reject_order">
                                                        <input type="hidden" name="order_id" value="<?php echo $single_data['id'];?>">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Reject Reason</label>
                                                            <textarea class="form-control" rows="3" name="reject_reason"></textarea>
                                                        </div>
                                                        <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="submit">Submit</button>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
    </body>
</html>