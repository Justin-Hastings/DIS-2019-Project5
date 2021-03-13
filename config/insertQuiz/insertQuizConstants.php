<?php

/*
	CREATE USER 'insertQuiz'@'localhost' IDENTIFIED BY 'Quiz';
	GRANT INSERT ON `quiz`.`student` TO `newquizzstudent`@`localhost`;
*/

/*
	Display all users
	SELECT * FROM mysql.user;
*/
/*
	Display grants for user newquizzstudent
	SHOW GRANTS FOR 'newquizzstudent'@'localhost'
*/

define('DB_HOST', 'localhost');
define('DB_USER','insertQuiz');
define('DB_PASS','Quiz');
define('DB_NAME','quiz');







