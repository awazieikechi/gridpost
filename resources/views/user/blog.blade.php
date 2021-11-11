@include ('layouts.user.app_navigation')
@extends ('layouts.user.app')

@section('content')
@include ('layouts.flash_message')
<div class="container">
    <div class="text-center my-5">
        <h1>Blog Posts </h1>
        <hr />
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('blog.show') }}"> Create Post</a>
            </div>

        </div>
    </div><br>

    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@show