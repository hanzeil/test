<?php
class ConnectDB{
	private $conn;
	private $db;
	public function ConnectDB(){
		$str_DB="test";
		$this->conn=new Mongo();
		$this->db=$this->conn->selectDB($str_DB);
	}	
	public function findFromColl($coll,$key){
		$coll=$this->db->selectCollection($coll);
		$cursor=$coll->find(array(),array($key=>'true'));
		return $cursor;
	}
}
?>
