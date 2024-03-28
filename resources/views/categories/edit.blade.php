@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" id="inputName" name="name" class="form-control"
                                    value="{{ $category->category_name }}" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Category Image</label>
                                <input type="file" id="inputImage" name="image" class="form-control">
                                <img alt="Avatar" class="table-avatar mt-3" id="category-img-tag" height="100" width="100" src="{{ asset($category->category_thumbnail) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Edit Category" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#category-img-tag').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputImage").change(function() {
            readURL(this);
        });
    </script>
@endsection
