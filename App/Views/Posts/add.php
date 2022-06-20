<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse" style="margin-top: 20px;">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="/">Trang chủ</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục Bài viết<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="/?posts/addPost">Thêm</a></li>
                    <li><a href="/?posts/index">Liệt kê</a></li>
                    </ul>
                </li>
                </ul>
            </div>
        </nav>
        <h3 style="text-align: center;">Thêm bài Post</h6>
            <div class="col-md-12">
                <form action="/?posts/insertPost" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Tên bài Post</label>
                    <input type="text" name="title" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Hình ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Miêu tả bài Post</label>
                    <input type="text" name="content" class="form-control" id="pwd">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Thêm bài Post</button>
                </form>
            </div>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

