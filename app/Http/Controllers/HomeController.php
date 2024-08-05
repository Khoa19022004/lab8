<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function store(Request $request)
    {
        // Custom error messages
     

        // Sử dụng Validator Facade để tạo một đối tượng validator với thông báo lỗi tùy chỉnh
        // $request->validate( [
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0',
        //     'description' => 'required|string',
        // ], $messages);

        // Kiểm tra nếu xác thực thất bại
        // if ($validator->fails()) {
        //     return redirect()->back()
        //                      ->withErrors($validator)
        //                      ->withInput();
        // }

        // // Nếu xác thực thành công, lưu sản phẩm
        // $product = Product::create($validator->validated());

        // return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
}
