<?php

require_once('Personnage.php');

class Archer extends Personnage {

  public function __construct()
  {
    parent::__construct();
    $this->setDegatPhysique(5);
  }

}
