<?php

namespace App\Providers;


use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Client.Layouts.layout',function ($menu){
            $detail = DB::table('product_categories')->get();

            $menu->with('detail',$detail);

        });
        view()->composer('Client.Layouts.layout',function ($menu){
            if (Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $menu->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty,
                ]);
            }
        });
        view()->composer('Client.Home.checkout',function ($menu){
            if (Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $menu->with([
                    'cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty,
                ]);
            }
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
