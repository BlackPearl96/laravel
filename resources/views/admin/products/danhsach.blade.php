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
                    <small>List</small>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Category_ID</th>
                    <th>Tên</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                @foreach($products as $pr)
                <tbody>
                <tr class="odd gradeX" align="center">
                    <td>{{$pr->id}}</td>
                    <td>{{$pr->category_id}}</td>
                    <td>{{$pr->name}}</td>
                    <td>{{$pr->price}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/products/xoa/{{$pr->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/products/sua/{{$pr->id}}">Edit</a></td>
                </tr>
                {{--<tr class="even gradeC" align="center">--}}
                    {{--<td>2</td>--}}
                    {{--<td>Bóng Đá</td>--}}
                    {{--<td>Thể Thao</td>--}}
                    {{--<td>Ẩn</td>--}}
                    {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
                    {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>--}}
                {{--</tr>--}}
                </tbody>
                    @endforeach
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    @endsection