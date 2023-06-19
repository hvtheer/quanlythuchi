@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Receipt's information
                    <a href="{{ url('admin/receipt') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$receipt->id}}</td>
                    </tr>
                    <tr>
                        <th>Household's ID</th>
                        <td>{{$receipt->householdId}}</td>
                    </tr>
                    <tr>
                        <th>Person's ID</th>
                        <td>{{$receipt->personId}}</td>
                    </tr>
                    <tr>
                        <th>Fee's ID</th>
                        <td>{{$receipt->feeId}}</td>
                    </tr>
                    <tr>
                        <th>Collecter's ID</th>
                        <td>{{$receipt->collecterId}}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>{{$receipt->amount}}</td>
                    </tr>
                    <tr>
                        <th>Note</th>
                        <td>{{$receipt->note}}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{$receipt->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>{{$receipt->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
