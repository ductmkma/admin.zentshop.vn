<?php 
	require_once('models/Model.php');
	class Employees extends Model{
		var $table_name = 'employees';
		var $primary_key = 'id';
	}
 ?>