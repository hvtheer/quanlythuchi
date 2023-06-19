@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Temporary residence and absence
                    <a href="{{ url('admin/temporary/create') }}" class="btn btn-primary btn-sm float-end">Add new</a>
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
                            <th>Household's ID</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($temps as $temp)
                            <td>{{ $temp->id }}</td>
                            <td>{{ $temp->personId }}</td>
                            <td>{{ $temp->householdId }}</td>
                            <td>{{ $temp->startDate }}</td>
                            <td>
                                <a href="{{ url('admin/temporary/'.$temp->id.'/edit') }}"
                                    class="btn btn-success">Edit</a>
                                <a class="btn btn-primary" href="{{ url('admin/temporary/'.$temp->id.'/show') }}">Info</a>
                                <a href="{{ url('admin/temporary/'.$temp->id.'/delete') }}"
                                    onclick="return confirm('Are you sure, you want to delete this data?')"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination">
                    {{ $temps->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
