<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 align="center">DANH SÁCH SẢN PHẨM</h2>
        <p>
            <?= (isset($_COOKIE['msg']))?$_COOKIE['msg']:''  ?>
        </p>
        <a href="index.php?mod=products&act=add" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $row) { ?>
              <tr>
                <td><?= $row['code'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>
                    <a href="index.php?mod=products&act=detail&code=<?= $row['code'] ?>" class="btn btn-success">Detail</a> 
                     <a href="index.php?mod=products&act=edit&code=<?= $row['code'] ?>" class="btn btn-warning">Update</a>  
                    <a href="index.php?mod=products&act=delete&code=<?= $row['code'] ?>" class="btn btn-danger">Delete</a>

                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
    </div>
</body>
</html>