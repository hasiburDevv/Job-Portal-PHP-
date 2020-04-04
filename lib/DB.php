<?php
class Database{
 public $host = "localhost";	
 public $user = "root";
 public $pass = "";
 public $dbname = "jobportal";
 

public $conn;
public $error;

public function __construct(){
	$this->connectDB();
}

private function connectDB(){

$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname); 

if (!$this->conn) {
  $this->error = "Connection fail".$this->conn->connect_error;

  return false;
   }
}


/*
public function select($que){
 $result = $this->conn->query($que) or die ($this->conn->error.__LINE__);

 if($result->num_rows > 0){
 	return $result;
 }else{
 	return false;
    }
  }


public function insert($que){
 $result = $this->conn->query($que) or die ($this->conn->error.__LINE__);

 if($result){
 return $result; 
    exit();
 }else{
 	die("Error :(".$this->conn->errno.")".$this->conn->error);
    }
  }


public function update($que){
 $result_row = $this->conn->query($que) or die ($this->conn->error.__LINE__);

 if($result_row){
 header("Location: index.php?msg=".urlencode('Data update successfully'));
    exit();
 }else{
 	die("Error :(".$this->conn->errno.")".$this->conn->error);
    }
  }


public function delete($que){
 $result_row = $this->conn->query($que) or die ($this->conn->error.__LINE__);

 if($result_row){
 header("Location: index.php?msg=".urlencode('Data delete successfully'));
    exit();
 }else{
 	die("Error :(".$this->conn->errno.")".$this->conn->error);
    }
  }
*/
}