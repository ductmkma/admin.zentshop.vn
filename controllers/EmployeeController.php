<?php 
require_once('models/Employees.php');
	class EmployeeController{
		var $employee_model;

		function __construct(){
			$this->employee_model = new Employees();
		}

		function list(){
			// Hiển thị danh sách sản phẩm
			$data = $this->employee_model->All();
			$page = "employees";
			require_once('views/employees/list.php');
		}
		function detail(){
			$id = $_POST['id'];
			$employee = $this->employee_model->find($id);
			echo json_encode($employee);
		}

	}
 ?>