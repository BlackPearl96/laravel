<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Client;

class UsersController extends Controller
{

    public function getDanhsach(){
        $user = User::all();
        return view('admin.user.danhsach',compact('user'));
    }
    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên thể loại phải từ 3->100 kí tự',

                'email.required'=>'Bạn chưa nhập email',
                'email.unique'=>'Email đã tồn tại',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',

                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải ít nhất 3 kí tự',
                'password.max'=>'Mật khẩu không đc vượt quá 32 kí tự',

                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
            ]);

        $user = new User();
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->gender = 0;
        $user->dateofbirth = $request->brithday;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',compact('user'));
    }
    public function postSua(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|max:100'
        ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên thể loại phải từ 3->100 kí tự',

            ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        if ($request->changePassword == "on" ) {
            $request->validate([
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
                [
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'password.min'=>'Mật khẩu phải ít nhất 3 kí tự',
                    'password.max'=>'Mật khẩu không đc vượt quá 32 kí tự',

                    'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
                ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
    }
    public function Logout(){
        Auth::logout();
        return redirect('/');
    }
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập pass',
            'password.min'=>'Mk phải chứa ít nhất 3 kí tự'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('admin/index');
        }
        else{
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
    }
}
