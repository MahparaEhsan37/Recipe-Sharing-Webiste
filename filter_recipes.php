<?php
include('connection.php');

$type = isset($_POST['type']) ? $_POST['type'] : 'all';

// Decide the query based on the type
if ($type == 'all') {
    $query = "SELECT * FROM add_recipe";
} else {
    $query = "SELECT * FROM add_recipe WHERE type='$type'";
}

$query_run = mysqli_query($con, $query);
$result_array = [];

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }
    header('Content-Type: application/json');
    echo json_encode($result_array);
} else {
    echo json_encode(["message" => "No record found"]);
}
?>
