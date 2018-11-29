<?php
/**
 * Created by PhpStorm.
 * User: van96
 * Date: 5/21/2018
 * Time: 1:45 AM
 */

namespace App\Http\Controllers;


use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController
{
    public function Index(){
        return view('admin.index');
    }
    public function getDanhSach(){
        $categories = ProductType::all();
        return view('admin.theloai.danhsach',compact('categories'));
    }
    public function getThem(){
        return view('admin.theloai.them');
    }
    public function postThem(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:100',
        ],
            [
                'name.required' => 'Bạn chưa nhập tên thể loại',
                'name.min' => 'Tên thể loại phải từ 3->100 kí tự',
                'name.max' => 'Tên thể loại phải từ 3->100 kí tự',
            ]);

        $category = new ProductType();
        $category->name = $request->name;
        $category->slug = str_slug($request->name,'-');
        $category->save();

        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $category = ProductType::find($id);
        return view('admin.theloai.sua',compact('category'));
    }
    public function postSua(Request $request,$id){
        $category = ProductType::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($category->name,'-');
        $category->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function Xoa($id){
        $category = ProductType::find($id);
        $category->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa sản phẩm thành công');
    }
}