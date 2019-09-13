<?php
require_once 'header.php';
if(isset($_GET['edit']) && !empty($_GET['edit'])){
    $cat_table   = new categories_table();
    $cat_data    = $cat_table->retrieve_category_by_id($_GET['edit']);
}
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">
                    <h2> Edit Category </h2>
                    <form method="post" action="process.php">
                        <input type="hidden" name="form_name" value="edit_cat">
                        <input type="hidden" name="cat_id" value="<?php echo $_GET['edit']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="category Name" value="<?php echo $cat_data['category_name'];?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="desc" rows="3"><?php echo $cat_data['cat_desc'];?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
    </body>
</html>