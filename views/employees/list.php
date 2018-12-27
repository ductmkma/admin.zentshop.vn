<?php
	$parent_page = 'pa_employees'; 
	$page='employees'; 
	include 'views/layouts/header.php';
?>
	<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Quản lý nhân viên</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Quản lý nhân viên</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                    	<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Danh sách nhân viên</h5>
                                <div class="table-responsive">
                                    <table id="employees_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
				                            	<th>STT</th>
				                                <th>Mã nhân viên</th>
				                                <th>Họ và tên</th>
				                                <th>Ngày sinh</th>
				                                <th>Email</th>
				                                <th>Số điện thoại</th>
				                                <th>Trạng thái</th>
				                                <th>Hành động</th>
				                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach ($data as $row) { $i++ ?>
				                        	<tr>
				                        		<td class="text-center"><?= $i ?></td>
				                                <td class="text-center"><?= $row['CODE'] ?></td>
				                                <td class="text-center"><?= $row['FULLNAME'] ?></td>
				                                <td class="text-center"><?= $row['BIRTHDAY'] ?></td>
				                                <td class="text-center"><a href="mailto:<?= $row['EMAIL'] ?>"><?= $row['EMAIL'] ?></a></td>
				                                <td class="text-center"><a href="tel:<?= $row['PHONE'] ?>"><?= $row['PHONE'] ?></a></td>
				                                <td class="text-center text-success"><?= $row['STATUS']==1?"<i class='fas fa-lock-open'></i>":"<i class='fas fa-lock'></i>" ?></td>
				                                <td>
				                                	<a onclick="view(<?= $row['ID'] ?>)" href="javascript:;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem chi tiết" class="btn btn-outline-cyan btn-sm"><i class="fas fa-eye"></i></a>
				                                	<a href="javascript:;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chỉnh sửa" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a>
				                                	<a href="javascript:;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
				                                </td>
				                            </tr>
				                        	<?php } ?>
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div>
                        </div>
		            </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
            </div>
            <div class="modal fade" id="viewEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title-info-employee"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Mã nhân viên</td>
                                        <td id="v-code"></td>
                                    </tr>
                                    <tr>
                                        <td>Họ và tên</td>
                                        <td id="v-fullname"></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td id="v-birthday"></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ email</td>
                                        <td><a id="v-email" href="" ></a></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><a id="v-phone" href="" ></a></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái</td>
                                        <td id="v-status"></td>
                                    </tr>
                                    <tr>
                                        <td>Ảnh đại diện</td>
                                        <td><img alt="Ảnh nhân viên" width="200px" height="200px" id="v-avata" src=""></td>
                                    </tr>
                              </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                function view($id){
                    $("#viewEmployee").modal('show');
                    $.ajax({
                    type:'POST',
                    url:  "index.php?mod=employees&act=detail", 
                    dataType : 'json',
                    data:{
                        id:$id
                    },  
                    success:function(response){
                        $("#title-info-employee").html("Thông tin của nhân viên "+response['FULLNAME']);
                        $("#v-code").html(response['CODE']);
                        $("#v-fullname").html(response['FULLNAME']);
                        $("#v-birthday").html(response['BIRTHDAY']);
                        $("#v-email").html(response['EMAIL']);
                        $("#v-email").attr("href","mailTo:"+response['EMAIL']);
                        $("#v-phone").html(response['PHONE']);
                        $("#v-phone").attr("href","tel:"+response['PHONE']);
                        $("#v-status").html(response['STATUS']);
                        $("#v-avata").attr("src","http://admin.zentshop.vn/public/assets/images/users/"+response['AVATA']);  
                    },
                    error: function (xhr, ajaxOptions, thrownError)
                    {
                        //toastr.error(thrownError);
                    }
                  });
                }
            </script>
<?php 
	include 'views/layouts/footer.php';
?>
