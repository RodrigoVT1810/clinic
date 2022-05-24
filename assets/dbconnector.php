<?php
class dbconn{
	protected $link;
	protected $result;
	protected $numRows;
	private $host="localhost";
	private $user="root";
	private $pass="";
	private $db="clinic";
	function dbconnector(){
		$this->link=mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if(mysqli_connect_errno()){
			echo "Connection Failed: ".mysqli_connect_errno();
			exit();
		}
	}
	function query($query){
		$this->result=$query;
		return mysqli_query($this->link, $query);
	}
	function getquery(){
		return $this->result;
	}
	function getnumrows($result){
		return mysqli_num_rows($result);
	}
	function fetcharray($result){
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	function escape($result){
		return mysqli_escape_string($this->link, $result);
	}
	function close(){
		mysqli_close($this->link);
	}
}
?>
