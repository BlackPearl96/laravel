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
                <h1 class="page-header">Category {{$products->Ten}}
                    <small>Edit</small>

                </h1>
                Sảm phẩm : {{$products->name}}
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
                <form action="admin/products/sua/{{$products->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Category Products</label>
                        <input class="form-control" name="category_id" placeholder="" value="{{$products->category_id}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" placeholder="" value="{{$products->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" placeholder="Please Enter Category Name" value="{{$products->price}}" />
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input class="form-control" name="image" placeholder="Please Enter Category Name" value="{{$products->image_featured}}" />
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input class="form-control" name="detail" placeholder="Please Enter Category Name" value="{{$products->detail}}" />
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
