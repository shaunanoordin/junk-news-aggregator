<?php
/*
Top 10
------

Mini app for displaying top 10 stories. Reads from a file and writes to HTML.

--------------------------------------------------------------------------------
 */

//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
$json = file_get_contents('../files/top10.json');

//Process input
if (!$json) {
  die();
}
$json = json_decode($json);

/*
--------------------------------------------------------------------------------
 */

function p($d) {
  echo htmlspecialchars($d);
}

function print_json($json) {
  foreach($json as $id => $item) {
    ?>
<li class="item">
  <div class="left">
    <a 
      href="<?php p($item->link) ?>"
      target="_blank"
      rel="noopener noreferrer"
    >
      <img src="<?php p($item->picture) ?>">
    </a>
    <div class="links">
      <a
        class="link-facebook"
        title="View Facebook post"
        href="<?php p("https://facebook.com/" . $item->post_id) ?>"
        target="_blank"
        rel="noopener noreferrer"
      >
        <img src="./assets/logo-facebook.png">
      </a>
      <a
        class="link-website"
        title="View original article"
        href="<?php p($item->link) ?>"
        target="_blank"
        rel="noopener noreferrer"
      >
        🌐
      </a>
    </div>
  </div>
  <div class="right">
    <div class="header">
      <span class="publisher"><?php p($item->publisher_name) ?></span>
      <span class="time"><?php p($item->created_time) ?></span>
    </div>
    <div class="message">
      <?php p($item->message) ?>
    </div>
    <div class="reactions">
      <div class="row">
        <span class="reaction">
          <span class="key">🔃</span>
          <span class="value"><?php p($item->shares) ?></span>
        </span>
        <span class="reaction">
          <span class="key">💬</span>
          <span class="value"><?php p($item->comments) ?></span>
        </span>
        <span class="reaction">
          <span class="key">👍</span>
          <span class="value"><?php p($item->likes) ?></span>
        </span>
        <span class="reaction">
          <span class="key">❤️</span>
          <span class="value"><?php p($item->LOVEs) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😄</span>
          <span class="value"><?php p($item->HAHAs) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😲</span>
          <span class="value"><?php p($item->WOWs) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😟</span>
          <span class="value"><?php p($item->SADs) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😡</span>
          <span class="value"><?php p($item->ANGRYs) ?></span>
        </span>
        <span class="reaction">
          <span class="key">All</span>
          <span class="value"><?php p($item->totalEngs) ?></span>
        </span>
      </div>
      <div class="row">
        <label>Weighted:</label>
        <span class="reaction">
          <span class="key">🔃</span>
          <span class="value"><?php p($item->w_numSHARES) ?></span>
        </span>
        <span class="reaction">
          <span class="key">💬</span>
          <span class="value"><?php p($item->w_numCOMMENTS) ?></span>
        </span>
        <span class="reaction">
          <span class="key">👍</span>
          <span class="value"><?php p($item->w_numLIKE) ?></span>
        </span>
        <span class="reaction">
          <span class="key">❤️</span>
          <span class="value"><?php p($item->w_numLOVE) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😄</span>
          <span class="value"><?php p($item->w_numHAHA) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😲</span>
          <span class="value"><?php p($item->w_numWOW) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😟</span>
          <span class="value"><?php p($item->w_numSAD) ?></span>
        </span>
        <span class="reaction">
          <span class="key">😡</span>
          <span class="value"><?php p($item->w_numANGRY) ?></span>
        </span>
        <span class="reaction">
          <span class="key">All</span>
          <span class="value"><?php p($item->w_totalEngs) ?></span>
        </span>
      </div>
    </div>
  </div>
</li>

    <?php
  }
  echo "\n";
}

/*
--------------------------------------------------------------------------------
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>News Aggregator</title>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="./main.css" rel="stylesheet">
</head>
<body>
<div id="app" class="top10-app">
<header>
  <a class="title" href="./">
    <h1>
      News Aggregator
    </h1>
  </a>
</header>
<main class="home-page">
  <ul id="list" class="list">
    <?php print_json($json) ?>
  </ul>
</main>
</div><!--/#app-->
</body>
</html>
