CREATE TABLE users (
  userId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  userName varchar(255) NOT NULL,
  userEmail varchar(255) NOT NULL,
  userPassword text NOT NULL
);