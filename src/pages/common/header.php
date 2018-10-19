<?php
//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
$config = @file_get_contents('../files/app-config.json');  //Use @ to suppress errors.

//Note that the config file should be relative to the file that requires this
//header, not relative to the header file. i.e.
//  app/
//    index.php
//    common/header.php
//  files/app-config.json

//If the config could not be found, try another place.
//On localhost, the file is relative to the home directory, where there router.php file is.
if (!$config) { $config = @file_get_contents('files/app-config.json'); }

//Apologies, but the config here is very messy and added in as a patch
//post-development once the server was set up and appeared much different than
//planned.

//Process config
if (!$config) {
  die();
}
$config = json_decode($config);

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $config->mainApp->title ?></title>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="./main.css" rel="stylesheet">
<script src="./main.js"></script>
</head>
<body>
<div id="app">
<header>
  <div class="header">
    <?= $config->mainApp->header ?>
  </div>
  <nav>
    <ul>
      <li><a href="./">Home</a></li>
      <li><a href="archive.php">Archive</a></li>
    </ul>
  </nav>
</header>
