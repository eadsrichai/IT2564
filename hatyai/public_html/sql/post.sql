create table if not EXISTS `post` (
    `post_id` int AUTO_INCREMENT,
    `post_text` text ,
    `post_img` VARCHAR(255) ,
    `create_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `user_id` int not NULL,
    PRIMARY KEY (`post_id`)
)engine = InnoDB DEFAULT Charset = utf8;