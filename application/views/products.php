<div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="#" onclick="add_product()"> <i class="fa fa-plus"></i> Register New Product
    </a>  
</div>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($products)) {
                $count = 1;
                foreach ($products as $product) {
                    echo '<tr>';
                    echo("<td>" . $count . "</td>");
                    echo("<td>" . $product->product_name . "</td>");
                    echo("<td>" . $product->category_name . "</td>");
                    ?>
                <td>
                    <button type="button"onclick="editProduct(<?php echo $product->product_id; ?>)" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteProduct(<?php echo $product->product_id; ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                </td>
                <?php
                echo '</tr>';
                $count++;
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    var save_method;
    function add_product() {
        save_method = "save";
        $('#usersForm')[0].reset();
        $('.modal-title').text('Add Product');
        $('#userModal').modal('show');

    }
    function saveUser() {
        var url;
        if (save_method == "save") {
            url = "<?php echo base_url('admin_main/addProduct'); ?>";
        } else {
            url = "<?php echo base_url('admin_main/updateProduct'); ?>";
        }
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: $('#usersForm').serialize(),
            success: function (data, textStatus, jqXHR) {
                $('#usersForm')[0].reset();
                $('#userModal').modal('hide');
                location.reload();
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function editProduct(product_id) {
        save_method = "update";
        $.ajax({
            url: "<?php echo base_url('admin_main/productDetails/'); ?>/" + product_id,
            type: 'POST',
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                $('[name="product"]').val(data.product_name);
                $('[name="product_id"]').val(data.product_id);
                $('.modal-title').text('Edit Product');
                $('#userModal').modal('show');
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function deleteProduct(product_id) {

        if (confirm("Are you sure want to delete")) {
            $.ajax({
                url: "<?php echo base_url('admin_main/deleteProduct/'); ?>/" + product_id,
                type: 'POST',
                dataType: 'JSON',
                success: function (data, textStatus, jqXHR) {
                    location.reload();
                }, error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    }

</script>



<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3><i class="fa fa-user m-r-5" ></i> <span class="modal-title"></span></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" id="usersForm" action="">
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" class="form-control" name="product">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">category</label>
                                    <select name="category" class="form-control">
                                        <?php
                                        if ($categories) {
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category->category_id . '">' . $category->category_name . '</option>';
                                            }
                                        }
                                        ?>
                                        <option></option>
                                    </select>
                                </div>


                                <input type="hidden" class="form-control" name="product_id">
                                <div class="col-md-12 form-group user-form-group">
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                        <button type="button" onclick="saveUser()" class="btn btn-add btn-sm">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
