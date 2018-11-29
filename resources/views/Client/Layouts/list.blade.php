<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$name->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Home</a> / <span>Sản phẩm </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($menu as $menu)
                        <li><a href="{{route('type',$menu->id)}}">{{$menu->name}}</a></li>
                            @endforeach

                    </ul>
                </div>