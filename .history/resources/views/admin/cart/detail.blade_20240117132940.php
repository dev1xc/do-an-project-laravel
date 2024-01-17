@extends('admin.layouts.main')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Basic Table</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->

    <div class="container-fluid">
        <div class="form-group">
            <div class="col-sm-12">
                <button class="btn btn-success"><a href="/add-category">Cart</a></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default Table</h4>
                        <h6 class="card-subtitle">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</h6>
                        <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With Outside Padding</h6>
                        <div class="table-responsive">
                            <tbody>
                                @if (empty($data))
                                    {{ 'Khong co san pham' }}
                                @else
                                @foreach ($data as $item)
                                <tr id="{{ $item['product_id'] }}">
                                    <td class="cart_description">
                                        <h4><a href="">{{ $item['product_id'] }}</a></h4>
                                    </td>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ asset('/upload/product/image/'.$item['image']) }}" alt="" style="height: 100px"/></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $item['name'] }}</a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ $item['price'] }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <a class="cart_quantity_up" > + </a>
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item['quantity'] }}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down" > - </a>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ $item['quantity'] * $item['price'] }}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
