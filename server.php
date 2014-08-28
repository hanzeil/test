<?php
echo $_POST["name"];
$conn=new Mongo();
$db=$conn->test;
$coll=$db->userInfo;
$query=array('user'=>'Hanzeil');
$rs=$coll->findOne($query);
echo $rs['pass'];
?>
