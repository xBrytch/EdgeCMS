<?php
include '/inc/core.god.php';
$mysqli = new mysqli($mysqld['host'],$mysqld['user'],$mysqld['pass'],$mysqld['db']);
$phb = mysqli_fetch_assoc($mysqli = mysqli_query(connect::cxn_mysqli(),'SELECT look FROM users where username = :username');
$phb = bindParam(':username', htmlspecialchars($_POST['Username']));
if($figure = $phb->fetch())
echo $figure['look'];
else
echo "0";
?>