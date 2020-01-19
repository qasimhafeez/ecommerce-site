<?php
function display_errors($errors){
  $display = '<ul class="bg-danger">';
  foreach($errors as $error){
    $display .= '<li class="text-danger">'.$error.'</li>';
  }
  $display .= '</ul>';
  return $display;
}

function sanitize($dirty){
  return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

function money($number){
  return '$'.number_format($number,2);
}

function sizesToArray($string){
  $sizesArray = explode(',',$string);
  $returnArray = array();
  foreach($sizesArray as $size){
    $s = explode(':',$size);
    $returnArray[] = array('size' => $s[0], 'quantity' => $s[1],'threshold' => $s[2]);
  }
  return $returnArray;
}

function sizesToString($sizes){
  $sizeString = '';
  foreach($sizes as $size){
    $sizeString .= $size['size'].':'.$size['quantity'].':'.$size['threshold'].',';
  }
  $trimmed = rtrim($sizeString, ',');
  return $trimmed;
}
?>