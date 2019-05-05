/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/



// line 3 "model.ump"
// line 33 "model.ump"
// line 38 "model.ump"
// line 43 "model.ump"
// line 48 "model.ump"
// line 53 "model.ump"
// line 58 "model.ump"
// line 63 "model.ump"
// line 68 "model.ump"
// line 73 "model.ump"
// line 78 "model.ump"
// line 83 "model.ump"
// line 88 "model.ump"
public class EXPO
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //EXPO State Machines
  public enum Status { Login, ViewStands, Result, ViewStand, Vote, EditStand, EditStands, Logout }
  private Status status;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public EXPO()
  {
    setStatus(Status.Login);
  }

  //------------------------
  // INTERFACE
  //------------------------

  public String getStatusFullName()
  {
    String answer = status.toString();
    return answer;
  }

  public Status getStatus()
  {
    return status;
  }

  public boolean Admin()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case Login:
        setStatus(Status.ViewStands);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean StandAdmin()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case Login:
        setStatus(Status.ViewStand);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean Voter()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case Login:
        setStatus(Status.Vote);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean viewResult()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case ViewStands:
        setStatus(Status.Result);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean deleteOrEdit()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case ViewStands:
        setStatus(Status.EditStands);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean finish()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case Result:
        setStatus(Status.Logout);
        wasEventProcessed = true;
        break;
      case Vote:
        setStatus(Status.Logout);
        wasEventProcessed = true;
        break;
      case EditStand:
        setStatus(Status.Logout);
        wasEventProcessed = true;
        break;
      case EditStands:
        setStatus(Status.Logout);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean goBack()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case Result:
        setStatus(Status.ViewStands);
        wasEventProcessed = true;
        break;
      case EditStand:
        setStatus(Status.ViewStand);
        wasEventProcessed = true;
        break;
      case EditStands:
        setStatus(Status.ViewStands);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  public boolean edit()
  {
    boolean wasEventProcessed = false;
    
    Status aStatus = status;
    switch (aStatus)
    {
      case ViewStand:
        setStatus(Status.EditStand);
        wasEventProcessed = true;
        break;
      default:
        // Other states do respond to this event
    }

    return wasEventProcessed;
  }

  private void setStatus(Status aStatus)
  {
    status = aStatus;
  }

  public void delete()
  {}

}