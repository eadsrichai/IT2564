create table if not EXISTS `friendrelation` (
    `user_id_1` int not NULL,
    `user_id_2` int not NULL,
    `Arefriend` enum('true','false') DEFAULT 'false'
)engine = InnoDB DEFAULT Charset = utf8;