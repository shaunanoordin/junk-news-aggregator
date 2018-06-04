<?php
/*
Utility Library
---------------

--------------------------------------------------------------------------------
 */

/*  Gets the variable from the query string.
 */
function varGet($key) {
  if (array_key_exists($key, $_GET)) {
    return $_GET[$key];
  } else {
    return false;
  }
}

/*  Same as "echo json_encode()", but handles non-standard encoding characters
    that would otherwise crash json_encode().
 */
function safely_print_json($json) {
  //First, try it the standard way.
  //EDIT: Nah, let's make this consistent.
  /*$jsonOutput = json_encode($json);
  if ($jsonOutput) {
    echo $jsonOutput;
    return;
  }*/
  
  safely_print_json_aux($json, 0);
}

/*  Recursive function that prints every single object or array in a JSON
    structure.
 */
function safely_print_json_aux($item, $depth) {
  if (is_object($item) || $depth === 0) {
    echo (str_repeat(" ", $depth*2) . "{ \r\n");
    
    $count = 0;
    foreach ($item as $key => $val) {
      if ($count !== 0) { echo (str_repeat(" ", $depth*2+2) . ", \r\n"); }
      $count++;
      
      echo (str_repeat(" ", $depth*2+2) . "\"" . $key . "\": ");
      
      if (is_object($val) || is_array($val)) {
        safely_print_json_aux($val, $depth+1);
      } else if (is_null($val)) {
        echo "null \r\n";
      } else {
        echo "\"" . str_replace('"', '\\"', strval($val)) . "\"". "\r\n";
      }
    }
    
    echo (str_repeat(" ", $depth*2) . "} \r\n");
  } else if (is_array($item)) {
    echo ("[ \r\n");
    
    $count = 0;
    foreach ($item as $key => $val) {
      if ($count !== 0) { echo (str_repeat(" ", $depth*2+2) . ", \r\n"); }
      $count++;
      
      safely_print_json_aux($val, $depth+1);
    }
    
    echo (str_repeat(" ", $depth*2) . "] \r\n");
  }
}
?>