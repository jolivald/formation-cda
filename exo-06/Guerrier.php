<?php

require_once('Personnage.php');

class Guerrier extends Personnage {

  public function __construct()
  {
    parent::__construct();
    $this->setDegatPhysique(10);
  }

}
