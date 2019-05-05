<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/

class EXPO
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //EXPO State Machines
  private static $StatusLogin = 1;
  private static $StatusViewStands = 2;
  private static $StatusResult = 3;
  private static $StatusViewStand = 4;
  private static $StatusVote = 5;
  private static $StatusEditStand = 6;
  private static $StatusEditStands = 7;
  private static $StatusLogout = 8;
  private $status;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct()
  {
    $this->setStatus(self::$StatusLogin);
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function getStatusFullName()
  {
    $answer = $this->getStatus();
    return $answer;
  }

  public function getStatus()
  {
    if ($this->status == self::$StatusLogin) { return "StatusLogin"; }
    elseif ($this->status == self::$StatusViewStands) { return "StatusViewStands"; }
    elseif ($this->status == self::$StatusResult) { return "StatusResult"; }
    elseif ($this->status == self::$StatusViewStand) { return "StatusViewStand"; }
    elseif ($this->status == self::$StatusVote) { return "StatusVote"; }
    elseif ($this->status == self::$StatusEditStand) { return "StatusEditStand"; }
    elseif ($this->status == self::$StatusEditStands) { return "StatusEditStands"; }
    elseif ($this->status == self::$StatusLogout) { return "StatusLogout"; }
    return null;
  }

  public function Admin()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusLogin)
    {
      $this->setStatus(self::$StatusViewStands);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function StandAdmin()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusLogin)
    {
      $this->setStatus(self::$StatusViewStand);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function Voter()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusLogin)
    {
      $this->setStatus(self::$StatusVote);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function viewResult()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusViewStands)
    {
      $this->setStatus(self::$StatusResult);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function deleteOrEdit()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusViewStands)
    {
      $this->setStatus(self::$StatusEditStands);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function finish()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusResult)
    {
      $this->setStatus(self::$StatusLogout);
      $wasEventProcessed = true;
    }
    elseif ($aStatus == self::$StatusVote)
    {
      $this->setStatus(self::$StatusLogout);
      $wasEventProcessed = true;
    }
    elseif ($aStatus == self::$StatusEditStand)
    {
      $this->setStatus(self::$StatusLogout);
      $wasEventProcessed = true;
    }
    elseif ($aStatus == self::$StatusEditStands)
    {
      $this->setStatus(self::$StatusLogout);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function goBack()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusResult)
    {
      $this->setStatus(self::$StatusViewStands);
      $wasEventProcessed = true;
    }
    elseif ($aStatus == self::$StatusEditStand)
    {
      $this->setStatus(self::$StatusViewStand);
      $wasEventProcessed = true;
    }
    elseif ($aStatus == self::$StatusEditStands)
    {
      $this->setStatus(self::$StatusViewStands);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  public function edit()
  {
    $wasEventProcessed = false;
    
    $aStatus = $this->status;
    if ($aStatus == self::$StatusViewStand)
    {
      $this->setStatus(self::$StatusEditStand);
      $wasEventProcessed = true;
    }
    return $wasEventProcessed;
  }

  private function setStatus($aStatus)
  {
    $this->status = $aStatus;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {}

}
?>