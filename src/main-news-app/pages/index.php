<?php $page_id = "news" ?>
<?php include "common/header.php" ?>
<?php
// Fetch user input for Event
// --------------------------------
function httpGet($key) { return (isset($_GET[$key])) ? $_GET[$key] : ""; } 
function validateInputWithConfig($name, $arr) { $found = false; foreach ($arr as $k=>$v) { if ($name === $k) $found = true; } return ($found) ? $name : ""; }

$event = validateInputWithConfig(httpGet("event"), $config->events);
// --------------------------------
?>
<?php
// Print config for JS code
// --------------------------------
echo "<script> \r\n";
echo "window.config = window.config || {}; \r\n";
echo "config.events = " . json_encode($config->events) . "; \r\n";
echo "</script> \r\n";
// --------------------------------
?>
<main class="list-page">
  <?php if ($config->mainApp->homeDescription && strlen(trim($config->mainApp->homeDescription)) > 0) { ?>
  <div class="description-panel"><?= $config->mainApp->homeDescription ?></div>
  <?php } ?>
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
      <div class="group">
        <span>Language:</span>
        <select id="filter-lang"></select>
      </div>
    </div>
    <!-- /Event selection -->
    <div class="row">
      <span>Showing Facebook news posts from the last</span>
      <select id="filter-time">
        <option value="1">1 hour</option>
        <option value="2">2 hours</option>
        <option value="3">3 hours</option>
        <option value="6">6 hours</option>
        <option value="9">9 hours</option>
        <option value="12">12 hours</option>
        <option value="24">1 day</option>
        <option value="48">2 days</option>
        <option value="72">3 days</option>
        <option value="168">1 week</option>
        <option value="720">1 month</option>
      </select>
    </div>
    <div class="row">
      <span>optionally filtered by</span>
      <input id="filter-message" type="text" value="" placeholder="content">
      <input id="filter-publisher" type="text" value="" placeholder="publisher">
      <button id="filter-button">&raquo;</button>
    </div>
  </div>
  
  <?php include "common/sort-panel.php" ?>
  
  <ul id="list" class="list">
    <!-- 
    Example Item
    <li class="item">
      <div class="left">
        <a href="photo" 
          href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
          target="_blank"
          rel="noopener noreferrer"
        >
          <img src="https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6">
        </a>
        <div class="links">
          <a
            class="link-facebook"
            title="View Facebook post"
            href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
            target="_blank"
            rel="noopener noreferrer"
          >
            <img src="assets/logo-facebook.png">
          </a>
          <a
            class="link-website"
            title="View original article"
            href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
            target="_blank"
            rel="noopener noreferrer"
          >
            🌐
          </a>
        </div>
      </div>
      <div class="right">
        <div class="header">
          <span class="publisher">100percentfedup</span>
          <span class="time">1 hour ago</span>
        </div>
        <div class="message">
          After 100 years; the BOY Scouts are changing their name to remove the word “Boy;” so as not to offend... girls 🤦‍♂️🤦‍♂️🤦‍♂️  Tell the Boy Scouts how completely stupid their politically correct pandering is!  972-580-2000 or MyScouting@scouting.org
        </div>
        <div class="reactions">
          <span class="reaction">
            <span class="key">Shares</span>
            <span class="value">348</span>
          </span>
          <span class="reaction">
            <span class="key">Comments</span>
            <span class="value">108</span>
          </span>
          <span class="reaction">
            <span class="key">👍</span>
            <span class="value">180</span>
          </span>
          <span class="reaction">
            <span class="key">😄</span>
            <span class="value">4</span>
          </span>
          <span class="reaction">
            <span class="key">😲</span>
            <span class="value">8</span>
          </span>
          <span class="reaction">
            <span class="key">😟</span>
            <span class="value">88</span>
          </span>
          <span class="reaction">
            <span class="key">😡</span>
            <span class="value">176</span>
          </span>
        </div>
      </div>
    </li>
    <!-- -->
  </ul>
</main>
<script>
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
  window.app.initialListSettings = {
    most_engaging: 'yes'
  };
</script>
<?php include "common/footer.php" ?>