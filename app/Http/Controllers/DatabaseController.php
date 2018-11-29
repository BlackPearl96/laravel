<?php
/**
 * Created by PhpStorm.
 * User: van96
 * Date: 5/21/2018
 * Time: 1:44 AM
 */

namespace App\Http\Controllers;



use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{
    function index(){
        $slide = DB::table('banner_items')->get();
        $new_product = DB::table('products')->where('active','1')->paginate(4);
        $top_product = DB::table('products')->where('price_promotion','!=',0)->get();

            //dd($new_product);
       return view('Client.Home.index',compact('slide','new_product','top_product'));
    }
    function type ($type){
        $categories = DB::table('products')->where('category_id',$type)->get();
        $categories_top = DB::table('products')->where('category_id','<>',$type)
        ->paginate(6);
        $menu = DB::table('product_categories')->get();
        $name = DB::table('product_categories')->where('id',$type)->first();
        return view('Client.Home.type',compact('categories','categories_top','menu','name'));
    }
    function product($id){
        $products = DB::table('products')->where('id',$id)->first();
        $related_Products = DB::table('products')->where('category_id',$products->category_id)
            ->paginate(6);
        return view('Client.Home.product',compact('products','related_Products'));
    }
    function cart(Request $request, $id){
        $product = product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);
        return redirect()->back();

    }
    function delItems($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null ;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }

        return redirect()->back();

    }

    function postCheckout(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->fullname = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->billing_contact = $request->notes;
        $customer->save();

        $bill = new Bill();
        $bill->customer_id = $customer->id;
        $bill->sub_total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->billing_contact = $request->notes;
        $bill->save();

        foreach ($cart->items as $key => $value){
            $bill_detail = new BillDetail();
            $bill_detail->order_id = $bill->id;
            $bill_detail->product_id = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->price =( $value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt Hàng Thành Công');

    }
    public function getSearch(Request $request){
        $product = DB::table('products')
            ->where('name','like','%'.$request->key.'%')
            ->orWhere('price',$request->key)->get();
        return view('Client.Home.search',compact('product'));
    }

}

















