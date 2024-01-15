<?php

require_once('Personnage.php');

class Sorcier extends Personnage {

  public function __construct()
  {
    parent::__construct();
    $this->setDegatMagique(5);
  }

}
