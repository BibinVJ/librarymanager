@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="btn btn-info" href="{{ route('user.create') }}">
                                    New user
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>User Status</th>
                        <th>Last Login</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        // get current page for Paginator
                        $currentPage = (\Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage() - 1) * 10;
                    @endphp
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $currentPage + $key + 1 }}</td>
                            <td><a href="{{ route('user.show', $user->id) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_no }}</td>
                            <td>
                                @if($user->user_status == 1)
                                    Active
                                @elseif($user->user_status == 0)
                                    In Active
                                @endif
                            </td>
                            <td>{{ $user->last_logged_in }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="fa fa-edit">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="ml-2 btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <div style="margin-top: 10px;">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
            </div>
        </div>
    </div>
@endsection
