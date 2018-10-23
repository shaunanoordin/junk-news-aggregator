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
$config = @file_get_contents('./news/files/app-config.json');  //Use @ to suppress errors.
$data = @file_get_contents('./news/files/top10.json');  //Use @ to suppress errors.
$css = @file_get_contents('./news/app/main.css');

//If the config could not be found, try another place.
//On localhost, the file is relative to the home directory, where there router.php file is.
if (!$config) { $config = @file_get_contents('files/app-config.json'); }
if (!$data) { $data = @file_get_contents('files/top10.json'); }
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
  for ($i = 1; $i <= 10; $i++) {
    $item = $data->{$i};
    if (!$item) continue;
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
        href="<?php p("https://facebook.com/" . $item->post_ID) ?>"
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
        <!--
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
        -->
        <span class="reaction">
          <span class="key"><!--All-->&nbsp;</span>
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
<title><?= $config->top10MiniApp->title ?></title>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
<?= $css ?>
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="app" class="top10-app">
<header>
  <div class="header">
    <?= $config->top10MiniApp->header ?>
  </div>
  <nav>
    <ul>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/">Home</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/about.php">About</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/methodology.php">Methodology</a>
      </li>
      <li class="selected">
        <a href="https://newsaggregator.oii.ox.ac.uk/top10.php">Top 10</a>
      </li>
      <li>
        <a href="https://newsaggregator.oii.ox.ac.uk/access.php">Access</a>
      </li>
    </ul>
  </nav>
</header>
<main class="home-page">
  <?php if ($config->top10MiniApp->description && strlen(trim($config->top10MiniApp->description)) > 0) { ?>
  <div class="description-panel"><?= $config->top10MiniApp->description ?></div>
  <?php } ?>
  <ul id="list" class="list">
    <?php print_json($data) ?>
  </ul>
</main>
<?php if ($config->top10MiniApp->footer && strlen(trim($config->top10MiniApp->footer)) > 0) { ?>
<footer><?= $config->top10MiniApp->footer ?></footer>
<?php } ?>
</div><!--/#app-->
</body>
</html>
