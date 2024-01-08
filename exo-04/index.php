<?php

function getTime() {
  return date('G:i:s');
}

$time = getTime();

while (true){
  $newTime = getTime();
  if ($time != $newTime){
    $time = $newTime;
    echo $time."\n";
  }
  usleep(0.25);
}
