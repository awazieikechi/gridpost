@extends ('layouts.dashboard.app')
@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Blog Posts</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@show