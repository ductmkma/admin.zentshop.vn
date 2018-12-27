<?php 
	require_once('models/Model.php');
	class Product extends Model{
		var $table_name = 'products';
		var $primary_key = 'code';

		function reduce_quantity($code,$quantity){
			$quantity_current = $this->getQuantity($code);
			$quantity_left =  $quantity_current - $quantity;
			$query = "UPDATE ".$this->table_name." SET quantity = ".$quantity_left." WHERE ".$this->primary_key." = '".$code."'";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			return $result;
		}

		function getQuantity($code){
			$query = "SELECT quantity FROM ".$this->table_name." WHERE ".$this->primary_key." = '".$code."'";

			// Thuc thi cau lenh truy van co so du lieu
			$result = $this->conn->query($query);

			$product = $result->fetch_assoc();

			return $product['quantity'];
		}
	}
 ?>