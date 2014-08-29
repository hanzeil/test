<html>
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
		<table border="1">
			<tr>
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
				echo '<form action="ChangeDB.php" method="post">';
				echo "<input type=hidden name=PRIMARY_KEY size=6 value=$rs[$primary_key] />";
				echo '<tr>';
				foreach($key as $keytmp){
					echo "<th><input type=text name=$keytmp size=6 value=$rs[$keytmp] ></th>";
				}
				echo '<th> <input type="submit" value=Change /></th>';
				echo '</tr>';
				$rs=$cursor->getNext();
				echo '</form>';
			}
			unset($db);
		?>
		</table>
	</body>
</html>
