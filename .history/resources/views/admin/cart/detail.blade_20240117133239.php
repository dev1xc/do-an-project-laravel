@extends('admin.layouts.main')
@section('content')
@php
    $info = $data->saveData;
    print_r(session()->get('hehe'));
    print_r($info);
@endphp
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
                        {{-- <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">id_user</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($info as $category)
                                    <tr>
                                        <th scope="row">{{ $category -> product_id }}</th>
                                        <td>{{ $category -> quantity }}</td>
                                        <td>{{ $category -> price }}</td>
                                        <td><a href="/detail_cart/{{ $category -> imgae }}">detail</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
