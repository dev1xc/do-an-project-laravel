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
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $data -> name }}" class="form-control form-control-line" name="name">
                            </div>
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{ $data -> email }}" class="form-control form-control-line" name="email">
                            </div>
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" value="{{ $data -> password }}" class="form-control form-control-line" name="password">
                            </div>
                            <label class="col-md-12">Phone</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $data -> phone }}" class="form-control form-control-line" name="phone">
                            </div>
                            <label class="col-md-12">Address</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $data -> address }}" class="form-control form-control-line" name="address">
                            </div>
                            <label class="col-md-12">File</label>
                            <div class="col-md-12">
                                <input type="file" value="{{ $data -> avatar }}" class="form-control form-control-line" name="avatar">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Country</label>
                                <div class="col-sm-12">

                                <select class="form-control form-control-line" name="id_country">
                                    @foreach ($country as $ct)
                                    <option value="{{ $ct -> id }}"
                                        @if (($ct -> id )== ($data -> id_country)))
                                        selected="selected"
                                    @endif
                                    >{{ $ct -> name }}</option>
                                @endforeach
                            </select>
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
