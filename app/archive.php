<?php include "common/header.php" ?>
<main class="archive-page">
  <?php if ($config->mainApp->archiveDescription && strlen(trim($config->mainApp->archiveDescription)) > 0) { ?>
  <div class="description-panel"><?= $config->mainApp->archiveDescription ?></div>
  <?php } ?>
  <div class="filter-panel">
    <div class="row">
      <span>Showing most engaged Facebook news posts from the last</span>
      <select id="filter-time">
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
  
  <ul id="list" class="list"></ul>
</main>
<script>
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
  window.app.initialListSettings = {
    most_engaging: 'yes'
  };
</script>
<?php include "common/footer.php" ?>