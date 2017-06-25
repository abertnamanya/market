<div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="#" onclick="add_market()"> <i class="fa fa-plus"></i> Register Market
    </a>  
</div>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>Market</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($markets)) {
                $count = 1;
                foreach ($markets as $market) {
                    echo '<tr>';
                    echo("<td>" . $count . "</td>");
                    echo("<td>" . $market->market_name . "</td>");
                    echo("<td>" . $market->location . "</td>");
                    ?>
                <td>
                    <button type="button"onclick="editMarket(<?php echo $market->market_id; ?>)" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteMarket(<?php echo $market->market_id; ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
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
    function add_market() {
        save_method = "save";
        $('#usersForm')[0].reset();
        $('.modal-title').text('Add Market');
        $('#userModal').modal('show');

    }
    function saveUser() {
        var url;
        if (save_method == "save") {
            url = "<?php echo base_url('admin_main/addMarket'); ?>";
        } else {
            url = "<?php echo base_url('admin_main/updateMarket'); ?>";
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
    function editMarket(market_id) {
        save_method = "update";
        $.ajax({
            url: "<?php echo base_url('admin_main/marketDetails/'); ?>/" + market_id,
            type: 'POST',
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                $('[name="market"]').val(data.market_name);
                $('[name="market_id"]').val(data.market_id);
                $('.modal-title').text('Edit Market');
                $('#userModal').modal('show');
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function deleteMarket(market_id) {

        if (confirm("Are you sure want to delete")) {
            $.ajax({
                url: "<?php echo base_url('admin_main/deleteMarket/'); ?>/" + market_id,
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
                                    <label class="control-label">Market Name</label>
                                    <input type="text" class="form-control" name="market">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Market Location</label>
                                    <select name="location" class="form-control">
                                        <?php
                                        if ($locations) {
                                            foreach ($locations as $location) {
                                                echo '<option value="' . $location->location_id . '">' . $location->location . '</option>';
                                            }
                                        }
                                        ?>
                                        <option></option>
                                    </select>
                                </div>


                                <input type="hidden" class="form-control" name="market_id">
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
