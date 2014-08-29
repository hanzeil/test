<?php
class ConnectDB{
	private $conn;
	private $db;
	private $coll;
	private $key;
	public function ConnectDB($coll){
		$str_DB="viwo";
		$this->conn=new Mongo();
		$this->db=$this->conn->selectDB($str_DB);
		$this->coll=$this->db->selectCollection($coll);
	}	
	public function findFromColl($key){
		foreach($key as $value){
			$range[$value]='true';
		}
		$cursor=$this->coll->find(array(),$range);
		return $cursor;
	}
	public function changeColl($primary_key,$value0,$value){
		$cursor=$this->coll->update(array($primary_key=>$value0),array('$set'=>$value));
		return $cursor;
	}
}
?>
