@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Household's information
                    <a href="{{ url('admin/household') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$household->id}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $household->address }}</td>
                    </tr>
                    <tr>
                        <th>Members' number</th>
                        <td>{{ $household->householdMembers->count() }}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{$household->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>{{$household->updated_at}}</td>
                    </tr>
                </table>
                <table class="table table-bordered table-striped" id="table">
                    <tr>
                        <th>Person's ID</th>
                        <th>Relationship</th>
                        <th>Owner</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($members as $member)
                        <tr>
                            <td>
                                <input type="text" name="members[]['personId']" value="{{ $member->personId }}" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="members[]['relationship']" value="{{ $member->relationship }}" class="form-control">
                            </td>
                            <td>
                                <input type="checkbox" name="members[]['isOwner']" {{ $member->isOwner ? 'checked':'' }}>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('admin/person/'.$member->personId.'/show') }}">Info</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
