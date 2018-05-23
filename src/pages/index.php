<?php include "common/header.php" ?>
<main class="home-page">
  <div class="filter-panel">
    <span>Showing Facebook news posts from the last</span>
    <select id="filter">
      <option value="3">3 hours</option>
      <option value="6">6 hours</option>
      <option value="9">9 hours</option>
      <option value="12">12 hours</option>
      <option value="24">1 day</option>
    </select>
  </div>
  
  <div class="sort-panel">
    <span>Most</span>
    <a id="sort_comments" href="#">comments</a>
    <a id="sort_shares" href="#">shares</a>
    <a id="sort_likes" href="#">👍</a>
    <a id="sort_loves" href="#">❤️</a>
    <a id="sort_hahas" href="#">😄</a>
    <a id="sort_wows" href="#">😲</a>
    <a id="sort_sads" href="#">😐</a>
    <a id="sort_angrys" href="#">😡</a>
  </div>  
  
  <ul id="list" class="list">
    <li class="item">Item 1</li>
    <li class="item">Item 2</li>
    <li class="item">Item 3</li>
    <li class="item">Item 4</li>
    <li class="item">Item 5</li>
    <li class="item">Item 6</li>
    <li class="item">Item 7</li>
    <li class="item">Item 8</li>
    <li class="item">Item 9</li>
    <li class="item">Item 10</li>
    <li class="item">Item 11</li>
    <li class="item">Item 12</li>
    <li class="item">Item 13</li>
    <li class="item">Item 14</li>
    <li class="item">Item 15</li>
    <li class="item">Item 16</li>
  </ul>
</main>
<script>
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
</script>
<?php include "common/footer.php" ?>