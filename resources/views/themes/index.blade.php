@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Themes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Themes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('themes.create') }}" class="btn btn-success float-right">Create New Theme</a>
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
                            <th style="width: 10%">
                                Theme name
                            </th>
                            <th style="width: 40%">
                                Theme img
                            </th>
                            <th style="width: 10%">
                                Is purchase
                            </th>
                            <th style="width: 20%">
                                Created at (UTC)
                            </th>
                            <th style="width: 20%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <p class="imglist">
                            @foreach ($themes as $key => $theme)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $theme->theme_name }}
                                    </td>
                                    <td>
                                        <a href="{{ asset($theme->theme_img) }}" data-fancybox="group"
                                            data-caption="{{ $theme->theme_name }}">
                                            <img alt="Avatar" class="table-avatar" src="{{ asset($theme->theme_img) }}" />
                                        </a>
                                    </td>
                                    <td>
                                        {{ $theme->is_purchase ? 'on' : 'off' }}
                                    </td>
                                    <td class="">
                                        {{ $theme->created_at }}
                                    </td>
                                    <td style="display: flex;align-items: center;justify-content: center;">
                                        <a class="btn btn-info btn-sm" href="{{ route('themes.edit', $theme->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="{{ route('themes.destroy', $theme->id) }}" method="POST">
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
