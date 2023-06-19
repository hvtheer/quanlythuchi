@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Temporary residence and absence's information
                    <a href="{{ url('admin/temporary') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$temp->id}}</td>
                    </tr>
                    <tr>
                        <th>Person's ID</th>
                        <td>{{$temp->personId}}</td>
                    </tr>
                    <tr>
                        <th>Household's ID</th>
                        <td>{{$temp->householdId}}</td>
                    </tr>
                    <tr>
                        <th>Start date</th>
                        <td>{{$temp->startDate}}</td>
                    </tr>
                    <tr>
                        <th>End date</th>
                        <td>{{$temp->endDate}}</td>
                    </tr>
                    <tr>
                        <th>Reason</th>
                        <td>{{$temp->reason}}</td>
                    </tr>
                    <tr>
                        <th>Temporary residence or absence's address</th>
                        <td>{{$temp->tempAbsenceAddress}}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{$temp->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>{{$temp->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
