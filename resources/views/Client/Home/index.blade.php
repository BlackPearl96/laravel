@extends ('Client.Layouts.layout')
@section('title')
    Home
@stop
@section('main')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($new_product)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>


                            <div class="row">
                                @foreach($new_product as $new)
                                    <div class="col-md-3">
                                        <div class="single-item">
                                            @if($new->price_promotion!=0)
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">sale</div>
                                            </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('product',$new->id)}}">
                                                    <img style="height: 250px; margin:10px 0; "
                                                         src="client/image/product/{{$new->image_featured}}"
                                                         alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$new->name}}</p>
                                                <p class="single-item-price" style="font-size: 18px">
                                                    @if($new->price_promotion==0)
                                                    <span class="flash-sale">{{number_format($new->price)}} Đồng</span>
                                                        @else
                                                        <span class="flash-del">{{number_format($new->price)}} Đồng</span>
                                                        <span class="flash-sale">
                                                            {{number_format($new->price_promotion)}} Đồng</span>
                                                        @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('cart',$new->id)}}">
                                                    <i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('product',$new->id)}}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$new_product->links()}}</div>

                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Top Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($top_product)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($top_product as $top)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>

                                        <div class="single-item-header">
                                            <a href="{{route('product',$top->id)}}">
                                                <img style="height: 250px;margin: 10px 0;" src="client/image/product/{{$top->image_featured}}"
                                                        alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$top->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">
                                                <span class="flash-del">{{number_format($top->price)}} Đồng</span>
                                                <span class="flash-sale">{{number_format($top->price_promotion)}} Đồng</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('cart',$top->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product',$top->id)}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>



                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@stop
@section('slider')
    @include('Client.Layouts.slide')
@stop
