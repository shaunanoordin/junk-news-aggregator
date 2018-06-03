<?php
/*
Junk News Aggregator API
------------------------

Interface for getting news data from the Junk News database.

--------------------------------------------------------------------------------
 */

//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
require("./config.php")

//Create connection
$sql_connection = new mysqli($db_server, $db_username, $db_password);

//If there's an error connecting, return a 500.
if ($sql_connection->connect_error) {
  http_response_code (500);
  die("Connection Error: " . $conn->connect_error);
}

if (!$sql_connection->select_db($db_database)) {
  http_response_code (500);
  die("Database Selection Error");
}

//Construct the SQL query.
$sql_query = "SELECT * FROM " . $db_table . " LIMIT 100";

//Prepare the output JSON.
$json = [
  "data" => []
];

//Send the query and fetch the results.
$sql_results = $sql_connection->query($sql_query);
while ($row = $sql_results->fetch_assoc()) {
  $item = (object) [
    //"publisher" => ...,
    "publisher_ID" => $row["publisher_ID"],
    "publisher_name" => $row["publisher_name"],
    "publisher_website" => $row["publisher_website"],
    "post_ID" => $row["post_ID"],
    "link" => $row["link"],
    "message" => $row["message"],
    "picture" => $row["picture"],
    "full_picture" => $row["full_picture"],
    "created_time" => $row["created_time"],
    "shares" => $row["shares"],
    "comments" => $row["comments"],
    "likes" => $row["likes"],
    "LOVEs" => $row["LOVEs"],
    "HAHAs" => $row["HAHAs"],
    "WOWs" => $row["WOWs"],
    "SADs" => $row["SADs"],
    "ANGRYs" => $row["ANGRYs"],
  ];
  
  array_push($json["data"], $item);
}

//Cleanup.
$sql_connection->close();

//Deliver content.
header('Access-Control-Allow-Origin: *');  //WARNING: this opens the API to requests from any domain.
header('Content-Type: application/json');
echo json_encode($json);
?>