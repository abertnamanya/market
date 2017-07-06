
<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="info">
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($mobile_users)) {
                $count = 1;
                foreach ($mobile_users as $user) {
                    echo '<tr>';
                    echo("<td>" . $count . "</td>");
                    echo("<td>" . $user->firstName . "</td>");
                    echo("<td>" . $user->lastName . "</td>");
                    echo("<td>" . $user->contact . "</td>");
                    echo("<td>" . $user->_when_added . "</td>");
                    echo '</tr>';
                    $count++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
