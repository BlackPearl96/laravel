@extends ("Client.Layouts.layout")
 @section('login')
     <div class="inner-header">
         <div class="container">
             <div class="pull-left">
                 <h6 class="inner-title">Đăng nhập</h6>
             </div>
             <div class="pull-right">
                 <div class="beta-breadcrumb">
                     <a href="{{route('index')}}">Home</a> / <span>Đăng nhập</span>
                 </div>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
     @if(count($errors)>0)
         <div class="alert alert-danger">
             @foreach($errors->all() as $err)
                 {{$err}}<br>
             @endforeach
         </div>
     @endif
     @if(session('thongbao'))
         <div class="alert alert-danger">
             {{session('thongbao')}}
         </div>
     @endif

     <div class="container">
         <div id="content">

             <form action="admin/login" method="post" class="beta-form-checkout">
                 <input type='hidden' name="_token" value="{{csrf_token()}}">
                 <div class="row">
                     <div class="col-sm-3"></div>
                     <div class="col-sm-6">
                         <h4>Đăng nhập</h4>
                         <div class="space20">&nbsp;</div>


                         <div class="form-block">
                             <label for="email">Email address*</label>
                             <input type="email" id="email" required>
                         </div>
                         <div class="form-block">
                             <label for="phone">Password*</label>
                             <input type="password" id="phone" required>
                         </div>
                         <div class="form-block">
                             <button type="submit" class="btn btn-primary">Login</button>
                         </div>
                     </div>
                     <div class="col-sm-3"></div>
                 </div>
             </form>
             <script>
                 $(document).ready(function() {
                     $('#dataTables-example').DataTable({
                         responsive: true
                     });
                 });
             </script>
         </div> <!-- #content -->
     </div> <!-- .container -->
        @stop