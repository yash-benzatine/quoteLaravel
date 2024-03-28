@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Themes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Themes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="{{ route('themes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Theme Name</label>
                                <input type="text" id="inputName" name="name" class="form-control" autocomplete="off"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Theme Image</label>
                                <input type="file" id="inputImage" name="image" class="form-control" required>
                                <img class="table-avatar mt-3" id="theme-img-tag" height="100" width="100" src="#"
                                    style="display: none">
                            </div>
                            <div class="form-group float-left">
                                <label for="inputDescription">Is Purchase (Select this if purches)</label>
                                <input type="checkbox" id="inputIsPurchase" name="is_purchase" class="form-control ml-3"
                                    style="height: 20px; width: 20px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('themes.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Add Themes" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#theme-img-tag').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                $('#theme-img-tag').css('display', "block");
            }
        }

        $("#inputImage").change(function() {
            readURL(this);
        });
    </script>
@endsection
