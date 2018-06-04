<?php
/*
Junk News Aggregator API
------------------------

Interface for getting news data from the Junk News database.

--------------------------------------------------------------------------------
 */

require("./utility.php")

//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
require("./config.php")

echo(varGet("time"));
?>