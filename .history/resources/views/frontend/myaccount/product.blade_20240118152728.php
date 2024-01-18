@extends('frontend.layouts.main')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Account</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="/my-account/update">account</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="/my-account/product">My product</a></h4>
                            </div>
                        </div>

                    </div><!--/category-products-->


                </div>
            </div>
            <a href="/my-account/add-product">Add</a>
            <div class="col-sm-9">
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">id</td>
                                <td class="description">name</td>
                                <td class="price">image</td>
                                <td class="quantity">price</td>
                                <td class="total">Action</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="cart_product">
                                    {{ $product -> id }}
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $product -> name }}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <img src="{{ asset('/upload/product/' . $product->id_user . '/' . $product['image'][0])"
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $product -> price }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="/my-account/edit/{{ $product->id }}"><i class="fa fa-edit"></i></a>
                                    <a class="cart_quantity_delete" href="/my-account/delete/{{ $product -> id }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products -> links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
