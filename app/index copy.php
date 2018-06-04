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
    <a class="sort-button" id="sort_comments" data-sort="comments" href="#">comments</a>
    <a class="sort-button" id="sort_shares" data-sort="shares" href="#">shares</a>
    <a class="sort-button" id="sort_likes" data-sort="likes" href="#">👍</a>
    <a class="sort-button" id="sort_loves" data-sort="LOVEs" href="#">❤️</a>
    <a class="sort-button" id="sort_hahas" data-sort="HAHAs" href="#">😄</a>
    <a class="sort-button" id="sort_wows" data-sort="WOWs" href="#">😲</a>
    <a class="sort-button" id="sort_sads" data-sort="SADs" href="#">😟</a>
    <a class="sort-button" id="sort_angrys" data-sort="ANGRYs" href="#">😡</a>
  </div>
  
  <ul id="list" class="list">
    <!--
    Example Item
    <li class="item">
      <a
        class="image"
        href="https://www.facebook.com/100PercentFEDUp/photos/a.330374477016724.83603.311190048935167/1703680866352738/?type=3"
        target="_blank"
      >
        <img src="https://scontent.xx.fbcdn.net/v/t1.0-0/p130x130/31823834_1703680869686071_5510796134324371456_n.jpg?_nc_cat=0&oh=81acd9fe53f698974d7b4633df7805b2&oe=5B522AC6">
      </a>
      <div class="content">
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
    -->
  </ul>
</main>
<script>
  window.app.currentPageType = window.app.PAGE_TYPES.LIST;
</script>
<?php include "common/footer.php" ?>