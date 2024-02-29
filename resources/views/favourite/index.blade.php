@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Favourites</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Favourites</li>
                    </ol>
                </div>
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
                            <th>
                                Email
                            </th>
                            <th>
                                Quote
                            </th>
                            <th>
                                Created at
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($favourites as $key => $favourite)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $favourite->user->email }}
                                </td>
                                <td>
                                    {{ $favourite->quote->quote }}
                                </td>
                                <td class="project-state">
                                    {{ $favourite->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </section>
@endsection
