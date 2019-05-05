/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/



// line 18 "model.ump"
// line 68 "model.ump"
public class StandAdmin
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //StandAdmin Attributes
  private String username;
  private String password;
  private int standId;

  //StandAdmin Associations
  private Stand stand;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public StandAdmin(String aUsername, String aPassword, int aStandId, Stand aStand)
  {
    username = aUsername;
    password = aPassword;
    standId = aStandId;
    if (aStand == null || aStand.getStandAdmin() != null)
    {
      throw new RuntimeException("Unable to create StandAdmin due to aStand");
    }
    stand = aStand;
  }

  public StandAdmin(String aUsername, String aPassword, int aStandId, int aIdForStand, String aNavnForStand, Admin aAdminForStand, Result aResultForStand)
  {
    username = aUsername;
    password = aPassword;
    standId = aStandId;
    stand = new Stand(aIdForStand, aNavnForStand, aAdminForStand, this, aResultForStand);
  }

  //------------------------
  // INTERFACE
  //------------------------

  public boolean setUsername(String aUsername)
  {
    boolean wasSet = false;
    username = aUsername;
    wasSet = true;
    return wasSet;
  }

  public boolean setPassword(String aPassword)
  {
    boolean wasSet = false;
    password = aPassword;
    wasSet = true;
    return wasSet;
  }

  public boolean setStandId(int aStandId)
  {
    boolean wasSet = false;
    standId = aStandId;
    wasSet = true;
    return wasSet;
  }

  public String getUsername()
  {
    return username;
  }

  public String getPassword()
  {
    return password;
  }

  public int getStandId()
  {
    return standId;
  }
  /* Code from template association_GetOne */
  public Stand getStand()
  {
    return stand;
  }

  public void delete()
  {
    Stand existingStand = stand;
    stand = null;
    if (existingStand != null)
    {
      existingStand.delete();
    }
  }


  public String toString()
  {
    return super.toString() + "["+
            "username" + ":" + getUsername()+ "," +
            "password" + ":" + getPassword()+ "," +
            "standId" + ":" + getStandId()+ "]" + System.getProperties().getProperty("line.separator") +
            "  " + "stand = "+(getStand()!=null?Integer.toHexString(System.identityHashCode(getStand())):"null");
  }
}