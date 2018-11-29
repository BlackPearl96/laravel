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
                        <th>Tên </th>
                        <th>Gender </th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @foreach($cus as $item)
                        <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{$item->id}}</td>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customers/xoa/{{$item->id}}"> Delete</a></td>
                        </tr>
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