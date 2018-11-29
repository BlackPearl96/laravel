@extends('admin.layouts.layout')
@section('menu')
    @include('admin.layouts.menu')
    @stop
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>{{$user->name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/user/sua/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Username" value="{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly="" type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{$user->email}}" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="changePassword" name="changePassword">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control password" name="password" placeholder="Please Enter Password" disabled=""  />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="passwordAgain" placeholder="Please Enter RePassword" disabled="" />
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" checked="" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="2" type="radio">Member
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")){
                    $(".password").removeAttr('disabled')
                }
                else {
                    $(".password").attr('disabled','');
                }
            })
        });
    </script>
    @endsection