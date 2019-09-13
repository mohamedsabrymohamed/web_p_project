<?php
require_once 'header.php';

if(isset($_GET['edit']) && !empty($_GET['edit'])){
    $books_table = new books_table();
    $books_data  = $books_table->retrieve_books_by_id($_GET['edit']);
}
?>

<div class="container page_padding">
    <div class="row">

        <!-- Page content -->
        <article class="col-md-12 content">
            <h2> Edit Book </h2>
            <form method="post" action="process.php" enctype="multipart/form-data">
                <input type="hidden" name="form_name" value="edit_book">
                <input type="hidden" name="bookd_id" value="<?php echo $_GET['edit'];?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Book Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Book Name" value="<?php echo $books_data['book_name'];?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Author</label>
                    <select name="author" class="form-control">
                        <?php
                        $authors_table = new authors_table();
                        $data          = $authors_table->retrieve_all_authors();
                        foreach($data as $single_data) {
                        $selected="";
                        $author_name  = $single_data['author_name'];
                        $author_id    = $single_data['id'];


                        if($books_data['author_id'] == $author_id)
                        {
                            $selected = "selected='selected'";
                        }

                            ?>
                            <option value="<?php echo $author_id; ?>" <?php echo $selected; ?>><?php echo $author_name; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price"value="<?php echo $books_data['price'];?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Qty</label>
                    <input type="number" class="form-control" name="qty" placeholder="Qty" value="<?php echo $books_data['qty'];?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="cat_id"  class="form-control">
                        <?php
                        $cat_table     = new categories_table();
                        $data          = $cat_table->retrieve_all_categories();
                        foreach($data as $single_data) {
                            $selected="";
                            $author_name  = $single_data['category_name'];
                            $author_id    = $single_data['id'];


                            if($books_data['cat_id'] == $author_id)
                            {
                                $selected = "selected='selected'";
                            }

                            ?>
                            <option value="<?php echo $author_id; ?>" <?php echo $selected; ?>><?php echo $author_name; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="desc" rows="3"><?php echo $books_data['book_desc'];?></textarea>
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