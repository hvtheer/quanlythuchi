@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit receipt's information
                    <a href="{{ url('admin/receipt') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/receipt/'.$receipt->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Household's ID</label>
                            <input type="text" name="householdId" class="form-control" />
                            @error('householdId') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Person's ID</label>
                            <input type="text" name="personId" class="form-control" />
                            @error('personId') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Fee's ID</label>
                            <input type="text" name="feeId" class="form-control" />
                            @error('feeId') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Collecter's ID</label>
                            <input type="text" name="collecterId" class="form-control" />
                            @error('collecter') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Amount</label>
                            <input type="number" name="amount" class="form-control" />
                            @error('amount') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Note</label>
                            <input type="text" name="note" class="form-control" />
                            @error('note') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
