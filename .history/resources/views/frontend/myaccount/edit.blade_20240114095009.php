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
            <div class="col-sm-9">
                <div class="table-responsive cart_info">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Product Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="name" value="{{ $product -> name }}">
                            </div>
                            <label class="col-md-12">Product Category</label>
                            <div class="col-md-12">
                                <select name="id_category">
                                    @foreach ($data_category as $category)
                                        <option value="{{ $category -> id }}">{{ $category ->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-12">Product Brand</label>
                            <div class="col-md-12">
                                <select name="id_brand">
                                    @foreach ($data_brand as $brand)
                                        <option value="{{ $brand -> id }}">{{ $brand ->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="col-md-12">Sale</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="sale">
                            </div>
                            <label class="col-md-12">Price</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" name="price">
                            </div>
                            <label class="col-md-12">Product Image</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-line" name="image" multiple>
                            </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success" type="submit">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
