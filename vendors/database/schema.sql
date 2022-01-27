CREATE TABLE IF NOT EXISTS `dreamusers` (  
   `id` int(11) NOT NULL AUTO_INCREMENT,  
   `created` timestamp default now(),  
   `fname` varchar(25) NOT NULL,
   `lname` varchar(25) NOT NULL,
   `username` varchar(50) NOT NULL,  
   `email` varchar(50) NOT NULL,  
   `password` varchar(50) NOT NULL,
   `designation` varchar(50) NOT NULL,
   `profile` varchar(50) NOT NULL,
   `cover` varchar(50) NOT NULL,
   PRIMARY KEY (`id`)  
); 

INSERT INTO `dreamusers` (`id`, `created`, `fname`, `lname`, `username`, `email`, `password`, `designation`, `profile`, `cover`) VALUES (NULL, CURRENT_TIMESTAMP, 'jishan', 'hoshen', 'jishanhoshen', 'jishanhoshenjibon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'owner', 'team.png', 'jishanhoshen.cover.png');

CREATE TABLE IF NOT EXISTS `dreamprojects` (  
   `id` int(11) NOT NULL AUTO_INCREMENT,  
   `created` timestamp default now(), 
   `projectname` varchar(50) NOT NULL, 
   `userid` int(11) NOT NULL,
   `thumbnail` varchar(50) NOT NULL, 
   `description` varchar(50) NOT NULL,
   `keyword` varchar(256) NOT NULL,
   PRIMARY KEY (`id`)  
); 

INSERT INTO `dreamprojects` (`id`, `created`, `projectname`, `userid`, `thumbnail`, `description`,`keyword`) VALUES 
(NULL, CURRENT_TIMESTAMP, '2 project', '0', 'project/2.png', 'description', '{"ui", "template"}'),
(NULL, CURRENT_TIMESTAMP, '3 project', '1', 'project/3.png', 'description', '{"ui", "node"}'),
(NULL, CURRENT_TIMESTAMP, '4 project', '1', 'project/4.png', 'description', '{"node", "php"}'),
(NULL, CURRENT_TIMESTAMP, '5 project', '1', 'project/5.png', 'description', '{"template"}'),
(NULL, CURRENT_TIMESTAMP, '6 project', '0', 'project/6.png', 'description', '{"ui", "php"}'),
(NULL, CURRENT_TIMESTAMP, '7 project', '0', 'project/7.png', 'description', '{"ui", "node"}'),
(NULL, CURRENT_TIMESTAMP, '8 project', '0', 'project/8.png', 'description', '{"php", "template"}'),
(NULL, CURRENT_TIMESTAMP, '9 project', '1', 'project/9.png', 'description', '{"node", "template"}'),
(NULL, CURRENT_TIMESTAMP, '10 project', '1', 'project/10.png', 'description', '{"node"}'),
(NULL, CURRENT_TIMESTAMP, '11 project', '0', 'project/11.png', 'description', '{"php"}'),
(NULL, CURRENT_TIMESTAMP, '12 project', '0', 'project/12.png', 'description', '{"ui"}'),
(NULL, CURRENT_TIMESTAMP, '13 project', '0', 'project/13.png', 'description', '{"template"}'),
(NULL, CURRENT_TIMESTAMP, '14 project', '0', 'project/14.png', 'description', '{"ui", "node", "php"}');