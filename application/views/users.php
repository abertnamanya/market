<div class="buttonexport" id="buttonlist"> 
    <a class="btn btn-add" href="#" onclick="add_user()"> <i class="fa fa-plus"></i> Add User
    </a>  
</div>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>username</th>
                <th>password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($users)) {
                $count = 1;
                foreach ($users as $user) {
                    echo '<tr>';
                    echo("<td>" . $count . "</td>");
                    echo("<td>" . $user->firstName . "</td>");
                    echo("<td>" . $user->lastName . "</td>");
                    echo("<td>" . $user->contact . "</td>");
                    echo("<td>" . $user->username . "</td>");
                    echo("<td>" . $user->password . "</td>");
                    ?>
                <td>
                    <button type="button"onclick="editUser(<?php echo $user->user_id; ?>)" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteUser(<?php echo $user->user_id; ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
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
    function add_user() {
        save_method = "save";
        $('#usersForm')[0].reset();
        $('.modal-title').text('Add new user');
        $('#userModal').modal('show');

    }
    function saveUser() {
        var url;
        if (save_method == "save") {
            url = "<?php echo base_url('admin_main/addUser'); ?>";
        } else {
            url = "<?php echo base_url('admin_main/updateUser'); ?>";
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
    function editUser(user_id) {
        save_method = "update";
        $.ajax({
            url: "<?php echo base_url('admin_main/userDetails/'); ?>/" + user_id,
            type: 'POST',
            dataType: 'JSON',
            success: function (data, textStatus, jqXHR) {
                $('[name="firstName"]').val(data.firstName);
                $('[name="lastName"]').val(data.lastName);
                $('[name="contact"]').val(data.contact);
                $('[name="username"]').val(data.username);
                $('[name="password"]').val(data.password);
                $('[name="user_id"]').val(data.user_id);
                $('.modal-title').text('Edit User');
                $('#userModal').modal('show');
            }, error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    function deleteUser(user_id) {

        if (confirm("Are you sure want to delete")) {
            $.ajax({
                url: "<?php echo base_url('admin_main/deleteUser/'); ?>/" + user_id,
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
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="firstName">
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label">LastName</label>
                                    <input type="text"  class="form-control" name="lastName">
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="control-label">Contact</label>
                                    <input type="text"class="form-control" name="contact">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">username</label><br>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                                <input type="hidden" class="form-control" name="user_id">
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
