<?php

abstract class Personnage {
  
  protected $pointDeVie;
  protected $degatPhysique;
  protected $degatMagique;
  protected $protectionPhysique;
  protected $protectionMagique;
  

  public function __construct()
  {
    $this->setPointDeVie(10);
    $this->setDegatPhysique(0);
    $this->setDegatMagique(0);
    $this->setProtectionPhysique(0);
    $this->setProtectionMagique(0);
  }


  /**
   * Get the value of pointDeVie
   */ 
  public function getPointDeVie()
  {
    return $this->pointDeVie;
  }

  /**
   * Set the value of pointDeVie
   *
   * @return  self
   */ 
  public function setPointDeVie($pointDeVie)
  {
    $this->pointDeVie = $pointDeVie;

    return $this;
  }

  /**
   * Get the value of degatPhysique
   */ 
  public function getDegatPhysique()
  {
    return $this->degatPhysique;
  }

  /**
   * Set the value of degatPhysique
   *
   * @return  self
   */ 
  public function setDegatPhysique($degatPhysique)
  {
    $this->degatPhysique = $degatPhysique;

    return $this;
  }

  /**
   * Get the value of degatMagique
   */ 
  public function getDegatMagique()
  {
    return $this->degatMagique;
  }

  /**
   * Set the value of degatMagique
   *
   * @return  self
   */ 
  public function setDegatMagique($degatMagique)
  {
    $this->degatMagique = $degatMagique;

    return $this;
  }

  /**
   * Get the value of protectionPhysique
   */ 
  public function getProtectionPhysique()
  {
    return $this->protectionPhysique;
  }

  /**
   * Set the value of protectionPhysique
   *
   * @return  self
   */ 
  public function setProtectionPhysique($protectionPhysique)
  {
    $this->protectionPhysique = $protectionPhysique;

    return $this;
  }

  /**
   * Get the value of protectionMagique
   */ 
  public function getProtectionMagique()
  {
    return $this->protectionMagique;
  }

  /**
   * Set the value of protectionMagique
   *
   * @return  self
   */ 
  public function setProtectionMagique($protectionMagique)
  {
    $this->protectionMagique = $protectionMagique;

    return $this;
  }
}