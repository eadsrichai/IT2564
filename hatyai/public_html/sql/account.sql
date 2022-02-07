create table if not EXISTS `account` (
    `user_id` int AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(16) NOT NULL,
    `FirstName` VARCHAR(255) NOT NULL,
    `LastName` VARCHAR(255) NOT NULL,
    `img_profile` VARCHAR(255) NOT NULL,
    `acc_status` enum('pending','cancel','accept') DEFAULT 'pending',
    `acc_level` enum('admin','user') DEFAULT 'user',
    `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
)engine = InnoDB DEFAULT Charset = utf8;