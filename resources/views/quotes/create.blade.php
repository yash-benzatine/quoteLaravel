@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Quotes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Quotes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="{{ route('quotes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Quote Name</label>
                                <input type="text" id="inputName" name="quote" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Category Name</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Please select category</option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('quotes.index') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Add Quote" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection
