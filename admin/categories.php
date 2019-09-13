<?php
require_once 'header.php';

if (isset($_GET['succ_cat_add']) && $_GET['succ_cat_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_cat_add']."</p>";
}elseif (isset($_GET['err_cat_add']) && $_GET['err_cat_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_cat_add']."</p>";
}elseif (isset($_GET['succ_cat_edit']) && $_GET['succ_cat_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_cat_edit']."</p>";
}elseif (isset($_GET['err_cat_edit']) && $_GET['err_cat_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_cat_edit']."</p>";
}elseif (isset($_GET['deletecat']) && $_GET['deletecat'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['deletecat']."</p>";
}
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">

                    <div class="row add-actions">
                        <div class="col-md-10">
                             <h2> All Categories </h2>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-lg btn-add" href="add_cat.php"> Add New </a>
                        </div>
                    </div>

                    <table data-toggle="table" data-pagination="true" data-search="true" data-sortable="true">

                        <thead>
                        <tr>
                            <th data-sortable="true">Category Name</th>
                            <th data-sortable="true">Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $category_table = new categories_table();
                        $data   = $category_table->retrieve_all_categories();
                        foreach ($data as $single_data){
                            ?>
                            <tr>
                                 <td><?php echo $single_data['category_name'];?></td>
                                <td><?php echo $single_data['cat_desc'];?></td>
                                <td>
                                    <a href="edit_cat.php?edit=<?php echo $single_data['id']; ?>" class="btn btn-info"> Edit </a>
                                    <a href="process.php?delbcat=<?php echo $single_data['id']; ?>" class="btn btn-danger"> Delete </a>
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