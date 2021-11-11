@include ('layouts.user.app_navigation')
@extends ('layouts.user.app')
@section('content')

<div class="text-center my-5">
    <h1>Edit Post </h1>
    <hr />
</div>
<section class="w-100 p-4 d-flex justify-content-center pb-4">
    <form method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$blog->id}}" name="id">
        <!-- Title input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example1">Title</label>
            <input type="text" id="form4Example1" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $blog->title}}" />
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <!-- Category input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example2">Category</label>
            <input type="text" id="form4Example2" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $blog->category }}" />
            @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <!-- Description input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form4Example3">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="form4Example3" rows="4" autofocus>{{ $blog->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <!-- Image-->
        <label class="form-label" for="customFile">Upload Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="customFile" /><br>
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</section>
@show