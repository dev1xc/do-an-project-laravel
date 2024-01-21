<div class="features_items">

    {{-- @foreach ($data as $item)
       <div class="col-sm-4">
          <div class="product-image-wrapper">
             <div class="single-products" id="{{ $item->id }}">
                <div class="productinfo text-center">
                   <img src="{{ asset('/upload/product/' . $item->id_user . '/' . $item->image[0]) }}" />
                   <h2>{{ $item->name }}</h2>
                   <p>{{ $item->price }}</p>
                   <a href="#" class="btn btn-default add-to-cart"><i
                         class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                   <div class="overlay-content">
                      <h2>{{ $item->name }}</h2>
                      <p>{{ $item->price }}</p>
                      <a class="btn btn-default add-to-cart" id="{{ $item->id }}"><i
                            class="fa fa-shopping-cart"></i>Add to cart</a>
                      <a href="/detail-product/{{ $item->id }}" class="btn btn-default add-to-cart"><i
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
    @endforeach --}}
    {{-- @include('frontend.shop.test') --}}

 </div>
