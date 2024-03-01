@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Create New Category</a>
            </div>
        </div>
    </section>
    <section class="content">

        <div class="card">
            <div class="card-body p-0">
                <table class="table projects" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Category name
                            </th>
                            <th style="width: 30%">
                                Category img
                            </th>
                            <th style="width: 30%">
                                Created at (UTC)
                            </th>
                            <th style="width: 20%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <p class="imglist">
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $category->category_name }}
                                    </td>
                                    <td>
                                        <a href="{{ asset($category->category_thumbnail) }}" data-fancybox="group"
                                            data-caption="{{ $category->category_name }}">
                                            <img alt="Avatar" class="table-avatar"
                                                src="{{ asset($category->category_thumbnail) }}" />
                                        </a>
                                    </td>
                                    <td class="project-state">
                                        {{ $category->created_at }}
                                    </td>
                                    <td style="display: flex;align-items: center;justify-content: center;">
                                        <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <form action="{{ route('categories.destroy', $category->id) }}" onclick="return confirm('Are you sure to delete ths category?')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ml-2">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </p>
                    </tbody>
                </table>
            </div>

        </div>

    </section>
    
@endsection
