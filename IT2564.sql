SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatyai_socialsystem`
--
CREATE DATABASE IF NOT EXISTS `hatyai_socialsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hatyai_socialsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `img_profile` varchar(255) NOT NULL,
  `acc_status` enum('pending','cancel','accept') DEFAULT 'pending',
  `acc_level` enum('admin','user') DEFAULT 'user',
  `create_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cm_msg` text NOT NULL,
  `create_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friendrelation`
--

CREATE TABLE `friendrelation` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `Arefriend` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_text` text DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `krabi_db`
--
CREATE DATABASE IF NOT EXISTS `krabi_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `krabi_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(3) NOT NULL,
  `a_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `a_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(10) NOT NULL,
  `c_text` text COLLATE utf8_unicode_ci NOT NULL,
  `c_date` datetime NOT NULL,
  `c_postid` int(5) NOT NULL,
  `c_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `f_id` int(6) NOT NULL,
  `f_ownerid` int(3) NOT NULL,
  `f_friendid` int(3) NOT NULL,
  `f_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(3) NOT NULL,
  `m_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_address` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_img` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'def.jpg',
  `m_count` int(10) NOT NULL DEFAULT 0,
  `m_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(5) NOT NULL,
  `p_text` text COLLATE utf8_unicode_ci NOT NULL,
  `p_img` text COLLATE utf8_unicode_ci NOT NULL,
  `p_count` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `p_date` datetime NOT NULL,
  `p_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `p_love` int(10) NOT NULL DEFAULT 0,
  `p_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `f_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Database: `krabi_db1`
--
CREATE DATABASE IF NOT EXISTS `krabi_db1` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `krabi_db1`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(3) NOT NULL,
  `a_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `a_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(10) NOT NULL,
  `c_text` text COLLATE utf8_unicode_ci NOT NULL,
  `c_date` datetime NOT NULL,
  `c_postid` int(5) NOT NULL,
  `c_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `f_id` int(6) NOT NULL,
  `f_ownerid` int(3) NOT NULL,
  `f_friendid` int(3) NOT NULL,
  `f_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(3) NOT NULL,
  `m_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `m_address` text COLLATE utf8_unicode_ci NOT NULL,
  `m_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `m_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_img` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'def.jpg',
  `m_count` int(10) NOT NULL DEFAULT 0,
  `m_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(5) NOT NULL,
  `p_text` text COLLATE utf8_unicode_ci NOT NULL,
  `p_img` text COLLATE utf8_unicode_ci NOT NULL,
  `p_count` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `p_date` datetime NOT NULL,
  `p_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `p_love` int(10) NOT NULL DEFAULT 0,
  `p_memid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `f_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Database: `nakhon_site`
--
CREATE DATABASE IF NOT EXISTS `nakhon_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nakhon_site`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `commentid` float NOT NULL,
  `commentdetail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `postid` float NOT NULL,
  `posttitle` varchar(200) NOT NULL,
  `postdetail` varchar(2000) NOT NULL,
  `poststatus` set('public','friend','me') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_relation`
--

CREATE TABLE `tb_relation` (
  `ralationid` float NOT NULL,
  `memberid` float NOT NULL,
  `friendsid` float NOT NULL,
  `status` set('true','re','not','un') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `userid` float NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `level` text NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `tb_relation`
--
ALTER TABLE `tb_relation`
  ADD PRIMARY KEY (`ralationid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `commentid` float NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `postid` float NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_relation`
--
ALTER TABLE `tb_relation`
  MODIFY `ralationid` float NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `userid` float NOT NULL AUTO_INCREMENT;
--
-- Database: `pattani_it`
--
CREATE DATABASE IF NOT EXISTS `pattani_it` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pattani_it`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `name` int(255) NOT NULL,
  `lastname` int(255) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `phangnga_database`
--
CREATE DATABASE IF NOT EXISTS `phangnga_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `phangnga_database`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `c_id` int(10) NOT NULL,
  `c_pid` int(10) NOT NULL,
  `c_memberid` int(10) NOT NULL,
  `c_text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_groups`
--

CREATE TABLE `tb_groups` (
  `g_id` int(1) NOT NULL,
  `g_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `p_id` int(10) NOT NULL,
  `p_memberid` int(10) NOT NULL,
  `p_text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `p_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_relations`
--

CREATE TABLE `tb_relations` (
  `r_memberid` int(10) NOT NULL,
  `r_uid` int(10) NOT NULL,
  `r_status` int(1) NOT NULL,
  `r_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `u_memberid` int(10) NOT NULL,
  `u_fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `u_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `u_status` int(1) NOT NULL DEFAULT 1,
  `u_gid` int(1) NOT NULL DEFAULT 1,
  `u_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_pid` (`c_pid`),
  ADD KEY `c_memberid` (`c_memberid`);

--
-- Indexes for table `tb_groups`
--
ALTER TABLE `tb_groups`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_memberid` (`p_memberid`);

--
-- Indexes for table `tb_relations`
--
ALTER TABLE `tb_relations`
  ADD PRIMARY KEY (`r_memberid`,`r_uid`),
  ADD KEY `r_memberid` (`r_memberid`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`u_memberid`),
  ADD KEY `u_gid` (`u_gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_groups`
--
ALTER TABLE `tb_groups`
  MODIFY `g_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `u_memberid` int(10) NOT NULL AUTO_INCREMENT;
--
-- Database: `phuket_`
--
CREATE DATABASE IF NOT EXISTS `phuket_` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phuket_`;

-- --------------------------------------------------------

--
-- Table structure for table `addfriend`
--

CREATE TABLE `addfriend` (
  `idaddfriend` int(50) NOT NULL,
  `idmemberadd` int(50) NOT NULL,
  `namememberadd` varchar(255) NOT NULL,
  `addfriend` varchar(255) NOT NULL,
  `friendaccept` varchar(255) NOT NULL,
  `addidmember` int(50) NOT NULL,
  `addnamemember` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(50) NOT NULL,
  `idmember` int(50) NOT NULL,
  `idpost` int(50) NOT NULL,
  `namemember` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idmember` int(50) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `namemember` varchar(255) NOT NULL,
  `statusmember` int(50) NOT NULL,
  `statususe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(50) NOT NULL,
  `idmember` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `imgprofile` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(50) NOT NULL,
  `idmember` int(50) NOT NULL,
  `namemember` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `statuspost` int(50) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  `today` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addfriend`
--
ALTER TABLE `addfriend`
  ADD PRIMARY KEY (`idaddfriend`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addfriend`
--
ALTER TABLE `addfriend`
  MODIFY `idaddfriend` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(50) NOT NULL AUTO_INCREMENT;
--
-- Database: `surat_noone`
--
CREATE DATABASE IF NOT EXISTS `surat_noone` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `surat_noone`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`),
  ADD KEY `user_id1` (`user_id1`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friend_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `trang_alltime`
--
CREATE DATABASE IF NOT EXISTS `trang_alltime` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `trang_alltime`;

-- --------------------------------------------------------

--
-- Table structure for table `trang_at`
--

CREATE TABLE `trang_at` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trang_at`
--
ALTER TABLE `trang_at`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trang_at`
--
ALTER TABLE `trang_at`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
