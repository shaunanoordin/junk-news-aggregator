<?php
/*
Junk News Aggregator API
------------------------

Interface for getting news data from the Junk News database.

--------------------------------------------------------------------------------
 */

require("utility.php");

//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
require("config.php");

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

//Get any query variables.
$input_debug = varGet("debug");
$input_limit = varGet("limit");
$input_hours_ago = varGet("hours_ago");

//Construct the SQL query.
$sql_where = " WHERE (message IS NOT null) ";
if ($input_hours_ago !== "" && intval($input_hours_ago)) {
  $sql_where = $sql_where . " AND (TIMESTAMPDIFF(HOUR, created_time, NOW()) <= " . intval($input_hours_ago) . ") "; 
}

$sql_order = " ORDER BY created_time DESC ";
$sql_limit = " LIMIT 200 ";
if ($input_limit !== "" && intval($input_limit)) {
  $sql_limit = " LIMIT " . intval($input_limit) . " ";
}
$sql_query = "SELECT * FROM " . $db_table . $sql_where . $sql_order . $sql_limit;

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

if ($input_debug === "1") {
  var_dump($json);
} else if ($input_debug === "2") {
  echo(mb_internal_encoding());
} else {
  header('Content-Type: application/json');
  safely_print_json($json);
}
?>