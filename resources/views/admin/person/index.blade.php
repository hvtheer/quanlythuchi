@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Person
                    <a href="{{ url('admin/person/create') }}" class="btn btn-primary btn-sm float-end">Add person</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
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
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Card's ID</th>
                                <th>D.O.B</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($persons as $person)
                                <td>{{ $person->id }}</td>
                                <td>
                                    <img src="{{ asset($person->avatar) }}" style="width: 40px; height: 40px" alt="Avatar" >
                                </td>
                                <td>{{ $person->firstName }} {{ $person->firstName }}</td>
                                <td>{{ $person->idCard }}</td>
                                <td>{{ $person->dateOfBirth }}</td>
                                <td>
                                    <a href="{{ url('admin/person/'.$person->id.'/edit') }}"
                                        class="btn btn-success">Edit</a>
                                    <a class="btn btn-primary" href="{{ url('admin/person/'.$person->id.'/show') }}">Info</a>
                                    <a href="{{ url('admin/person/'.$person->id.'/delete') }}"
                                        onclick="return confirm('Are you sure, you want to delete this data?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="pagination">
                        {{ $persons->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
