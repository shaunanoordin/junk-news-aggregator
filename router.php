<?php
$fileURI = dirname(__FILE__) . $_SERVER['REQUEST_URI'];

if (preg_match('/\.(?:html|txt|js|ico|css|png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
  return false;    // serve the requested resource as-is.
} else { 
  include_once $fileURI;
}


/*$indexFiles = ['index.html', 'index.php'];
$routes = [
  '^/api(/.*)?$' => '/index.php'
];

$requestedAbsoluteFile = dirname(__FILE__) . $_SERVER['REQUEST_URI'];

// check if the the request matches one of the defined routes
foreach ($routes as $regex => $fn)
{
  if (preg_match('%'.$regex.'%', $_SERVER['REQUEST_URI']))
  {
    $requestedAbsoluteFile = dirname(__FILE__) . $fn;
    break;
  }
}

// if request is a directory call check if index files exist
if (is_dir($requestedAbsoluteFile))
{
  foreach ($indexFiles as $filename)
  {
    $fn = $requestedAbsoluteFile.'/'.$filename;
    if (is_file($fn))
    {
      $requestedAbsoluteFile = $fn;
      break;
    }
  }
}

// if requested file does not exist or is directory => 404
if (!is_file($requestedAbsoluteFile))
{
  header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
  printf('"%s" does not exist', $_SERVER['REQUEST_URI']);
  return true;
}

// if requested file is'nt a php file
if (!preg_match('/\.php$/', $requestedAbsoluteFile)) {
  header('Content-Type: '.mime_content_type($requestedAbsoluteFile));
  $fh = fopen($requestedAbsoluteFile, 'r');
  fpassthru($fh);
  fclose($fh);
  return true;
}

// if requested file is php, include it
include_once $requestedAbsoluteFile;
*/
?>