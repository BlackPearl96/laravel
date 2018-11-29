<?php
/**
 * Created by PhpStorm.
 * User: van96
 * Date: 5/20/2018
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(){
        return view('Client.Home.index');
    }
    function product(){
        return view('Client.Home.product');
    }
    function type(){
        return view('Client.Home.type');
    }
    function login(){
        return view('Client.Home.login');
    }
    function prices(){
        return view('Client.Home.prices');
    }
    function signup(){
        return view('Client.Home.signup');
    }
    function cart(){
        return view('Client.Home.cart');
    }
    function error404(){
        return view('Client.Home.404');
    }
    function about(){
        return view('Client.Home.about');
    }
    function checkout(){
        return view('Client.Home.checkout');
    }
    function contacts(){
        return view('Client.Home.contacts');
    }
}