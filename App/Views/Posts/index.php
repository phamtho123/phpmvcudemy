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
                    <li><a href="?posts/addPost">Thêm</a></li>
                    <li><a href="?posts/index">Liệt kê</a></li>
                
                    </ul>
                </li>
                </ul>
            </div>
    </nav>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Thư mục</th>
            <th>Image</th>
            <th>Mô tả </th>
            <th>Quản lý </th>
          </tr>
        </thead>
        <tbody>
            {% for post in posts %}
                <tr>
                    <td>{{post.id}}</td>
                    <td><img src="http://thopham.test/uploads/post/{{post.image}}"
                             height="100px" width="100px"></td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.content }}</td>
                    <td align="center"><a href="/?posts/{{post.id}}/deletePost">Delete</a> || 
                        <a href="/?posts/{{post.id}}/editPost">Update</a></td>
                </tr>
            {% endfor %}
        </tbody>
    </table>
    </div>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>

