<?php 
include 'ConnectDB.php';
include 'Coll_userInfo.php';
$str_coll=Coll_userInfo::COLL;
$primary_key=Coll_userInfo::PRIMARY_KEY;
$key=Coll_userInfo::$KEY;
$primary_value=$_POST['PRIMARY_KEY'];
foreach($key as $keytmp){
	$value[$keytmp]=$_POST[$keytmp];
	if($keytmp==$primary_key&&$value[$keytmp]==''){
		echo "changed unsuccessfully <br>";
		echo "we will be back in 5s";
		echo '<meta http-equiv="refresh" content="1;url=index.php">';
		return ;
	}
}
$db=new ConnectDB($str_coll);
if($db->changeColl($primary_key,$primary_value,$value)){
	echo "changed successfully <br>";
}
else{
	echo "changed unsuccessfully <br>";
}
echo "we will be back in 5s";
?>
<meta http-equiv="refresh" content="1;url=index.php">
