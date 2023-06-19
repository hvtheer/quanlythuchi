@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Fee's information
                    <a href="{{ url('admin/fee') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$fee->id}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$fee->name}}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>{{$fee->amount}}</td>
                    </tr>
                    <tr>
                        <th>Mandatory</th>
                        <td>{{$fee->mandatory ? 'Mandatory':'Voluntary'}}</td>
                    </tr>
                    <tr>
                        <th>Start date</th>
                        <td>{{$fee->startDate}}</td>
                    </tr>
                    <tr>
                        <th>End date</th>
                        <td>{{$fee->endDate}}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{$fee->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>{{$fee->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
