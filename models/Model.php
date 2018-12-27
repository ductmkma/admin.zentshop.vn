<?php 
	require_once('models/Connection.php');
	class Model{
		var $conn;
		var $table_name = '';
		var $primary_key = '';

		function __construct(){
			$conn_obj = new Connection();

			$this->conn = $conn_obj->connection;
			
		}

		function All(){
			// Cau lenh truy van co so du lieu
			$query = "SELECT * FROM " . $this->table_name;

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			$data = array();
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
 			}
 				 
 			return $data;
		}

		function find($code){
			$query = "SELECT * FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$code."'";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			$product = $result->fetch_assoc();

			return $product;
		} 

		function insert($data){
			$column = '';
			$values = '';

			foreach ($data as $col => $value) {
				$column .= $col .",";
				$values .= "'".$value."',";
			}
			$column = trim($column,',');
			$values = trim($values,',');
				 
			$query = "INSERT INTO ".$this->table_name."(".$column.") VALUE(".$values.")";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			return $result;
		}

		function update($data){
			$values = '';
			foreach ($data as $col => $value) {
				$values .= $col."='".$value."',";
			}
			$values = trim($values,',');

			$query = "UPDATE ".$this->table_name." SET ".$values." WHERE ".$this->primary_key." = '".$data[$this->primary_key]."'";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			return $result;
		}

		function delete($code){
			$query = "DELETE FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$code."'";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			return $result;
		}
	}

 ?>