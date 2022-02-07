<?php

$search = "SELECT * FROM `tb_users` WHERE `u_memberid` != $myid AND `u_status` = 2 AND `u_fname` LIKE '%$search%' OR `u_lname` LIKE '%$search%'";

$show_user = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid NOT IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid)";
$show_friends = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 3)";
$show_req_to_me = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 1)";
$show_req_for_me = "SELECT * FROM tb_users WHERE u_memberid != $myid AND u_status = 2 AND u_memberid IN (SELECT r_uid FROM tb_relations WHERE r_memberid = $myid AND r_status = 2)";


$show_post_me = "SELECT * FROM tb_posts,tb_users WHERE p_memberid = $myid AND u_memberid = p_memberid";


$show_post_all = "SELECT p.p_timestamp,p.p_text,p.p_img,p.p_memberid,p.p_timestamp,u2.u_memberid,u2.u_fname,u2.u_lname,u2.u_img
FROM tb_posts p,tb_users u1,tb_users u2,tb_relations r
WHERE u1.u_memberid = $myid 
AND r.r_memberid = u1.u_memberid
AND r.r_status = 3
AND p.p_memberid= r.r_uid
AND u2.u_memberid = p.p_memberid
AND u2.u_status = 2
ORDER BY p.p_timestamp DESC";


$show_comment = "SELECT * FROM tb_posts,tb_users WHERE c_pid = $pid AND u_memberid = c_memberid";
