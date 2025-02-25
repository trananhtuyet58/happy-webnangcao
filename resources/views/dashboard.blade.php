{{-- resources/views/dashboard/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h4 class="text-danger text-center" style="width: 100%; text-align: center; margin-bottom: 20px;">Danh Sách Sách Trong Thư Viện</h4>

        <div class="text-center mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-custom">Thêm Sách</a>
        </div>

        <div class="table-responsive" style="display: flex; justify-content: center;">
            <table class="table table-bordered" style="width: 80%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Tác Giả</th>
                        <th>Mô Tả</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">
                            <div class="action-links">
                                <a class="action-link" href="{{ route('books.show', $item->id) }}">Chi Tiết</a>
                                <a class="action-link" href="{{ route('books.edit', $item->id) }}">Chỉnh Sửa</a>
                                <form action="{{ route('books.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a class="action-link text-danger" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Xóa</a>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        body {
            background-color: #ffe4e1; /* Màu hồng nhạt */
        }
        .btn-custom {
            background-color: #d5006d; /* Màu hồng đậm */
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #c2185b; /* Màu hồng đậm hơn khi hover */
        }
        .table {
            background-color: #fff; /* Nền trắng cho bảng */
            border-radius: 10px; /* Bo góc cho bảng */
            overflow: hidden; /* Để bo góc hoạt động */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho bảng */
        }
        .table th, .table td {
            text-align: center; /* Căn giữa nội dung */
            font-size: 1.2em; /* Tăng kích thước chữ */
            padding: 15px; /* Tăng khoảng cách bên trong ô */
        }
        .table th {
            background-color: #ffb3d1; /* Màu hồng nhạt cho tiêu đề bảng */
        }
        .action-links {
            display: flex; /* Sử dụng flexbox để căn chỉnh */
            justify-content: center; /* Căn giữa các liên kết */
            gap: 15px; /* Khoảng cách giữa các liên kết */
        }
        .action-link {
            color: #d5006d; /* Màu hồng cho liên kết */
            text-decoration: none; /* Bỏ gạch chân */
            font-weight: bold; /* Đậm chữ */
        }
        .action-link:hover {
            text-decoration: underline; /* Gạch chân khi hover */
        }
        .text-danger {
            color: #d5006d; /* Màu đỏ cho chữ "Xóa" */
        }
    </style>
</x-app-layout>