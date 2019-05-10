<?php
//Config: get the CSS from the main News app.
$css = @file_get_contents('./news/app/main.css');

//Using this main CSS as a baseline, we can add extra styles by using
//./openaccess-main.css

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Junk News Aggregator</title>
<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?= $css ?>
</style>
<link href="./openaccess-main.css" rel="stylesheet">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-7954451-46"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-7954451-46');
</script>

  
<?php $page = $_SERVER['REQUEST_URI']; 
$strpage = substr($page, 1, -4);
if (empty($strpage)){
  $pagetitle = "home";
} else {
  $pagetitle = trim($strpage);
}
?>

<style>
	#app header nav ul.<?php echo $pagetitle; ?> li#<?php echo $pagetitle; ?>{
		border-top: 0.2em solid #fff;
		border-bottom: 0.2em solid #fff;
	}
</style>

</head>
<body>
<div id="app">
<header>
  <div class="header">
    <a class="logo" href="https://comprop.oii.ox.ac.uk/"><img src="https://newsaggregator.oii.ox.ac.uk/assets/ComProp-logo.svg" alt="Comprop"></a>
    <span class="filler mobile-only"></span>
    <a class="logo mobile-only" href="http://www.oii.ox.ac.uk"><img src="https://newsaggregator.oii.ox.ac.uk/assets/OII-textless-logo-blue.svg" alt="OII"></a>
    <a class="logo mobile-only" href="http://www.ox.ac.uk"><img src="https://newsaggregator.oii.ox.ac.uk/assets/ox-brand-RGB.svg" alt="Oxford"></a>
    <a class="title" href="./"><h1>Junk News Aggregator</h1></a>
    <a class="logo desktop-only" href="http://www.oii.ox.ac.uk"><img src="https://newsaggregator.oii.ox.ac.uk/assets/OII-logo-blue.svg" alt="OII"></a>
    <a class="logo desktop-only" href="http://www.ox.ac.uk"><img src="https://newsaggregator.oii.ox.ac.uk/assets/ox-brand-RGB.svg" alt="Oxford"></a>
  </div>
  
  <nav>
    <ul class="<?php echo $pagetitle; ?>">
      <li id="home"><a href="./">Home</a></li>
      <li id="about"><a href="about.php">About</a></li>
      <li id="methodology"><a href="methodology.php">Methodology</a></li>
      <li id="top10"><a href="top10.php">Top 10</a></li>
      <li id="explore"><a href="/news/app">Explore</a></li>
    </ul>
  </nav>
</header>
