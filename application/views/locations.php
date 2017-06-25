<div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="#" onclick="add_location()"> <i class="fa fa-plus"></i> Add Location
    </a>  
</div>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($locations)) {
                $count = 1;
                foreach ($locations as $location) {
                    echo '<tr>';
                    echo("<td>" . $count . "</td>");
                    echo("<td>" . $location->location . "</td>");
                    ?>
                <td>
                    <button type="button"onclick="editLocation(<?php echo $location->location_id; ?>)" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteLocation(<?php echo $location->location_id; ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
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
    function add_location() {
        save_method = "save";
        $('#usersForm')[0].reset();
        $('.modal-title').text('Add Location');
        $('#userModal').modal('show');

    }
    function saveUser() {
        var url;
        if (save_method == "save") {
            url = "<?php echo base_url('admin_main/addLocation'); ?>";
        } else {
            url = "<?php echo base_url('admin_main/updateLocation'); ?>";
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
    function editLocation(location_id) {
        save_method = "update";
        $.ajax({
            url: "<?php echo base_url('admin_main/locationDetails/'); ?>/" + location_id,
            type: 'POST',
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                $('[name="location"]').val(data.location);
                $('[name="location_id"]').val(data.location_id);
                $('.modal-title').text('Edit Location');
                $('#userModal').modal('show');
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function deleteLocation(location_id) {

        if (confirm("Are you sure want to delete")) {
            $.ajax({
                url: "<?php echo base_url('admin_main/deleteLocation/'); ?>/" + location_id,
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
                                    <label class="control-label">Location</label>
                                    <input type="text" class="form-control" name="location">
                                </div>

                                <input type="hidden" class="form-control" name="location_id">
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
