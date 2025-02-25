<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe4e1; /* Màu hồng nhạt hơn */
        }
        .header {
            background-color: #ffb3d1; /* Màu hồng nhạt */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho header */
        }
        .form-container {
            max-width: 500px; /* Chiều rộng tối đa của biểu mẫu */
            margin: 0 auto; /* Căn giữa biểu mẫu */
            padding: 30px; /* Khoảng cách bên trong */
            background-color: #fff; /* Nền trắng cho biểu mẫu */
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Đổ bóng cho biểu mẫu */
        }
        .btn-custom {
            background-color: #d5006d; /* Màu hồng đậm */
            border-color: #d5006d;
            color: white; /* Màu chữ trắng */
        }
        .btn-custom:hover {
            background-color: #c2185b; /* Màu hồng đậm hơn khi hover */
            border-color: #c2185b;
        }
        label {
            font-weight: bold; /* Đậm cho nhãn */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="display-4">Thêm Sách</h1>
        </div>

        <div class="form-container">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Tiêu Đề:</label>
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Nhập tiêu đề sách">
                </div>
                <div class="form-group">
                    <label for="author">Tác Giả:</label>
                    <input type="text" class="form-control" id="author" name="author" required placeholder="Nhập tên tác giả">
                </div>
                <div class="form-group">
                    <label for="description">Mô Tả:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả sách"></textarea>
                </div>
                <button type="submit" class="btn btn-custom btn-block">Lưu Sách</button>
            </form>
        </div>
    </div>
</body>
</html>