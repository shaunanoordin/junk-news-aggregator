<?php
/*
Utility Library
---------------

--------------------------------------------------------------------------------
 */

function varGet($key) {
  if (array_key_exists($key, $_GET)) {
    return $_GET[$key];
  } else {
    return false;
  }
}

?>