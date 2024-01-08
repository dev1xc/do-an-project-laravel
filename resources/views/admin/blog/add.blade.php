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
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Title</label>
                    <div class="col-md-12">
                        <input type="text" value="" class="form-control form-control-line" name="title">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-md-12">Image</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control form-control-line" name="image">
                        </div>
                    </div>
                    <br>
                    <label class="col-md-12">Description</label>
                    <div class="col-md-12">
                        <textarea name="description" id="demo" cols="65" rows="5"></textarea>
                    </div>
                    <br>
                    <label class="col-md-12">Content</label>
                    <div class="col-md-12">
                        <textarea name="content" id="editor1" rows="10" cols="80"></textarea>
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
