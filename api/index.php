<?php
/*
News Aggregator API
------------------------

Interface for getting news data from the News database.

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
  die("Connection Error: " . $sql_connection->connect_error);
}

if (!$sql_connection->select_db($db_database)) {
  http_response_code (500);
  die("Database Selection Error");
}

//Get any query variables.
$input_debug = varGet("debug");
$input_message = trim(varGet("message"));
$input_publisher = trim(varGet("publisher"));
$input_limit = varGet("limit");
$input_hours_ago = varGet("hours_ago");
$input_order = varGet("order");

//Construct the SQL query: WHERE
$sql_where = " WHERE (newsType = 'JUNK') AND (message IS NOT null) AND (message LIKE ?) AND (publisher_name LIKE ?) ";
if ($input_hours_ago !== "" && intval($input_hours_ago) > 0) {
  $sql_where = $sql_where . " AND (TIMESTAMPDIFF(HOUR, created_time, NOW()) <= " . intval($input_hours_ago) . ") "; 
}

//Construct the SQL query: ORDER
$sql_order = " ORDER BY created_time DESC ";
switch ($input_order) {
  case "newest":
    $sql_order = " ORDER BY created_time DESC ";
    break;
  case "oldest":
    $sql_order = " ORDER BY created_time ASC ";
    break;
  case "shares":
    $sql_order = " ORDER BY shares DESC ";
    break;
  case "comments":
    $sql_order = " ORDER BY comments DESC ";
    break;
  case "likes":
    $sql_order = " ORDER BY likes DESC ";
    break;
  case "LOVEs":
    $sql_order = " ORDER BY LOVEs DESC ";
    break;
  case "HAHAs":
    $sql_order = " ORDER BY HAHAs DESC ";
    break;
  case "WOWs":
    $sql_order = " ORDER BY WOWs DESC ";
    break;
  case "SADs":
    $sql_order = " ORDER BY SADs DESC ";
    break;
  case "ANGRYs":
    $sql_order = " ORDER BY ANGRYs DESC ";
    break;
  case "engagement":
    $sql_order = " ORDER BY totalEngs DESC ";
    break;
}

//Construct the SQL query: LIMIT
$sql_limit = " LIMIT 100 ";
if ($input_limit !== "" && intval($input_limit)) {
  $sql_limit = " LIMIT " . intval($input_limit) . " ";
}

//Construct the SQL query
$sql_query = "SELECT * FROM " . $db_table . $sql_where . $sql_order . $sql_limit;

//Prepare the output JSON.
$json = [
  "data" => []
];

//Send the query and fetch the results.
$search_message = ($input_message) ? "%".$input_message."%" : "%";
$search_publisher = ($input_publisher) ? "%".$input_publisher."%" : "%";
$sql_prepared_statement = $sql_connection->prepare($sql_query);
$sql_prepared_statement->bind_param("ss", $search_message, $search_publisher);
$sql_prepared_statement->execute();
$sql_results = $sql_prepared_statement->get_result();

while ($row = $sql_results->fetch_assoc()) {
  $item = (object) [
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
    "totalEngs" => $row["totalEngs"],
    //"newsType" => $row["newsType"],  //Do not show news type.
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