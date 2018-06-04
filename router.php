<?php
/*
Router for PHP's Built-In Web Server
------------------------------------

PHP5 has a built-in webserver that allows us to test .PHP files without having
to setup Apache or WAMP or similar. Sweet! This router.php provides the basic
rules necessary for the built-in webserver to recognise which files to serve as
a PHP resource (i.e. pages/scripts to process) and which files to serve as
standard asset resources (e.g. image files)

Usage:
  php -S localhost:3000 router.php

NOTE: in practice, PHP's built-in web server and this router file is ONLY used
in a development environment.

--------------------------------------------------------------------------------
 */

$fileURI = dirname(__FILE__) . $_SERVER["REQUEST_URI"];
$INDEX_FILE_1 = "index.php";
$INDEX_FILE_2 = "index.html";

//Strip off queries, for routing purposes.
$fileURI = preg_replace("/\\?.*/", "", $fileURI);

//If a directory is specified, find the index file.
if (is_dir($fileURI)) {
  if (file_exists($fileURI . "/" . $INDEX_FILE_1)) {
    $fileURI = $fileURI . "/" . $INDEX_FILE_1;
  } else {
    $fileURI = $fileURI . "/" . $INDEX_FILE_2;
  }
}

//If the file doesn't exist, share a 404. 
if (!file_exists($fileURI)) {
  http_response_code(404);
  echo "Resource not found";
  die();

//If the file ends with .php, serve is as a PHP resource.
} else if (preg_match("/\.php$/i", $fileURI)) {  
  include_once $fileURI;

//Otherwise, serve the requested resource as a standard file.
} else {
  return false;  
}
?>