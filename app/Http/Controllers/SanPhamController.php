<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    public function getDanhSach(){
        $product_category = ProductType::all();
        $products = Product::all();
        return view('admin.products.danhsach',compact('products','product_category'));
    }
    public function getThem(){
        return view('admin.products.them');
    }
    public function postThem(Request $request){
        $request->validate([
            'category_id'=>'required',
            'name' => 'required|min:3|max:100',
            'price'=>'required',
            'detail' => 'required'
        ],
            [
                'category_id.required'=>'Bạn chưa nhập tên thể loại',
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.min' => 'Tên thể loại phải từ 3->100 kí tự',
                'name.max' => 'Tên thể loại phải từ 3->100 kí tự',
                'price.required' =>'Bạn chưa nhập giá',
                'detail.required' =>'Bạn chưa nhập chi tiết'
            ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->slug = str_slug('name','-');
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image_featured = $request->image;
        $product->detail = $request->detail;
        $product->save();

        return redirect('admin/products/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $products = Product::find($id);
        return view('admin.products.sua',compact('products'));
    }
    public function postSua(Request $request,$id){
        $products = Product::find($id);
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->image_featured = $request->image;
        $products->detail = $request->detail;
        $products->save();
        return redirect('admin/products/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function Xoa($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products/danhsach')->with('thongbao','Xóa sản phẩm thành công');
    }
}
