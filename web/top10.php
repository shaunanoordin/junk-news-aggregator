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
$css = @file_get_contents('./news/app/main.css');

//Process input
if (!$config) die();
$config = json_decode($config);

/*
--------------------------------------------------------------------------------
 */

// Fetch user input for Event
function httpGet($key) { return (isset($_GET[$key])) ? $_GET[$key] : ""; } 
function validateInputWithConfig($name, $arr) { $found = false; foreach ($arr as $k=>$v) { if ($name === $k) $found = true; } return ($found) ? $name : ""; }

$event = validateInputWithConfig(httpGet("event"), $config->events);
$eventDetails = ($event !== "") ? $config->events->$event : reset($config->events);  // reset() gets the first item in the array, using it as our default.

// Pull the data file of the appropriate event.
$data = @file_get_contents('./news/files/' . $eventDetails->top10file);  //Use @ to suppress errors.
if (!$data) die();
$data = json_decode($data);

/*
--------------------------------------------------------------------------------
 */

function p($d) {
  echo htmlspecialchars($d);
}

function print_json($data) {
  if (!$data) return;

  $i = 1;
  for ($i = 1; $i <= 10; $i++) {
    if (!isset($data->{$i})) continue;  // Safety for empty/incomplete data files
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
        <a href="https://newsaggregator.oii.ox.ac.uk/news/app/">Explore</a>
      </li>
    </ul>
  </nav>
</header>
<main class="list-page">
  <?php if ($config->top10MiniApp->description && strlen(trim($config->top10MiniApp->description)) > 0) { ?>
  <div class="description-panel"><?= $config->top10MiniApp->description ?></div>
  <div class="filter-panel">
    <!-- Event selection -->
    <div class="major row">
      <div class="group">
        <span>Event:</span>
        <select id="filter-event">
          <?php foreach ($config->events as $eventName => $eventDetails) { ?>
            <option
              value="<?= htmlspecialchars($eventName) ?>"
              <?= ($event === $eventName) ? "selected" : ""?>
            >
              <?= htmlspecialchars($eventDetails->label) ?>
            </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <script>
      document.getElementById('filter-event').onchange = function reloadPageForEvent(e) {
        window.location = window.location.href.replace(/(\?.*)/g, '') + '?event=' + e.target.value
      };
    </script>
    <!-- /Event selection -->
  </div>
  <?php } ?>
  <ul id="list" class="list">
    <?php print_json($data) ?>
  </ul>
</main>
<?php if ($config->top10MiniApp->footer && strlen(trim($config->top10MiniApp->footer)) > 0) { ?>
<footer><?= $config->top10MiniApp->footer ?></footer>
<?php } ?>
<div class="oii-footer">&copy; <a href="http://www.oii.ox.ac.uk/">Oxford Internet Institute</a> 2018 | <a href="http://www.oii.ox.ac.uk/legal/">Terms of Use</a> | <a href="http://www.oii.ox.ac.uk/legal/privacy.cfm">Privacy Policy</a> | <a href="https://www.oii.ox.ac.uk/cookie-statement/">Cookie Statement</a> | <a href="http://www.oii.ox.ac.uk/legal/copyright.cfm">Copyright Policy</a> | <a href="http://www.oii.ox.ac.uk/legal/accessibility.cfm">Accessibility</a></div>
</div><!--/#app-->
</body>
</html>
