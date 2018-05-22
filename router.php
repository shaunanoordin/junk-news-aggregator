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

if (preg_match("/\.(?:html|txt|js|ico|css|png|jpg|jpeg|gif)$/i", $_SERVER["REQUEST_URI"])) {
  return false;  //Serve the requested resource as a standard file.
} else {
  include_once $fileURI;  //Serve the file as a PHP resource.
}

//TODO: handle 404s.
//TODO: use index.php as the default file.
?>