<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use Illuminate\Http\Request;
use Auth; 
use App\Models\Product;
use Illuminate\Support\Facades\Validator ;
use App\Http\Resources\Product as ProductResource;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        $arr=[
            'status' => true, 
            'message'=>"Danh sách sản phẩm", 
            // 'data'=> new ProductResource($products)
            'data'=> ProductResource::collection($products)
        ];
        return response()->json($arr); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=Product::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
        ];

        $input = $request->all(); 
        $validator = Validator::make($input, [ 'name' => 'required', 'price' => 'required' ],$messages); 
        if($validator->fails()){ 
            $arr = [ 'success' => false, 'message' => 'Lỗi kiểm tra dữ liệu', 'data' => $validator->errors() ]; 
            return response()->json($arr, 200); 
        } 
        $product = Product::create($input); 
        $arr=[
                'status' => true, 
                'message'=>"Sản phẩm đã lưu thành công", 
                'data'=> new ProductResource($product) 
            ]; 
        return response()->json($arr, 201); 
    }c

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        if(is_null($product)){
            $arr=[
                'status' => false, 
                'message'=>"Không thấy sản phẩm", 
                'data'=> []
            ]; 
            return response()->json($product);
        }
        $arr=[
            'status' => true, 
            'message'=>"Chi tiết sản phẩm", 
            'data'=> new ProductResource($product)
        ]; 
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
        ];
        $input = $request->all(); 
        $validator = Validator::make($input, [ 'name' => 'required', 'price' => 'required' ],$messages); 
        if($validator->fails()){ 
            $arr = [ 
                'success' => false, 
                'message' => 'Lỗi kiểm tra dữ liệu', 
                'data' => $validator->errors() 
            ]; 
            return response()->json($arr, 200); 
        }
        $product=Product::find($id);
        $product->name=$input['name'];
        $product->price=$input['price'];
        $product->save();
        $arr = [ 
            'success' => true, 
            'message' => 'Cập nhật sản phẩm thành công', 
            'data' => new ProductResource($product) 
        ]; 
        return response()->json($arr, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        $arr=[
            'success' => true,        
            'status'=>'Xoá thành công',
            'data' => []
        ];
        return response()->json($arr);
    }
}
