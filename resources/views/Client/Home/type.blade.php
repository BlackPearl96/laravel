@extends ('Client.Layouts.layout')
@section('type')
    @include('Client.Layouts.list')

    <div class="col-sm-9">
        <div class="beta-products-list">
            <h4>New Products</h4>
            <div class="beta-products-details">
                <p class="pull-left">438 styles found</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach($categories as $type)
                <div class="col-sm-4">
                    <div class="single-item">
                        @if($type->price_promotion != 0)
                        <div class="ribbon-wrapper">
                            <div class="ribbon sale">sale</div>
                        </div>
                            @endif
                        <div class="single-item-header">
                            <a href="{{route('product',$type->id)}}">
                                <img src="client/image/product/{{$type->image_featured}}"
                                     alt="" height="250px"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$type->name}}</p>
                            <p class="single-item-price" style="font-size: 18px">
                                @if($type->price_promotion == 0)
                                    <span>{{number_format($type->price)}} Đồng</span>
                                @else
                                <span class="flash-del">{{number_format($type->price)}} Đồng</span>
                                <span class="flash-sale">{{number_format($type->price_promotion)}} Đồng</span>
                                    @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('product')}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        <div class="beta-products-list">
            <h4>Top Products</h4>
            <div class="beta-products-details">
                <p class="pull-left">{{count($categories_top)}} styles found</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach($categories_top as $top)
                    <div class="col-sm-4">
                        <div class="single-item">
                            @if($top->price_promotion != 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">sale</div>
                                </div>
                            @endif
                            <div class="single-item-header">
                                <a href="{{route('product',$top->id)}}">
                                    <img src="client/image/product/{{$top->image_featured}}"
                                         alt="" height="250px"></a>
                            </div>
                            <div class="single-item-body">
                                <p class="single-item-title">{{$top->name}}</p>
                                <p class="single-item-price" style="font-size: 18px">
                                    @if($top->price_promotion == 0)
                                        <span>{{number_format($top->price)}} Đồng</span>
                                    @else
                                        <span class="flash-del">{{number_format($top->price)}} Đồng</span>
                                        <span class="flash-sale">{{number_format($top->price_promotion)}} Đồng</span>
                                    @endif
                                </p>
                            </div>
                            <div class="single-item-caption">
                                <a class="add-to-cart pull-left" href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                <a class="beta-btn primary" href="{{route('product',$top->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">{{$categories_top->links()}}</div>
            <div class="space40">&nbsp;&nbsp;</div>

        </div> <!-- .beta-products-list -->
    </div>
    </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
    </div> <!-- #content -->
    </div> <!-- .container -->
        @stop