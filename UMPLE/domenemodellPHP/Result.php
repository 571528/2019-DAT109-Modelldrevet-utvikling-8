<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/

class Result
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Result Attributes
  private $standId;
  private $resultScore;

  //Result Associations
  private $stands;
  private $votes;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aStandId, $aResultScore)
  {
    $this->standId = $aStandId;
    $this->resultScore = $aResultScore;
    $this->stands = array();
    $this->votes = array();
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setStandId($aStandId)
  {
    $wasSet = false;
    $this->standId = $aStandId;
    $wasSet = true;
    return $wasSet;
  }

  public function setResultScore($aResultScore)
  {
    $wasSet = false;
    $this->resultScore = $aResultScore;
    $wasSet = true;
    return $wasSet;
  }

  public function getStandId()
  {
    return $this->standId;
  }

  public function getResultScore()
  {
    return $this->resultScore;
  }

  public function getStand_index($index)
  {
    $aStand = $this->stands[$index];
    return $aStand;
  }

  public function getStands()
  {
    $newStands = $this->stands;
    return $newStands;
  }

  public function numberOfStands()
  {
    $number = count($this->stands);
    return $number;
  }

  public function hasStands()
  {
    $has = $this->numberOfStands() > 0;
    return $has;
  }

  public function indexOfStand($aStand)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->stands as $stand)
    {
      if ($stand->equals($aStand))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public function getVote_index($index)
  {
    $aVote = $this->votes[$index];
    return $aVote;
  }

  public function getVotes()
  {
    $newVotes = $this->votes;
    return $newVotes;
  }

  public function numberOfVotes()
  {
    $number = count($this->votes);
    return $number;
  }

  public function hasVotes()
  {
    $has = $this->numberOfVotes() > 0;
    return $has;
  }

  public function indexOfVote($aVote)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->votes as $vote)
    {
      if ($vote->equals($aVote))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public static function minimumNumberOfStands()
  {
    return 0;
  }

  public function addStandVia($aId, $aNavn, $aAdmin, $aStandAdmin)
  {
    return new Stand($aId, $aNavn, $aAdmin, $aStandAdmin, $this);
  }

  public function addStand($aStand)
  {
    $wasAdded = false;
    if ($this->indexOfStand($aStand) !== -1) { return false; }
    $existingResult = $aStand->getResult();
    $isNewResult = $existingResult != null && $this !== $existingResult;
    if ($isNewResult)
    {
      $aStand->setResult($this);
    }
    else
    {
      $this->stands[] = $aStand;
    }
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeStand($aStand)
  {
    $wasRemoved = false;
    //Unable to remove aStand, as it must always have a result
    if ($this !== $aStand->getResult())
    {
      unset($this->stands[$this->indexOfStand($aStand)]);
      $this->stands = array_values($this->stands);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addStandAt($aStand, $index)
  {  
    $wasAdded = false;
    if($this->addStand($aStand))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfStands()) { $index = $this->numberOfStands() - 1; }
      array_splice($this->stands, $this->indexOfStand($aStand), 1);
      array_splice($this->stands, $index, 0, array($aStand));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveStandAt($aStand, $index)
  {
    $wasAdded = false;
    if($this->indexOfStand($aStand) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfStands()) { $index = $this->numberOfStands() - 1; }
      array_splice($this->stands, $this->indexOfStand($aStand), 1);
      array_splice($this->stands, $index, 0, array($aStand));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addStandAt($aStand, $index);
    }
    return $wasAdded;
  }

  public static function minimumNumberOfVotes()
  {
    return 0;
  }

  public function addVoteVia($aUserId, $aStandId, $aScore, $aUser)
  {
    return new Vote($aUserId, $aStandId, $aScore, $this, $aUser);
  }

  public function addVote($aVote)
  {
    $wasAdded = false;
    if ($this->indexOfVote($aVote) !== -1) { return false; }
    $existingResult = $aVote->getResult();
    $isNewResult = $existingResult != null && $this !== $existingResult;
    if ($isNewResult)
    {
      $aVote->setResult($this);
    }
    else
    {
      $this->votes[] = $aVote;
    }
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeVote($aVote)
  {
    $wasRemoved = false;
    //Unable to remove aVote, as it must always have a result
    if ($this !== $aVote->getResult())
    {
      unset($this->votes[$this->indexOfVote($aVote)]);
      $this->votes = array_values($this->votes);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addVoteAt($aVote, $index)
  {  
    $wasAdded = false;
    if($this->addVote($aVote))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfVotes()) { $index = $this->numberOfVotes() - 1; }
      array_splice($this->votes, $this->indexOfVote($aVote), 1);
      array_splice($this->votes, $index, 0, array($aVote));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveVoteAt($aVote, $index)
  {
    $wasAdded = false;
    if($this->indexOfVote($aVote) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfVotes()) { $index = $this->numberOfVotes() - 1; }
      array_splice($this->votes, $this->indexOfVote($aVote), 1);
      array_splice($this->votes, $index, 0, array($aVote));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addVoteAt($aVote, $index);
    }
    return $wasAdded;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    foreach ($this->stands as $aStand)
    {
      $aStand->delete();
    }
    foreach ($this->votes as $aVote)
    {
      $aVote->delete();
    }
  }

}
?>