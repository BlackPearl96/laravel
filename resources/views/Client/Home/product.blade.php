@extends ('Client.Layouts.layout')
@section('product')
    {{--<div class="header-bottom" style="background-color: #0277b8;">--}}
        {{--<div class="container">--}}
            {{--<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>--}}
            {{--<div class="visible-xs clearfix"></div>--}}
            {{--<nav class="main-menu">--}}
                {{--<ul class="l-inline ov">--}}
                    {{--<li><a href="{{route('index')}}">Trang chủ</a></li>--}}
                    {{--<li><a href="#">Sản phẩm</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li><a href="">Sản phẩm 1</a></li>--}}
                            {{--<li><a href="">Sản phẩm 2</a></li>--}}
                            {{--<li><a href="">Sản phẩm 4</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{route('about')}}">Giới thiệu</a></li>--}}
                    {{--<li><a href="{{route('contacts')}}">Liên hệ</a></li>--}}
                {{--</ul>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</nav>--}}
        {{--</div> <!-- .container -->--}}
    {{--</div> <!-- .header-bottom -->--}}
    {{--</div> <!-- #header -->--}}
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$products->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('index')}}">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="client/image/product/{{$products->image_featured}}"
                             alt="" height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{$products->name}}</h2></p>
                            <br>
                            <p class="single-item-price" style="font-size: 18px">
                                @if($products->price_promotion==0)
                                    <span class="flash-sale">{{number_format($products->price)}} Đồng</span>
                                @else
                                    <span class="flash-del">{{number_format($products->price)}} Đồng</span>
                                    <span class="flash-sale">{{number_format($products->price_promotion)}} Đồng</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$products->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Options:</p>
                        <div class="single-item-options">

                            <select class="wc-select" name="color">
                                <option>Số Lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('cart',$products->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$products->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>

                    <div class="row">
                        @foreach($related_Products as $rel)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($rel->price_promotion != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">sale</div>
                                    </div>
                                @endif
                                <div class="single-item-header">
                                    <a href=""><img src="client/image/product/{{$rel->image_featured}}"
                                                    alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$rel->name}}</p>
                                    <p class="single-item-price" style="font-size: 18px">
                                        @if($rel->price_promotion == 0)
                                            <span>{{number_format($rel->price)}} Đồng</span>
                                        @else
                                            <span class="flash-del">{{number_format($rel->price)}} Đồng</span>
                                            <span class="flash-sale">{{number_format($rel->price_promotion)}} Đồng</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('product',$rel->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('product',$rel->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        <div class="row">{{$related_Products->links()}}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/1.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/2.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/3.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href=""><img src="client/assets/dest/images/products/sales/4.png" alt=""></a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
    @stop