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
        <h2 align="center">CHI TIẾT SẢN PHẨM</h2>
        <h5>Mã sản phẩm: <?= $product['code'] ?></h5>
        <h5>Tên sản phẩm: <?= $product['name'] ?></h5>
        <h5>Số lượng sản phẩm: <?= $product['quantity'] ?></h5>
        <h5>Giá bán sản phẩm: <?= number_format($product['price']) ?></h5>
        <h5>Ảnh sản phẩm: </h5>
        <img src="public/images/<?= $product['image']?>">
        <img src="smiley.gif" alt="Smiley face" style="float:left;width:42px;height:42px;"
        <a href="https://zent.edu.vn">Zent Education</a>
        
    </div>
</body>
</html>