@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Books</h1>
                    </div>
                    @can('book.create')
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="btn btn-info" href="{{ route('book.create') }}">
                                    Add New Book
                                </a>
                            </li>
                        </ol>
                    </div>
                    @endcan
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
                <table class="table table-hover table-striped" id="tickets-table">
                    <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        @canany(['book.edit','book.delete',])
                            <th colspan="2">Action</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @php
                        // get current page for Paginator
                        $currentPage = (Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage() - 1) * 10;
                    @endphp
                    @foreach($books as $key => $book)
                        <tr>
                            <td>{{ $currentPage + $key + 1 }}</td>
                            <td><a class="" href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></td>
                            <td>{{$book->author}}</td>
                            @canany(['book.edit','book.delete',])
                                <td>
                                    <a href="{{ route('book.edit', $book->id) }}" class="fa fa-edit">Edit</a>
                                    <form action="{{ route('book.destroy', $book->id) }}" method="post"
                                          class="d-inline">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button class="ml-2 btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 10px;">
                    {{ $books->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
