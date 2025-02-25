<div class="container mt-5">
    <h4 class="text-danger text-center mb-4">Chi Tiết Sách</h4>

    <div class="book-detail shadow-sm" style="background-color: #ffe4e1; border-radius: 10px; padding: 20px;">
        <div class="row">
           /* <div class="col-md-4 text-center">
                <img src="{{ asset('images/ . $book->image') }}" alt="Book Cover" class="img-fluid rounded" style="border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
            </div> 
            
            <div class="col-md-8">
                <h5>Tiêu Đề: {{ $book->title }}</h5>
                <h5>Tác Giả: {{ $book->author }}</h5>
                <h5>Mô Tả:</h5>
                <p>{{ $book->description }}</p>
            </div>
        </div>

        <div class="action-buttons text-center mt-4">
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-custom">Chỉnh Sửa</a>
            <a href="{{ route('books.index') }}" class="btn btn-custom">Đóng</a>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #ffebee; /* Màu hồng nhạt cho nền */
    }
    .book-detail {
        transition: transform 0.2s;
        border: 1px solid #d5006d; /* Viền hồng cho khối chi tiết */
    }
    .book-detail:hover {
        transform: scale(1.02); /* Hiệu ứng phóng to khi hover */
    }
    .btn-custom {
        background-color: #d5006d; /* Màu hồng đậm */
        color: white;
        border-radius: 5px;
        padding: 10px 15px;
        text-decoration: none;
        margin: 0 5px; /* Giảm khoảng cách giữa các nút */
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn-custom:hover {
        background-color: #c2185b; /* Màu hồng đậm hơn khi hover */
        transform: scale(1.05); /* Hiệu ứng phóng to khi hover */
    }
</style>