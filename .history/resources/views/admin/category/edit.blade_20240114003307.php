@extends('admin.layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <form method="post">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Country</label>
                    <div class="col-md-12">
                        <input type="text" value="{{ $data -> name }}" class="form-control form-control-line" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success" type="submit">Add Country</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
