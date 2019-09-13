<?php
require_once 'header.php';
if(isset($_GET['edit']) && !empty($_GET['edit'])){
    $authors_table   = new authors_table();
    $author_data     = $authors_table->retrieve_authors_by_id($_GET['edit']);
}
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">
                    <h2> Edit Author </h2>
                    <form method="post" action="process.php">
                        <input type="hidden" name="form_name" value="edit_auth">
                        <input type="hidden" name="author_id" value="<?php echo $_GET['edit']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Author Name" value="<?php echo $author_data['author_name'];?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="desc" rows="3"><?php echo $author_data['author_desc'];?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
    </body>
</html>