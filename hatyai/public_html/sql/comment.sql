CREATE TABLE IF NOT EXISTS `comment` (
    `cm_id` int AUTO_INCREMENT,
    `post_id` int NOT NULL,
    `user_id` int NOT NULL,
    `cm_msg` TEXT NOT NULL,
    `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`cm_id`)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;