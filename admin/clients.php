<?php
require_once 'header.php';
?>
    
        <div class="container page_padding">
            <div class="row">

                <!-- Page content -->
                <article class="col-md-12 content">

                    <div class="row add-actions">
                        <div class="col-md-10">
                             <h2> All Clients </h2>
                        </div>

                    </div>

                    <table data-toggle="table" data-pagination="true" data-search="true" data-sortable="true">

                        <thead>
                        <tr>
                            <th data-sortable="true">Full Name</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Mobile</th>
                            <th data-sortable="true">Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $users_table = new users_table();
                        $data   = $users_table->retrieve_all_users();
                        foreach ($data as $single_data){
                            ?>
                            <tr>
                                <td>
                                    <a data-target="#modalIMG" data-toggle="modal" class="open-AddBookDialog btn btn-primary" data-id="<?php echo $single_data['id'];?>" ><?php echo $single_data['full_name'];?></a>

                                </td>
                                <td><?php echo $single_data['email'];?></td>
                                <td><?php echo $single_data['mobile'];?></td>
                                <td><?php echo $single_data['addreess'];?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>

                </article>

            </div>
        </div>

<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php';?>
<script>
    // $(document).on("click", ".open-AddBookDialog", function () {
    //     var myBookId = $(this).data('id');
    //     $(".modal-body #bookId").val( myBookId );
    //     // As pointed out in comments,
    //     // it is unnecessary to have to manually call the modal.
    //     // $('#addBookDialog').modal('show');
    // });



    $(document).ready(function(){

        $('.open-AddBookDialog').click(function(){
            var userid = $(this).data('id');

            // AJAX request
            $.ajax({
                url: 'show_modal.php',
                type: 'post',
                data: {userid: userid},
                success: function(response){
                    $('.modal-body').html(response);
                    $('#empModal').modal('show');
                }
            });
        });
    });
</script>


    </body>
</html>