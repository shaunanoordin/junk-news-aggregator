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
  
  <div class="sort-panel">
    <div class="row">
      <label>Sort by total reaction numbers:</label>
      <span>
        <a class="sort-button" data-sort="oldest" href="#" title="Oldest">Oldest</a>
        <a class="sort-button" data-sort="newest" href="#" title="Newest">Newest</a>
        <a class="sort-button" data-sort="comments" href="#" title="comments">💬</a>
        <a class="sort-button" data-sort="shares" href="#" title="shares">🔃</a>
        <a class="sort-button" data-sort="likes" href="#" title="likes">👍</a>
        <a class="sort-button" data-sort="LOVEs" href="#" title="LOVEs">❤️</a>
        <a class="sort-button" data-sort="HAHAs" href="#" title="HAHAs">😄</a>
        <a class="sort-button" data-sort="WOWs" href="#" title="WOWs">😲</a>
        <a class="sort-button" data-sort="SADs" href="#" title="SADs">😟</a>
        <a class="sort-button" data-sort="ANGRYs" href="#" title="ANGRYs">😡</a>
        <a class="sort-button" data-sort="engagement" href="#" title="Total Engagement">All</a>
      </span>
    </div>
    <div class="row">
      <label>Sort by age-adjusted reaction numbers:</label>
      <span>
        <a class="sort-button" data-sort="w_comments" href="#" title="comments (weighted)">💬</a>
        <a class="sort-button" data-sort="w_shares" href="#" title="shares (weighted)">🔃</a>
        <a class="sort-button" data-sort="w_likes" href="#" title="likes (weighted)">👍</a>
        <a class="sort-button" data-sort="w_LOVEs" href="#" title="LOVEs (weighted)">❤️</a>
        <a class="sort-button" data-sort="w_HAHAs" href="#" title="HAHAs (weighted)">😄</a>
        <a class="sort-button" data-sort="w_WOWs" href="#" title="WOWs (weighted)">😲</a>
        <a class="sort-button" data-sort="w_SADs" href="#" title="SADs (weighted)">😟</a>
        <a class="sort-button" data-sort="w_ANGRYs" href="#" title="ANGRYs (weighted)">😡</a>
        <a class="sort-button" data-sort="w_engagement" href="#" title="Total Engagement">All</a>
      </span>
    </div>
  </div>
  
  <ul id="list" class="list"></ul>
</main>
<script>
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
  window.app.initialListSettings = {
    most_engaging: 'yes'
  };
</script>
<?php include "common/footer.php" ?>