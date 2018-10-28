<?php
/*
Image Grid Home Page
--------------------

Mini app for displaying images from top stories. Combines this with the home
page.

--------------------------------------------------------------------------------
 */

//Development: Enable errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Config
$config = @file_get_contents('./news/files/app-config.json');  //Use @ to suppress errors.
$data = @file_get_contents('./news/files/top256.json');  //Use @ to suppress errors.
$css = @file_get_contents('./news/app/main.css');

//If the config could not be found, try another place.
//On localhost, the file is relative to the home directory, where there router.php file is.
if (!$config) { $config = @file_get_contents('files/app-config.json'); }
if (!$data) { $data = @file_get_contents('files/top256.json'); }
if (!$css) { $css = @file_get_contents('app/main.css'); }

//Apologies, but the config here is very messy and added in as a patch
//post-development once the server was set up and appeared much different than
//planned.

//Process input
if (!$config || !$data) {
  die();
}
$config = json_decode($config);
$data = json_decode($data);

/*
--------------------------------------------------------------------------------
 */

function p($d) {
  echo htmlspecialchars($d);
}

function print_json($data) {
  $i = 1;
  for ($i = 1; $i <= 256; $i++) {
    $item = $data->{$i};
    if (!$item) continue;
    ?>
<li class="item">
  <a
    class="image"
    href="top10.php"
    <?php /* target="_blank" rel="noopener noreferrer" */ ?>
    style="background-image: url(<?php p($item->picture) ?>)"
  >
    &nbsp;
  </a>

  <div class="popup">
    <div class="header">
      <span class="publisher"><?php p($item->publisher_name) ?></span>
      <span class="time"><?php p($item->created_time) ?></span>
    </div>
    <div class="message">
      <?php p($item->message) ?>
    </div>
    <div class="reactions">
      <div class="row">
        <label>Total:</label>
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
        <label>Age-adjusted total:</label>
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
<title><?= $config->imageGridMiniApp->title ?></title>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
<?= $css ?>
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="app" class="imageGrid-app">
<header>
  <div class="header">
    <?= $config->imageGridMiniApp->header ?>
  </div>
  <nav>
    <ul>
      <li class="selected">
        <a href="https://newsaggregator.oii.ox.ac.uk/">Home</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/about.php">About</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/methodology.php">Methodology</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/top10.php">Top 10</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/access.php">Sign Up</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/news/app/">Log In</a>
      </li>
    </ul>
  </nav>
</header>
<main class="splash-page">
  <div class="info-section">
		<h1>WELCOME</h1>
		<p>Welcome to the Junk News Aggregator! We track the distribution of "junk news" on Facebook. Junk news sources deliberately publish misleading, deceptive or incorrect information purporting to be real news about politics, economics or culture. This content includes ideologically extreme, hyper-partisan, or conspiratorial news and information, as well as various forms of propaganda. <a href="methodology.php"> Click here</a> to read more about the science behind our classification system, and our methodology for aggregating junk news shared on Facebook. </p>
		<p> To explore popular junk news posts, visit the <a href="top10.php">Top-10 Junk News Aggregator</a>, or access the full <a href="/news/app">Junk News Aggregator</a> (login credentials required, to request access <a href="singup.php">sign up here</a>, more instructions can be found <a href="about.php#instructions">here</a>). </p>
  </div>
  <ul class="image-grid">
    <?php print_json($data) ?>
  </ul>
</main>
<?php if ($config->imageGridMiniApp->footer && strlen(trim($config->imageGridMiniApp->footer)) > 0) { ?>
<footer><?= $config->imageGridMiniApp->footer ?></footer>
<?php } ?>
</div><!--/#app-->
</body>
</html>
