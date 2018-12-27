<?php 

	class Connection{

		var $connection;

		function __construct(){
			//Ket noi co so du lieu

			// Thong so ket noi CSDL
			$servername = "127.0.0.1";//255.123.45.21
			$username = "root";   // ten dang nhap
			$password = "";    // mat khau rong
			$dbname = "admin.zentshop.vn";   // db muon ket noi

			// Tao ra ket noi den CSDL connection
			$this->connection = new mysqli($servername, $username, $password, $dbname);

			$this->connection->set_charset("utf8"); // set utf-8 dể đọc dữ liệu tiếng Việt

			// Check connection
			if ($this->connection->connect_error) {
			    die("Connection failed: " . $this->connection->connect_error);
			}
		}
	}
			

 ?>