@extends ("Client.Layouts.layout")
    @section('signup')
        <div class="inner-header">
            <div class="container">
                <div class="pull-left">
                    <h6 class="inner-title">Đăng kí</h6>
                </div>
                <div class="pull-right">
                    <div class="beta-breadcrumb">
                        <a href="{{route('index')}}">Home</a> / <span>Đăng kí</span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="container">
            <div id="content">
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

                <form action="#" method="POST" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <h4>Đăng kí</h4>
                            <div class="space20">&nbsp;</div>


                            <div class="form-block">
                                <label>Name*</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" />
                            </div>

                            <div class="form-block">
                                <label for="your_last_name">Email*</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                            </div>

                            <div class="form-block">
                                <label for="adress">Password*</label>
                                <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                            </div>


                            <div class="form-block">
                                <label for="phone">RePassword*</label>
                                <input type="password" class="form-control" name="passwordAgain" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-block">
                                <label for="phone">Ngày Sinh*</label>
                                <input type="brithday" class="form-control" name="brithday" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="quyen" value="1"
                                       type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="0"
                                       type="radio">Member
                            </label>
                            </div>

                            <div class="form-block">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div> <!-- #content -->
        </div> <!-- .container -->
    @stop