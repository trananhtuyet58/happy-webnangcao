<?php

namespace App\Http\Controllers;
use App\Models\Book; // Đảm bảo bạn đã import Model Book
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();// Lấy tất cả sách từ cơ sở dữ liệu
        return view('books.index', compact('books')); // Trả về view với biến $books
    }


public function create()
{
    return view('books/create'); // Trả về view thêm sách
}

// Lưu thông tin sách mới
public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000', // Thêm xác thực cho mô tả
    ]);

    // Tạo mới sách
    Book::create($validatedData);

    // Chuyển hướng đến trang danh sách sách với thông báo thành công
    return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công!');
}
public function show($id)
{
    $book = Book::findOrFail($id);
    return view('books/show', compact('book'));
}

public function edit($id)
{
    // Lấy thông tin sách từ cơ sở dữ liệu
    $book = Book::findOrFail($id);
    
    // Trả về trang chỉnh sửa cùng với thông tin sách
    return view('books.edit', compact('book'));
}
public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra tệp ảnh
    ]);

    $book->title = $request->title;
    $book->author = $request->author;
    $book->description = $request->description;

    // Xử lý ảnh
    if ($request->hasFile('image')) {
        // Nếu có ảnh mới, lưu ảnh mới vào thư mục images
        $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');
        $book->image = $request->file('image')->getClientOriginalName(); // Lưu tên tệp vào cơ sở dữ liệu
    }

    $book->save();

    return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công!');
}
public function destroy($id)
{
    // Tìm sách theo ID
    $book = Book::find($id);
    
    // Kiểm tra xem sách có tồn tại không
    if (!$book) {
        return redirect()->route('books.index')->with('error', 'Sách không tồn tại.');
    }

    // Xóa sách
    $book->delete();

    // Chuyển hướng về danh sách sách với thông báo thành công
    return redirect()->route('books.index')->with('success', 'Sách đã được xóa thành công.');
}
}
