@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Receipt
                    <a href="{{ url('admin/receipt/create') }}" class="btn btn-primary btn-sm float-end">Add new</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="" class="d-flex">
                        <input class="form-control me-1" type="search" name="search" placeholder="Search" value="{{ $search }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Person's ID</th>
                            <th>Fee's ID</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <td>{{ $receipt->id }}</td>
                            <td>{{ $receipt->personId }}</td>
                            <td>{{ $receipt->feeId }}</td>
                            <td> {{ $receipt->amount }} </td>
                            <td>
                                <a href="{{ url('admin/receipt/'.$receipt->id.'/edit') }}"
                                    class="btn btn-success">Edit</a>
                                <a class="btn btn-primary" href="{{ url('admin/receipt/'.$receipt->id.'/show') }}">Info</a>
                                <a href="{{ url('admin/receipt/'.$receipt->id.'/delete') }}"
                                    onclick="return confirm('Are you sure, you want to delete this data?')"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination">
                    {{ $receipts->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
