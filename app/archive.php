<?php include "common/header.php" ?>
<main class="home-page">
  <div class="filter-panel">
    <span>Showing Facebook news posts from the last</span>
    <select id="filter">
      <option value="24">1 day</option>
      <option value="48">2 days</option>
      <option value="72">3 days</option>
      <option value="168">1 week</option>
      <option value="720">1 month</option>
      <option value="8760">1 year</option>
      <option value="87600">10 years</option>
    </select>
  </div>
  
  <div class="sort-panel">
    <label>Sort by:</label>
    <span>
      <a class="sort-button" id="sort_comments" data-sort="comments" href="#" title="comments">💬</a>
      <a class="sort-button" id="sort_shares" data-sort="shares" href="#" title="shares">🔃</a>
      <a class="sort-button" id="sort_likes" data-sort="likes" href="#" title="likes">👍</a>
      <a class="sort-button" id="sort_loves" data-sort="LOVEs" href="#" title="LOVEs">❤️</a>
      <a class="sort-button" id="sort_hahas" data-sort="HAHAs" href="#" title="HAHAs">😄</a>
      <a class="sort-button" id="sort_wows" data-sort="WOWs" href="#" title="WOWs">😲</a>
      <a class="sort-button" id="sort_sads" data-sort="SADs" href="#" title="SADs">😟</a>
      <a class="sort-button" id="sort_angrys" data-sort="ANGRYs" href="#" title="ANGRYs">😡</a>
      <a class="sort-button" id="sort_comments" data-sort="oldest" href="#" title="Oldest">Oldest</a>
      <a class="sort-button" id="sort_shares" data-sort="newest" href="#" title="Newest">Newest</a>
    </span>
  </div>
  
  <ul id="list" class="list"></ul>
</main>
<script>
  //window.app.API_URL = "../api/test.php";  //DEBUG: Override to test with hardcoded data
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
</script>
<?php include "common/footer.php" ?>