<?php
require_once 'header.php';
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">
                    <h2> Add New Category </h2>
                    <form method="post" action="process.php">
                        <input type="hidden" name="form_name" value="add_cat">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="desc" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
    </body>
</html>