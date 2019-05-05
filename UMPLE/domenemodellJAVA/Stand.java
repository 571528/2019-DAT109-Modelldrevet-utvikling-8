/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!*/



// line 2 "model.ump"
// line 57 "model.ump"
public class Stand
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Stand Attributes
  private int id;
  private String navn;

  //Stand Associations
  private Admin admin;
  private StandAdmin standAdmin;
  private Result result;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public Stand(int aId, String aNavn, Admin aAdmin, StandAdmin aStandAdmin, Result aResult)
  {
    id = aId;
    navn = aNavn;
    boolean didAddAdmin = setAdmin(aAdmin);
    if (!didAddAdmin)
    {
      throw new RuntimeException("Unable to create stand due to admin");
    }
    if (aStandAdmin == null || aStandAdmin.getStand() != null)
    {
      throw new RuntimeException("Unable to create Stand due to aStandAdmin");
    }
    standAdmin = aStandAdmin;
    boolean didAddResult = setResult(aResult);
    if (!didAddResult)
    {
      throw new RuntimeException("Unable to create stand due to result");
    }
  }

  public Stand(int aId, String aNavn, Admin aAdmin, String aUsernameForStandAdmin, String aPasswordForStandAdmin, int aStandIdForStandAdmin, Result aResult)
  {
    id = aId;
    navn = aNavn;
    boolean didAddAdmin = setAdmin(aAdmin);
    if (!didAddAdmin)
    {
      throw new RuntimeException("Unable to create stand due to admin");
    }
    standAdmin = new StandAdmin(aUsernameForStandAdmin, aPasswordForStandAdmin, aStandIdForStandAdmin, this);
    boolean didAddResult = setResult(aResult);
    if (!didAddResult)
    {
      throw new RuntimeException("Unable to create stand due to result");
    }
  }

  //------------------------
  // INTERFACE
  //------------------------

  public boolean setId(int aId)
  {
    boolean wasSet = false;
    id = aId;
    wasSet = true;
    return wasSet;
  }

  public boolean setNavn(String aNavn)
  {
    boolean wasSet = false;
    navn = aNavn;
    wasSet = true;
    return wasSet;
  }

  public int getId()
  {
    return id;
  }

  public String getNavn()
  {
    return navn;
  }
  /* Code from template association_GetOne */
  public Admin getAdmin()
  {
    return admin;
  }
  /* Code from template association_GetOne */
  public StandAdmin getStandAdmin()
  {
    return standAdmin;
  }
  /* Code from template association_GetOne */
  public Result getResult()
  {
    return result;
  }
  /* Code from template association_SetOneToMany */
  public boolean setAdmin(Admin aAdmin)
  {
    boolean wasSet = false;
    if (aAdmin == null)
    {
      return wasSet;
    }

    Admin existingAdmin = admin;
    admin = aAdmin;
    if (existingAdmin != null && !existingAdmin.equals(aAdmin))
    {
      existingAdmin.removeStand(this);
    }
    admin.addStand(this);
    wasSet = true;
    return wasSet;
  }
  /* Code from template association_SetOneToMany */
  public boolean setResult(Result aResult)
  {
    boolean wasSet = false;
    if (aResult == null)
    {
      return wasSet;
    }

    Result existingResult = result;
    result = aResult;
    if (existingResult != null && !existingResult.equals(aResult))
    {
      existingResult.removeStand(this);
    }
    result.addStand(this);
    wasSet = true;
    return wasSet;
  }

  public void delete()
  {
    Admin placeholderAdmin = admin;
    this.admin = null;
    if(placeholderAdmin != null)
    {
      placeholderAdmin.removeStand(this);
    }
    StandAdmin existingStandAdmin = standAdmin;
    standAdmin = null;
    if (existingStandAdmin != null)
    {
      existingStandAdmin.delete();
    }
    Result placeholderResult = result;
    this.result = null;
    if(placeholderResult != null)
    {
      placeholderResult.removeStand(this);
    }
  }


  public String toString()
  {
    return super.toString() + "["+
            "id" + ":" + getId()+ "," +
            "navn" + ":" + getNavn()+ "]" + System.getProperties().getProperty("line.separator") +
            "  " + "admin = "+(getAdmin()!=null?Integer.toHexString(System.identityHashCode(getAdmin())):"null") + System.getProperties().getProperty("line.separator") +
            "  " + "standAdmin = "+(getStandAdmin()!=null?Integer.toHexString(System.identityHashCode(getStandAdmin())):"null") + System.getProperties().getProperty("line.separator") +
            "  " + "result = "+(getResult()!=null?Integer.toHexString(System.identityHashCode(getResult())):"null");
  }
}