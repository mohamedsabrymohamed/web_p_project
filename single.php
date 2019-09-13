<?php
require_once 'header.php';
if(isset($_GET['bkid']) && !empty($_GET['bkid'])){
$books_table  = new books_table();
$author_table = new authors_table();
$books_data   = $books_table->retrieve_books_by_id($_GET['bkid']);
$author_data  = $author_table->retrieve_authors_by_id($books_data['author_id']);

}
?>

<div class="container">

<section class="pt-3 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card border-secondary mb-3" style="    width: 600px;
    height: 377px;">
                    <div class="card-header"> Book Author:  <?php echo $author_data['author_name']; ?>
                    </div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Book Description:</h5>
                        <p class="card-text">  <?php echo $books_data['book_desc'];?>
                        </p>
                    </div>
                </div>

                </div>



            <div id="affix" class="col-lg-4 sidebar-long">
                <div class="card bg-light" style="width: 100%;">
                    <a data-toggle="modal" data-target="#previewCourse" data-backdrop="static" data-keyboard="false">
                        <div>
                            <img src="<?php echo 'admin/upload/thumbnails/370_270/'.$books_data['image'];?>" alt="" class="card-img-top">
                        </div>
                    </a>
                    <div class="card-body"><h4 class="card-title"><span class="price"><?php echo $books_data['price'].'$';?></span></h4>
                        <?php
                        if(!get_login_user_id_user()) {
                            ?>
                            <a href="login.php"
                               class="btn btn-block btn-danger btn-lg rounded-0">
                                Buy now
                            </a>
                            <?php
                        }else{
                        ?>

                        <form action="process.php" method="post">
                            <input type="hidden" name="form_type" value="ajax">
                            <input type="hidden" name="form_name" value="add_to_cart">
                            <input type="hidden" name="book_id" value="<?php echo $books_data['id'];?>">
                            <button type="submit" class="btn btn-block btn-danger btn-lg rounded-0">Buy now</button>
                        </form>
                        <?php }?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

</div>




<?php require_once 'footer.php';?>


</body>
</html>