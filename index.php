<?php 
	$mod = '';
	$act = '';
	if(isset( $_GET['mod'])){
		$mod = $_GET['mod'];
	}

	if(isset( $_GET['act'])){
		$act = $_GET['act'];
	}
	//
	switch ($mod) {
		case 'employees':
			require_once('controllers/EmployeeController.php');
			$controller = new EmployeeController();
			switch ($act) {
				case 'list':
					$controller->list();
					break;
				case 'detail':
					$controller->detail();
					break;
				case 'add':
					$controller->add();
					break;
				case 'store':
					$controller->store();
					break;
				case 'edit':
					$controller->edit();
					break;
				case 'update':
					$controller->update();
					break;
				case 'delete':
					$controller->delete();
					break;
				default:
					$controller->error();
					break;
			}
			break;
		case 'products':
			require_once('controllers/ProductController.php');
			$controller = new ProductController();
			
			switch ($act) {
				case 'list':
					$controller->list();
					break;
				case 'detail':
					$controller->detail();
					break;
				case 'add':
					$controller->add();
					break;
				case 'store':
					$controller->store();
					break;
				case 'edit':
					$controller->edit();
					break;
				case 'update':
					$controller->update();
					break;
				case 'delete':
					$controller->delete();
					break;
				default:
					$controller->error();
					break;
			}
			break;
		case 'customers':

			echo "<BR>QUẢN LÝ KHÁCH HÀNG";
			switch ($act) {
				case 'list':
					echo "<br> Bạn đang sử dụng chức năng xem danh sách khách hàng";
					break;
				case 'add':
					echo "<br> Bạn đang sử dụng chức năng thêm mới khách hàng";
					break;
				case 'edit':
					echo "<br> Bạn đang sử dụng chức năng sửa thông tin khách hàngm";
					break;
				case 'delete':
					echo "<br> Bạn đang sử dụng chức năng xóa thông tin khách hàng";
					break;
				
				default:
					echo "<br> Không có chức năng này !";
					break;
			}
			break;
		
		default:
			echo "<br> Không có module này !";
			break;
	}

?>