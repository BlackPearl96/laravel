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
                    <h1 class="page-header">Category
                        <small>Edit</small>

                    </h1>
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
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/products/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Category Products</label>
                            <input class="form-control" name="category_id" placeholder="Nhập thể loại sản phẩm..."  />
                        </div>
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name" placeholder="Nhập tên sản phẩm..."  />
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" name="price" placeholder="Nhập giá..."  />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Thêm ảnh..." />
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <input class="form-control" name="detail" placeholder="Nhập chi tiết sản phẩm...."  />
                        </div>
                        <button type="submit" class="btn btn-default">Category Edit</button>
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
