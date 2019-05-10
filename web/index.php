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
    href="https://newsaggregator.oii.ox.ac.uk/news/app/"
    <?php /* target="_blank" rel="noopener noreferrer" */ ?>
    style="background-image: url(<?php p($item->picture) ?>)"
  >
    &nbsp;
  </a>

  <a class="popup" href="https://newsaggregator.oii.ox.ac.uk/news/app/">
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
  </a>
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
        <a href="https://newsaggregator.oii.ox.ac.uk/news/app/">Explore</a>
      </li>
    </ul>
  </nav>
</header>
<main class="splash-page">
  <div class="info-section">
		<h1>WELCOME</h1>
		<p>Welcome to the Junk News Aggregator! We track the distribution of "junk news" on Facebook. Junk news sources deliberately publish misleading, deceptive or incorrect information purporting to be real news about politics, economics or culture. This content includes ideologically extreme, hyper-partisan, or conspiratorial news and information, as well as various forms of propaganda. <a href="methodology.php"> Click here</a> to read more about the science behind our classification system, and our methodology for aggregating junk news shared on Facebook. </p>
 		<p>To explore popular junk news posts, please explore the <a href="#visual_jna">Visual Junk News Aggregator, below</a>, visit the <a href="top10.php">Top-10 Junk News Aggregator</a>, or access the <a href="/news/app">full Junk News Aggregator</a>. More information and instructions can be found on the <a href="about.php#instructions">About</a> page, and methodological details can be found on the <a href="methodology.php"> Methodology</a> page. </p>
		<p> <small> <strong> Warning: </strong> Junk news posts may contain hateful or inappropriate language and graphic images. </small> </p>
		<div id="visual_jna"> <h2>Visual Junk News Aggregator</h2> </div>  
</div>
  <ul class="image-grid">
    <?php print_json($data) ?>
  </ul>
</main>
<?php if ($config->imageGridMiniApp->footer && strlen(trim($config->imageGridMiniApp->footer)) > 0) { ?>
<footer><?= $config->imageGridMiniApp->footer ?></footer>
<?php } ?>
<div class="oii-footer">&copy; <a href="http://www.oii.ox.ac.uk/">Oxford Internet Institute</a> 2018 | <a href="http://www.oii.ox.ac.uk/legal/">Terms of Use</a> | <a href="http://www.oii.ox.ac.uk/legal/privacy.cfm">Privacy Policy</a> | <a href="https://www.oii.ox.ac.uk/cookie-statement/">Cookie Statement</a> | <a href="http://www.oii.ox.ac.uk/legal/copyright.cfm">Copyright Policy</a> | <a href="http://www.oii.ox.ac.uk/legal/accessibility.cfm">Accessibility</a></div>
</div><!--/#app-->
</body>
</html>
