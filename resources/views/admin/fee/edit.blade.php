@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit fee's information
                    <a href="{{ url('admin/fee') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/fee/'.$fee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $fee->name }}" class="form-control" />
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Amount</label>
                            <input type="number" name="amount" value="{{ $fee->amount }}" class="form-control" />
                            @error('amount') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Mandatory</label>
                            <input type="checkbox" name="isMandatory" {{ $fee->isMandatory ? 'checked':'' }}/>
                            @error('isMandatory') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Start date</label>
                            <input type="date" name="startDate" value="{{ $fee->startDate }}" class="form-control" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}"/>
                            @error('startDate') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>End date</label>
                            <input type="date" name="endDate" value="{{ $fee->endDate }}" class="form-control" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}"/>
                            @error('endDate') <small class="text-danger">{{ $message }}</small>@enderror
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
