<?php

include './DbConnect.php';
$response = array();
$db = new DbConnect();

$market_id = $_POST['market_id'];
$time = $db->getDatetimeNow();
$result = mysqli_query($db->connect(), "select * from prices p left join products pd on(p.product_product_id=pd.product_id) left join categories c on(pd.category_category_id=c.category_id) "
        . "where p.market_market_id='$market_id' && p.time_stamp='" . $time . "'");

$response = array();
$response['status'] = FALSE;

if(!$result){
 echo    mysqli_error($db->connect());
}

if (mysqli_num_rows($result) > 0) {
    $response["data"] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $array['product_name'] = $row['product_name'];
        $array['quantity'] = $row['quantity'] . " " . $row['units'];
        $array['price'] = $row['price'];
        $array['category_name'] = $row['category_name'];
        array_push($response["data"], $array);
    }
} else {
    $response['status'] = TRUE;
    $response['message'] = "No price updates available";
}

echo json_encode($response);
