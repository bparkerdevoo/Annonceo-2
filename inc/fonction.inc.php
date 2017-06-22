<?php

function debug($var, $mode = 1){

$trace = debug_backtrace();

echo "<strong>debug demandé dans le fichier " . $trace[0]['file'] . " en ligne : " . $trace[0]['line'] . "</strong>";

if ($mode == 1){
  echo '<pre>'; var_dump($var); echo '</pre>' ;
}
else {
  echo '<pre>'; print_r($var); echo '</pre>' ;
}
}

 ?>
