<?php
require_once 'header.php';
?>
<?php
if (isset($_GET['add_cart']) && $_GET['add_cart'] == 'Y') {
    echo "<p class='p_warning'>" . $_SESSION['add_cart'] . "</p>";
} elseif (isset($_GET['com_order']) && $_GET['com_order'] == 'Y') {
    echo "<p class='p_warning'>" . $_SESSION['com_order'] . "</p>";
}
?>
<!-- books user here-->
<div class="container page_padding"></div>

<div class="row justify-content-end">
    <div class="col-lg-7">
        <form style="    direction: rtl;
    float: left;
    margin-left: 20px;
" class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search With Author Name" aria-label="Search"
                   name="qa_search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="col-lg-4">
        <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search With Book Name" aria-label="Search"
                   name="qb_search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
<div class="container">
    <div class="boks row">
        <div class="card-deck">
            <?php
            $books_table = new books_table();
            if (isset($_POST['qa_search']) && !empty($_POST['qa_search'])) {
                $books_data = $books_table->retrieve_books_by_author_name($_POST['qa_search']);
            } elseif (isset($_POST['qb_search']) && !empty($_POST['qb_search'])) {
                $books_data = $books_table->retrieve_books_by_book_name($_POST['qb_search']);
            } else {
                $books_data = $books_table->retrieve_all_books();
            }

            foreach ($books_data as $single_book) {
                ?>
                <div class="col-lg-3">
                    <div class="card mt-3">
                        <img src="<?php echo 'admin/upload/thumbnails/370_270/' . $single_book['image']; ?>"
                             class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $single_book['book_name']; ?></h5>
                            <p class="card-text"><?php echo $single_book['price'] . '$'; ?></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-light"
                               href="single.php?bkid=<?php echo $single_book['id']; ?>">Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>


<?php require_once 'footer.php'; ?>


</body>
</html>