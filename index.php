<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{margin:0;padding:0;font-size:12px;}
dt{padding:10px;}
i{ font-style:normal;}
/* detail */
#detail{position:absolute;width:400px;height:200px;border:1px solid #ccc;bac    kground:#efefef;display:none;}
#detail .tit{background:#ddd;display:block;height:33px;cursor:move;}
#detail .tit i{float:right;line-height:33px;padding:0 8px;cursor:pointer;}
#table{
	margin: 0 auto;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	width:60%;
	border-collapse:collapse;
}
#table td, #table th {
	font-size:1em;
	border:1px solid #98bf21;
	text-align:center;
	padding:3px 7px 2px 7px;
}
#table th {
	font-size:1.1em;
	text-align:left;
	padding-top:5px;
	padding-bottom:4px;
	background-color:#A7C942;
	color:#ffffff;
}
#table tr.alt td {
	color:#000000;
	text-align:center;
	background-color:#EAF2D3;
}
</style>
</head>
	<body>
		<?php
		include 'ConnectDB.php';
		include 'Coll_userInfo.php';
		$str_coll=Coll_userInfo::COLL;
		$primary_key=Coll_userInfo::PRIMARY_KEY;
		$key=Coll_userInfo::$KEY;
		$db=new ConnectDB($str_coll);
		$cursor= $db->findFromColl($key);
		?>
		<table id="table" border="1">
			<tr class="alt">
				<?php 
					foreach($key as $keytmp){
						echo "<th>$keytmp</th>";
					}
				?>
				<th>Change</th>
			</tr>
		<?php 
			$rs=$cursor->getNext();
			while($rs){
				echo '<tr class="alt">';
				foreach($key as $keytmp){
					echo "<td> $rs[$keytmp]</td>";
				}
				echo '<td> 修改 </td>';
				echo '</tr>';
				$rs=$cursor->getNext();
			}
			unset($db);
		?>
		</table>
	</body>
</html>
