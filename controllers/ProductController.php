<?php 
require_once('models/Product.php');
	class ProductController{
		
		var $product_model;

		function __construct(){
			$this->product_model = new Product();
		}

		function list(){
			// Hiển thị danh sách sản phẩm
			$data = $this->product_model->All();
			require_once('views/products/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$product = $this->product_model->find($code);
			require_once('views/products/detail.php');
		}

		function add(){
			require_once('views/products/add.php');
		}

		function store(){
			// Bước 1: Lấy dữ liệu mà người dùng gửi lên
			$data = $_POST;
			// Bước 2: Khởi tạo model
			// Bước 3: Gọi phương thức insert trong model
			$status = $this->product_model->insert($data);
			if($status){
				header('Location: index.php?mod=products&act=list');
			}else{
				echo "Thêm mới không thành công";
			}
		}

		function edit(){
			$code = $_GET['code'];
			$product = $this->product_model->find($code);
			require_once('views/products/edit.php');
		}

		function update(){
			// Bước 1: Lấy dữ liệu mà người dùng gửi lên
			$data = $_POST;
			// Bước 2: Khởi tạo model
			// Bước 3: Gọi phương thức insert trong model
			$status = $this->product_model->update($data);
			if($status){
				header('Location: index.php?mod=products&act=list');
			}else{
				echo "Thêm mới không thành công";
			}

		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->product_model->delete($code);
			//die;
			if($status){
				header('Location: index.php?mod=products&act=list');
			}else{
				echo "Xóa không thành công";
			}
		}

		function error(){
			// Hiển thị danh sách sản phẩm - Không có chức năng
			echo "<br> Lỗi - Không có chức năng";
		}
	}
 ?>