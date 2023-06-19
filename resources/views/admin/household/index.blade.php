@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Household
                    <a href="{{ url('admin/household/create') }}" class="btn btn-primary btn-sm float-end">Add household</a>
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
                            <th>Owner</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($households as $household)
                            <td>{{ $household->id }}</td>
                            <td>ABC</td>
                            <td>{{ $household->address }}</td>
                            <td>
                                <a href="{{ url('admin/household/'.$household->id.'/edit') }}"
                                    class="btn btn-success">Edit</a>
                                <a class="btn btn-primary" href="{{ url('admin/household/'.$household->id.'/show') }}">Info</a>
                                <a href="{{ url('admin/household/'.$household->id.'/delete') }}"
                                    onclick="return confirm('Are you sure, you want to delete this data?')"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination">
                    {{ $households->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
