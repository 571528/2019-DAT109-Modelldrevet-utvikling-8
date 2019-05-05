<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/

class Vote
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Vote Attributes
  private $userId;
  private $standId;
  private $score;

  //Vote Associations
  private $result;
  private $user;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aUserId, $aStandId, $aScore, $aResult, $aUser)
  {
    $this->userId = $aUserId;
    $this->standId = $aStandId;
    $this->score = $aScore;
    $didAddResult = $this->setResult($aResult);
    if (!$didAddResult)
    {
      throw new Exception("Unable to create vote due to result");
    }
    $didAddUser = $this->setUser($aUser);
    if (!$didAddUser)
    {
      throw new Exception("Unable to create vote due to user");
    }
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setUserId($aUserId)
  {
    $wasSet = false;
    $this->userId = $aUserId;
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

  public function setScore($aScore)
  {
    $wasSet = false;
    $this->score = $aScore;
    $wasSet = true;
    return $wasSet;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function getStandId()
  {
    return $this->standId;
  }

  public function getScore()
  {
    return $this->score;
  }

  public function getResult()
  {
    return $this->result;
  }

  public function getUser()
  {
    return $this->user;
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
      $existingResult->removeVote($this);
    }
    $this->result->addVote($this);
    $wasSet = true;
    return $wasSet;
  }

  public function setUser($aUser)
  {
    $wasSet = false;
    if ($aUser == null)
    {
      return $wasSet;
    }
    
    $existingUser = $this->user;
    $this->user = $aUser;
    if ($existingUser != null && $existingUser != $aUser)
    {
      $existingUser->removeVote($this);
    }
    $this->user->addVote($this);
    $wasSet = true;
    return $wasSet;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $placeholderResult = $this->result;
    $this->result = null;
    $placeholderResult->removeVote($this);
    $placeholderUser = $this->user;
    $this->user = null;
    $placeholderUser->removeVote($this);
  }

}
?>