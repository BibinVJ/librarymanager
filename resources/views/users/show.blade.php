@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View User') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <p>Name : {{ $user->first_name . ' ' . $user->last_name }}</p>
                        <p>Email : {{$user->email}}</p>
                        <p>Phone No : {{$user->email}}</p>
                        <p>Address : {{$user->email}}</p>
                        <p>Status :
                            @if($user->user_status == 1)
                                Active
                            @elseif($user->user_status == 0)
                                In Active
                            @endif
                        </p>
                        <p>Last Log in : {{$user->last_logged_in}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
