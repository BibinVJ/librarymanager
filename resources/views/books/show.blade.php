@extends('layouts.admin')

@section('content')
    <style>
        .ticket-show-label {
            display: inline-block;
            width: 100px;
        }

        .ticket-show-value {
            font-weight: 700;
        }

        .ticketsContainer {
            border-radius: 3px 0 0 3px;
            color: #fff;
            margin-right: -0.55em;
            padding: 0.55em;
            position: absolute;
            right: 0;
            text-align: center;
            width: 100px;
            top: 5px;
            background-color: lightseagreen;
        }

        .float-right {
            float: right !important;
        }
    </style>
    <div class="content-wrapper mt-0">
        <div class="main-section-area">
            <div class="container wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <h2 class="text-center text-primary mt-6 mb-md-3">Book Details</h2>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    {{$book->title}}
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="tickets">
                                    <div class="ticket-content w-100">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="ticket-description">
                                                    <b><label for="description">Description:</label></b>
                                                    <div class="description-scroll">
                                                        <p></p>
                                                        <p>{{ $book->description }}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="ticket-divider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-primary">Details</h5>
                            </div>
                            <div class="card-body pt-0">
                                @can('book.borrow')
                                <div class="ticketsContainer float-right mr-2">
                                    <span> Borrow</span>
                                </div>
                                @endcan
                                <div class="mt-3">
                                    <span class="ticket-show-label">
                                        Author:
                                    </span>
                                    <span class="ticket-show-value">
                                        {{$book->author}}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    <span class="ticket-show-label">
                                        Stock:
                                    </span>
                                    <span class="ticket-show-value">
                                        2
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
