<?php
require_once 'header.php';
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">
                    <h2> Add New Reservation </h2>
                    <form method="post">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Books</label>
                            <select id="book_id" name="book_id" class="form-control">
                                <?php
                                $sql = "SELECT * FROM books";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                    <?php }}?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Clients</label>
                            <select name="user_id" class="form-control">
                                <?php
                                $sql = "SELECT * FROM users";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['full_name'];?></option>
                                    <?php }}?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Reservation Date</label>
                            <input type="date" class="form-control" name="res_date">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Due Date</label>
                            <input type="date" class="form-control" name="due_date">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input id="price" type="number" class="form-control" name="price">
                        </div>



                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </article>

            </div>
        </div>


<?php require_once 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#book_id').change(function(){
        var name = $(this).val();
        var dataString = "name=" + name;
        $.ajax ({
            type: "POST",
            url: "get_results.php",
            data: dataString,
            dataType: 'json',
            success: function(data) {
                $('#price').val(data.price);
            }
        });
    });
</script>
    </body>
</html>