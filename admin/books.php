<?php
require_once 'header.php';
if(isset($_GET['err_img_upload']) && $_GET['err_img_upload'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_img_upload']."</p>";
}elseif (isset($_GET['err_post_add']) && $_GET['err_post_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_post_add']."</p>";
}elseif (isset($_GET['succ_post_add']) && $_GET['succ_post_add'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_post_add']."</p>";
}elseif (isset($_GET['deleteb']) && $_GET['deleteb'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['deleteb']."</p>";
}elseif (isset($_GET['succ_post_edit']) && $_GET['succ_post_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['succ_post_edit']."</p>";
}elseif (isset($_GET['err_post_edit']) && $_GET['err_post_edit'] == 'Y'){
    echo "<p class='p_warning'>".$_SESSION['err_post_edit']."</p>";
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
                             <h2> All Books </h2>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-lg btn-add" href="add_book.php"> Add New </a>
                        </div>
                    </div>

                    <table data-toggle="table" data-pagination="true" data-search="true" data-sortable="true">

                        <thead>
                        <tr>
                            <th data-sortable="true">Image</th>
                            <th data-sortable="true">Book Name</th>
                            <th data-sortable="true">Author</th>
                            <th data-sortable="true">Category</th>
                            <th data-sortable="true">Price</th>
                            <th data-sortable="true">Qty</th>
                             <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $books_table  = new books_table();
                        $author_table = new authors_table();
                        $cat_table    = new categories_table();

                        $data   = $books_table->retrieve_all_books();
                        foreach ($data as $single_data){
                            ?>
                            <tr>
                                <td><img data-target="#modalIMG" data-toggle="modal" src="<?php echo 'upload/thumbnails/370_270/'.$single_data['image'];?>" alt="<?php echo $single_data['image_entry'];?>" border="3" height="100" width="100" /></td>
                                <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body mb-0 p-0">
                                                <img src="<?php echo 'upload/original/'.$single_data['image'];?>" alt="" style="width:100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td><?php echo $single_data['book_name'];?></td>
                                <td><?php
                                    $author_data = $author_table->retrieve_authors_by_id($single_data['author_id']);
                                    echo $author_data['author_name'];?></td>
                                <td><?php
                                    $cat_data  = $cat_table->retrieve_category_by_id($single_data['cat_id']);
                                    echo $cat_data['category_name'];?></td>
                                <td><?php echo $single_data['price'];?></td>
                                <td><?php echo $single_data['qty'];?></td>
                                 <td>
                                     <a href="edit_book.php?edit=<?php echo $single_data['id']; ?>" class="btn btn-info"> Edit </a>
                                     <a href="process.php?delbk=<?php echo $single_data['id']; ?>" class="btn btn-danger"> Delete </a>
                                 </td>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>

<script>
    $( 'a a' ).remove();

    document.documentElement.setAttribute("lang", "en");
    document.documentElement.removeAttribute("class");

    axe.run( function(err, results) {
        console.log( results.violations );
    } );
</script>
    </body>
</html>