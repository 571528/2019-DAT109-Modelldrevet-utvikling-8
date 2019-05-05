<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/

class StandAdmin
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //StandAdmin Attributes
  private $username;
  private $password;
  private $standId;

  //StandAdmin Associations
  private $stand;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aUsername = null, $aPassword = null, $aStandId = null, $aStand = null)
  {
    if (func_num_args() == 0) { return; }

    $this->username = $aUsername;
    $this->password = $aPassword;
    $this->standId = $aStandId;
    if ($aStand == null || $aStand->getStandAdmin() != null)
    {
      throw new Exception("Unable to create StandAdmin due to aStand");
    }
    $this->stand = $aStand;
  }
  public static function newInstance($aUsername, $aPassword, $aStandId, $aIdForStand, $aNavnForStand, $aAdminForStand, $aResultForStand)
  {
    $thisInstance = new StandAdmin();
    $thisInstance->username = $aUsername;
    $thisInstance->password = $aPassword;
    $thisInstance->standId = $aStandId;
    $thisInstance->stand = new Stand($aIdForStand, $aNavnForStand, $aAdminForStand, $thisInstance, $aResultForStand);
    return $thisInstance;
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setUsername($aUsername)
  {
    $wasSet = false;
    $this->username = $aUsername;
    $wasSet = true;
    return $wasSet;
  }

  public function setPassword($aPassword)
  {
    $wasSet = false;
    $this->password = $aPassword;
    $wasSet = true;
    return $wasSet;
  }

  public function setStandId($aStandId)
  {
    $wasSet = false;
    $this->standId = $aStandId;
    $wasSet = true;
    return $wasSet;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getStandId()
  {
    return $this->standId;
  }

  public function getStand()
  {
    return $this->stand;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $existingStand = $this->stand;
    $this->stand = null;
    if ($existingStand != null)
    {
      $existingStand->delete();
    }
  }

}
?>