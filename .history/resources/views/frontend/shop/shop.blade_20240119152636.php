@extends('frontend.layouts.main')
@include('frontend.shop.jquery')
@section('content')
@php
    foreach ($data as $item) {
        $item['image'] = json_decode($item['image'], true);
    }
@endphp
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Sportswear
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Nike </a></li>
                                            <li><a href="">Under Armour </a></li>
                                            <li><a href="">Adidas </a></li>
                                            <li><a href="">Puma</a></li>
                                            <li><a href="">ASICS </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Mens
                                        </a>
                                    </h4>
                                </div>
                                <div id="mens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Fendi</a></li>
                                            <li><a href="">Guess</a></li>
                                            <li><a href="">Valentino</a></li>
                                            <li><a href="">Dior</a></li>
                                            <li><a href="">Versace</a></li>
                                            <li><a href="">Armani</a></li>
                                            <li><a href="">Prada</a></li>
                                            <li><a href="">Dolce and Gabbana</a></li>
                                            <li><a href="">Chanel</a></li>
                                            <li><a href="">Gucci</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Womens
                                        </a>
                                    </h4>
                                </div>
                                <div id="womens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="">Fendi</a></li>
                                            <li><a href="">Guess</a></li>
                                            <li><a href="">Valentino</a></li>
                                            <li><a href="">Dior</a></li>
                                            <li><a href="">Versace</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Kids</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Fashion</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Households</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Interiors</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Clothing</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Bags</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                                </div>
                            </div>
                        </div><!--/category-productsr-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0"
                                    data-slider-max="1000" data-slider-step="5" data-slider-value="[250,1000]"
                                    id="sl2"><br />
                                <b>0</b> <b class="pull-right">1000</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <form method="GET" action="/search">
                        @csrf

                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name"><br>
                        <label for="category">Category</label>
                        <select name="category">
                            <option selected>Chua chon</option>
                            @foreach ($data_category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="category">Brand</label>
                        <select name="brand">
                            <option selected>Chua chon</option>
                            @foreach ($data_brand as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="category">Price</label>
                        <select name="price">
                            <option value="0" selected>Chua chon</option>
                            <option value="0-1000"> < 1000</option>
                            <option value="1000-2000">1000-2000</option>
                            <option value="2000-10000">2000-10000</option>
                        </select>

                        <br>
                        <button type="submit">Search</button>
                    </form>
                    <br><br><br>
                    <div class="features_items"><!--features_items-->

                        @foreach ($data as $item)
                        <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products" id="{{ $item -> id }}">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('/upload/product/' . $item->id_user . '/' . $item->image[0]) }}"/>
                                    <h2>{{ $item -> name }}</h2>
                                    <p>{{ $item -> price }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ $item -> name }}</h2>
                                        <p>{{ $item -> price }}</p>
                                        <a class="btn btn-default add-to-cart" id="{{ $item -> id }}"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                        <a href="/detail-product/{{ $item -> id }}" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Detail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        @endforeach


                    </div><!--features_items-->
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
