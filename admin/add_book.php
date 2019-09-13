<?php
require_once 'header.php';
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">
                    <h2> Add New Book </h2>
                    <form method="post" action="process.php" enctype="multipart/form-data">
                        <input type="hidden" name="form_name" value="add_book">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Book Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Book Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Author</label>
                            <select name="author" class="form-control">
                                <?php
                               $authors_table = new authors_table();
                               $data          = $authors_table->retrieve_all_authors();


                                foreach($data as $single_data) {
                                ?>
                                <option value="<?php echo $single_data['id'];?>"><?php echo $single_data['author_name'];?></option>
                               <?php }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Qty</label>
                            <input type="number" class="form-control" name="qty" placeholder="Qty">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="cat_id"  class="form-control">
                                <?php
                                $cat_table     = new categories_table();
                                $data          = $cat_table->retrieve_all_categories();


                                foreach($data as $single_data) {
                                    ?>
                                    <option value="<?php echo $single_data['id'];?>"><?php echo $single_data['category_name'];?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="desc" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" name="image_field" >
                        </div>

                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
    </body>
</html>