
-- 16th February 2019 12:00 PM

	CREATE TABLE `results` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `student_id` int(11) NOT NULL,
	 `course` varchar(300) NOT NULL,
	 `test` double NOT NULL,
	 `score` double NOT NULL,
	 `total` double NOT NULL,
	 `grade` varchar(5) NOT NULL,
	 `term` varchar(100) NOT NULL,
	 `year` varchar(30) NOT NULL,
	 `created_at` datetime NOT NULL,
	 `updated_at` datetime NOT NULL,
	 `created_by` int(11) NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1

	CREATE TABLE `students` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `username` varchar(300) NOT NULL,
	 `password` varchar(300) NOT NULL,
	 `first_name` varchar(300) NOT NULL,
	 `last_name` varchar(300) NOT NULL,
	 `gender` varchar(20) NOT NULL,
	 `age` int(11) NOT NULL,
	 `status` tinyint(4) NOT NULL DEFAULT '0',
	 `profile_image` varchar(300) DEFAULT NULL,
	 `created_at` datetime NOT NULL,
	 `updated_at` datetime NOT NULL,
	 `created_by` int(11) NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1

	CREATE TABLE `teachers` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `username` varchar(300) NOT NULL,
	 `password` varchar(300) NOT NULL,
	 `first_name` varchar(300) NOT NULL,
	 `last_name` varchar(300) NOT NULL,
	 `gender` varchar(20) NOT NULL,
	 `profile_image` varchar(300) NOT NULL,
	 `created_at` datetime NOT NULL,
	 `updated_at` datetime NOT NULL,
	 `created_by` int(11) NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1

	CREATE TABLE `timetable` (
	 `id` int(11) NOT NULL AUTO_INCREMENT,
	 `day` varchar(30) NOT NULL,
	 `first_lesson` varchar(50) NOT NULL,
	 `second_lesson` varchar(50) NOT NULL,
	 `created_at` datetime NOT NULL,
	 `updated_at` datetime NOT NULL,
	 `created_by` int(11) NOT NULL,
	 PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1

	CREATE USER 'std_db_user'@'localhost' IDENTIFIED BY '***';
	GRANT ALL PRIVILEGES ON *.* TO 'std_db_user'@'localhost' IDENTIFIED BY '***' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

	GRANT ALL PRIVILEGES ON `std\_management`.* TO 'std_db_user'@'localhost' WITH GRANT OPTION;































