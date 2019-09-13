<?php
require_once 'header.php';


if (isset($_GET['succ_auth_add']) && $_GET['succ_auth_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_auth_add']."</p>";
}elseif (isset($_GET['err_auth_add']) && $_GET['err_auth_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_auth_add']."</p>";
}elseif (isset($_GET['err_auth_add']) && $_GET['err_auth_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_auth_add']."</p>";
}elseif (isset($_GET['succ_auth_edit']) && $_GET['succ_auth_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_auth_edit']."</p>";
}elseif (isset($_GET['deleteauth']) && $_GET['deleteauth'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['deleteauth']."</p>";
}
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">

                    <div class="row add-actions">
                        <div class="col-md-10">
                             <h2> All Authors </h2>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-lg btn-add" href="add_auth.php"> Add New </a>
                        </div>
                    </div>

                    <table data-toggle="table" data-pagination="true" data-search="true" data-sortable="true">

                        <thead>
                        <tr>
                            <th data-sortable="true">Name</th>
                            <th data-sortable="true">Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $authors_table = new authors_table();
                        $data   = $authors_table->retrieve_all_authors();
                        foreach ($data as $single_data){
                            ?>
                            <tr>
                                <td><?php echo $single_data['author_name'];?></td>
                                <td><?php echo $single_data['author_desc'];?></td>
                                <td>
                                    <a href="edit_auth.php?edit=<?php echo $single_data['id']; ?>" class="btn btn-info"> Edit </a>
                                    <a href="process.php?delbauth=<?php echo $single_data['id']; ?>" class="btn btn-danger"> Delete </a>
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