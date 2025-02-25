<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Chỉnh Sửa Sách') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h4 class="text-center text-white mb-4" style="text-align: center;">Chỉnh Sửa Sách</h4>

        <div class="card shadow-sm" style="border: none; background-color: #f50057;">
            <div class="card-body" style="background-color: #ffebee;">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="title" class="font-weight-bold" style="font-size: 1.1rem; color: #f50057;">Tiêu Đề</label>
                        <input type="text" class="form-control rounded" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="author" class="font-weight-bold" style="font-size: 1.1rem; color: #f50057;">Tác Giả</label>
                        <input type="text" class="form-control rounded" id="author" name="author" value="{{ old('author', $book->author) }}" required>
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="description" class="font-weight-bold" style="font-size: 1.1rem; color: #f50057;">Mô Tả</label>
                        <textarea class="form-control rounded" id="description" name="description" rows="4" required>{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="cover_image" class="font-weight-bold" style="font-size: 1.1rem; color: #f50057;">Hình Ảnh Bìa</label>
                        <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Cập Nhật</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary px-4">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #ffe4e1; /* Nền hồng nhẹ nhàng */
        }
        .card {
            border-radius: 12px; /* Bo tròn góc thẻ card */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Bóng đổ nhẹ */
        }
        .form-control {
            border-radius: 8px; /* Bo góc cho các trường nhập */
        }
        .btn-primary {
            border-radius: 5px;
            padding: 10px 20px;
            background-color: #007bff; /* Màu xanh cho nút */
            color: white;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Màu xanh đậm hơn khi hover */
            transform: scale(1.05); /* Hiệu ứng phóng to khi hover */
        }
        .btn-secondary {
            background-color: #6c757d; /* Màu xám cho nút Hủy */
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Màu xám đậm hơn khi hover */
            transform: scale(1.05); /* Hiệu ứng phóng to khi hover */
        }
        .text-danger {
            color: #d5006d; /* Màu đỏ cho thông báo lỗi */
        }
    </style>
</x-app-layout>