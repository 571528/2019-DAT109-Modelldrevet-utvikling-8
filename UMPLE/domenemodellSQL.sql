-- PLEASE DO NOT EDIT THIS CODE
-- This code was generated using the UMPLE 1.29.1.4450.6749b7105 modeling language!



CREATE TABLE IF NOT EXISTS `stand`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/

  /*stand Associations*/
  admin_username VARCHAR(255),
  stand_admin_username VARCHAR(255),
  result_stand_id INT,
  
  /*stand Attributes*/
  id INT,
  navn VARCHAR(255),
  PRIMARY KEY(id)

);





CREATE TABLE IF NOT EXISTS `admin`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/
  
  /*admin Attributes*/
  username VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY(username)

);





CREATE TABLE IF NOT EXISTS `stand_admin`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/

  /*stand_admin Associations*/
  stand_id INT,
  
  /*stand_admin Attributes*/
  username VARCHAR(255),
  password VARCHAR(255),
  stand_id INT,
  PRIMARY KEY(username)

);





CREATE TABLE IF NOT EXISTS `result`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/
  
  /*result Attributes*/
  stand_id INT,
  result_score INT,
  PRIMARY KEY(stand_id)

);





CREATE TABLE IF NOT EXISTS `vote`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/

  /*vote Associations*/
  result_stand_id INT,
  user_user_id INT,
  
  /*vote Attributes*/
  user_id INT,
  stand_id INT,
  score INT,
  PRIMARY KEY(user_id)

);





CREATE TABLE IF NOT EXISTS `user`
(
  /*------------------------*/
  /* MEMBER VARIABLES       */
  /*------------------------*/
  
  /*user Attributes*/
  user_id INT,
  PRIMARY KEY(user_id)

);


ALTER TABLE `stand` ADD CONSTRAINT `fk_stand_admin_username` FOREIGN KEY (`admin_username`) REFERENCES `admin`(`username`);
ALTER TABLE `stand` ADD CONSTRAINT `fk_stand_stand_admin_username` FOREIGN KEY (`stand_admin_username`) REFERENCES `stand_admin`(`username`);
ALTER TABLE `stand` ADD CONSTRAINT `fk_stand_result_stand_id` FOREIGN KEY (`result_stand_id`) REFERENCES `result`(`stand_id`);


ALTER TABLE `stand_admin` ADD CONSTRAINT `fk_standadmin_stand_id` FOREIGN KEY (`stand_id`) REFERENCES `stand`(`id`);


ALTER TABLE `vote` ADD CONSTRAINT `fk_vote_result_stand_id` FOREIGN KEY (`result_stand_id`) REFERENCES `result`(`stand_id`);
ALTER TABLE `vote` ADD CONSTRAINT `fk_vote_user_user_id` FOREIGN KEY (`user_user_id`) REFERENCES `user`(`user_id`);

