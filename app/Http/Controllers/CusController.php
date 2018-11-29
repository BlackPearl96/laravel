<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CusController extends Controller
{
    public function getDanhSach(){
        $cus = Customer::all();
        return view('admin.customers.danhsach',compact('cus'));
    }
    public function getXoa($id){
        $cus = Customer::find($id);
        $cus->delete();
        return redirect('admin/customers/danhsach')->with('thongbao','Xóa sản phẩm thành công');
    }
}
