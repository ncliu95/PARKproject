CREATE DATABASE IF NOT EXISTS park_accounts;
USE park_accounts;
CREATE TABLE IF NOT EXISTS `physicians` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
)AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `patients` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `physician_code` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  FOREIGN KEY (`physician_code`) REFERENCES physicians(user_id)
) AUTO_INCREMENT=1 ;
