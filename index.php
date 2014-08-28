<html>
	<body>
		<?php
		include 'ConnectDB.php';
		$db=new ConnectDB();
		$str_coll='userInfo';
		$key1='name';
		$key2='sex';
		$cursor1= $db->findFromColl($str_coll,$key1);
		$cursor2= $db->findFromColl($str_coll,$key2);
		?>
		<table border="1">
			<tr>
				<th>Name</th>
				<th>Sex</th>
			</tr>
		<?php 
			$rs1=$cursor1->getNext();
			$rs2=$cursor2->getNext();
			while($rs1){
				echo '<tr>';
				echo '<th>';
				echo $rs1[$key1];
				$rs1=$cursor1->getNext();
				echo '</th>';
				echo '<th>';
				echo $rs2[$key2];
				$rs2=$cursor2->getNext();
				echo '</th>';
				echo '</tr>';
			}
		?>
		</table>
	</body>
</html>
