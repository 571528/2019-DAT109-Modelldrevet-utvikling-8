-- PLEASE DO NOT EDIT THIS CODE
-- This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!



CREATE TABLE IF NOT EXISTS `expo`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/
  
  /*EXPO State Machines*/
  status ENUM('login', 'view_stands', 'result', 'view_stand', 'vote', 'edit_stand', 'edit_stands', 'logout'),
  PRIMARY KEY(status)

);


