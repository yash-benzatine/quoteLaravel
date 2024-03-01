@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Social id
                            </th>
                            <th>
                                Login type
                            </th>
                            <th>
                                Device type
                            </th>
                            <th>
                                Created at (UTC)
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->social_id }}
                                </td>
                                <td>
                                    {{ $user->login_type }}
                                </td>
                                <td>
                                    {{ $user->device_type }}
                                </td>
                                <td class="project-state">
                                    {{ $user->created_at }}
                                </td>
                                <td class="project-actions row" style="display: flex;justify-content:center;align-items: center;">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </section>
@endsection
