<div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="#" onclick="add_market()"> <i class="fa fa-plus"></i> Add new product price
    </a>  
</div>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>Date</th>
                <th>Market</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Units</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            function getDatetimeNow() {
                $tz_object = new DateTimeZone('EAT');
                $datetime = new DateTime();
                $datetime->setTimezone($tz_object);
                return $datetime->format('d\/m\/Y');
            }

            if (isset($prices)) {
                foreach ($prices as $price) {
                    echo '<tr>';
                    if ($price->time_stamp == getDatetimeNow()) {
                        echo("<td class=\"text-danger\">" . $price->time_stamp . "</td>");
                    } else {
                        echo("<td class=\"text-success\">" . $price->time_stamp . "</td>");
                    }
                    echo("<td>" . $price->market_name . "</td>");
                    echo("<td>" . $price->product_name . "</td>");
                    echo("<td>" . $price->quantity . "</td>");
                    echo("<td>" . $price->units . "</td>");
                    echo("<td>" . $price->price . "</td>");
                    ?>
                <td>
                    <button type="button"onclick="editPrice(<?php echo $price->price_id; ?>)" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deletePrice(<?php echo $price->price_id; ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
                </td>
                <?php
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    var save_method;
    function add_market() {
        save_method = "save";
        $('#usersForm')[0].reset();
        $('.modal-title').text('Add New product Price');
        $('#userModal').modal('show');

    }
    function saveUser() {
        var url;
        if (save_method == "save") {
            url = "<?php echo base_url('admin_main/addPrice'); ?>";
        } else {
            url = "<?php echo base_url('admin_main/updatePrice'); ?>";
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
    function editPrice(price_id) {
        save_method = "update";
        $.ajax({
            url: "<?php echo base_url('admin_main/priceDetails/'); ?>/" + price_id,
            type: 'POST',
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                $('[name="price"]').val(data.price);
                $('[name="qty"]').val(data.quantity);
                $('[name="units"]').val(data.units);
                $('[name="market"]').val(data.market_market_id);
                $('[name="product"]').val(data.product_product_id);
                $('[name="time_stamp"]').val(data.time_stamp);
                $('[name="price_id"]').val(data.price_id);
                $('.modal-title').text('Edit price');
                $('#userModal').modal('show');
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function deletePrice(price_id) {

        if (confirm("Are you sure want to delete")) {
            $.ajax({
                url: "<?php echo base_url('admin_main/deletePrice/'); ?>/" + price_id,
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
                                <div class="form-group">
                                    <label class="control-label">Market</label>
                                    <select name="market" class="form-control">
                                        <?php
                                        if ($markets) {
                                            foreach ($markets as $market) {
                                                echo '<option value="' . $market->market_id . '">' . $market->market_name . '</option>';
                                            }
                                        }
                                        ?>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product</label>
                                    <select name="product" class="form-control">
                                        <?php
                                        if ($products) {
                                            foreach ($products as $product) {
                                                echo '<option value="' . $product->product_id . '">' . $product->product_name . '</option>';
                                            }
                                        }
                                        ?>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">quantity</label>
                                    <input type="number" class="form-control" name="qty">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Units</label>
                                    <select name="units" class="form-control">
                                        <option value="Kgs">Kgs</option>
                                        <option value="Grams">Grams</option>
                                        <option value="Litres">Litres</option>
                                        <option value="Bags">Bags</option>
                                        <option value="50kg Bags">50kg Bags</option>
                                        <option value="100kg Bags">100kg Bags</option>
                                        <option value="Boxes">Boxes</option>
                                        <option value="Batches">Batches</option>
                                        <option value="Tins">Tins</option>
                                        <option value="Numbers">Numbers</option>
                                        <option value="Trays">Trays</option>
                                        <option value="Cups">Cups</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Price Date</label>
                                    <span><i class="fa fa-calendar"></i></span><input id='minMaxExample2' type="text" name="time_stamp" class="form-control years">
                                </div>

                                <input type="hidden" class="form-control" name="price_id">
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

