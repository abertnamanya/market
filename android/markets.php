<?php

include './DbConnect.php';
$response = array();
$db = new DbConnect();

$result = mysqli_query($db->connect(), "select * from markets m left join location l on(m.location_location_id=l.location_id)");
$response = array();
while ($row= mysqli_fetch_assoc($result)) {
    $array['market_id'] = $row['market_id'];
    $array['market_name'] = $row['market_name'];
    $array['location'] = $row['location'];
    array_push($response, $array);
}
echo json_encode($response);
?>
