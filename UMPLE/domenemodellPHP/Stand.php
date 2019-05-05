<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/

class Stand
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Stand Attributes
  private $id;
  private $navn;

  //Stand Associations
  private $admin;
  private $standAdmin;
  private $result;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aId = null, $aNavn = null, $aAdmin = null, $aStandAdmin = null, $aResult = null)
  {
    if (func_num_args() == 0) { return; }

    $this->id = $aId;
    $this->navn = $aNavn;
    $didAddAdmin = $this->setAdmin($aAdmin);
    if (!$didAddAdmin)
    {
      throw new Exception("Unable to create stand due to admin");
    }
    if ($aStandAdmin == null || $aStandAdmin->getStand() != null)
    {
      throw new Exception("Unable to create Stand due to aStandAdmin");
    }
    $this->standAdmin = $aStandAdmin;
    $didAddResult = $this->setResult($aResult);
    if (!$didAddResult)
    {
      throw new Exception("Unable to create stand due to result");
    }
  }
  public static function newInstance($aId, $aNavn, $aAdmin, $aUsernameForStandAdmin, $aPasswordForStandAdmin, $aStandIdForStandAdmin, $aResult)
  {
    $thisInstance = new Stand();
    $thisInstance->id = $aId;
    $thisInstance->navn = $aNavn;$this->admins = array();
    $this->admins[] = $aAdmin;
    $thisInstance->standAdmin = new StandAdmin($aUsernameForStandAdmin, $aPasswordForStandAdmin, $aStandIdForStandAdmin, $thisInstance);$this->results = array();
    $this->results[] = $aResult;
    return $thisInstance;
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setId($aId)
  {
    $wasSet = false;
    $this->id = $aId;
    $wasSet = true;
    return $wasSet;
  }

  public function setNavn($aNavn)
  {
    $wasSet = false;
    $this->navn = $aNavn;
    $wasSet = true;
    return $wasSet;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getNavn()
  {
    return $this->navn;
  }

  public function getAdmin()
  {
    return $this->admin;
  }

  public function getStandAdmin()
  {
    return $this->standAdmin;
  }

  public function getResult()
  {
    return $this->result;
  }

  public function setAdmin($aAdmin)
  {
    $wasSet = false;
    if ($aAdmin == null)
    {
      return $wasSet;
    }
    
    $existingAdmin = $this->admin;
    $this->admin = $aAdmin;
    if ($existingAdmin != null && $existingAdmin != $aAdmin)
    {
      $existingAdmin->removeStand($this);
    }
    $this->admin->addStand($this);
    $wasSet = true;
    return $wasSet;
  }

  public function setResult($aResult)
  {
    $wasSet = false;
    if ($aResult == null)
    {
      return $wasSet;
    }
    
    $existingResult = $this->result;
    $this->result = $aResult;
    if ($existingResult != null && $existingResult != $aResult)
    {
      $existingResult->removeStand($this);
    }
    $this->result->addStand($this);
    $wasSet = true;
    return $wasSet;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $placeholderAdmin = $this->admin;
    $this->admin = null;
    $placeholderAdmin->removeStand($this);
    $existingStandAdmin = $this->standAdmin;
    $this->standAdmin = null;
    if ($existingStandAdmin != null)
    {
      $existingStandAdmin->delete();
    }
    $placeholderResult = $this->result;
    $this->result = null;
    $placeholderResult->removeStand($this);
  }

}
?>