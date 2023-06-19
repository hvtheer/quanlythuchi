@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit temporary residence and absence's infomation
                    <a href="{{ url('admin/temporary') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/temporary/'.$temp->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Person's ID</label>
                            <input type="text" name="personId" value="{{ $temp->personId }}" class= "form-control" />
                            @error('personId') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Household's ID</label>
                            <input type="text" name="householdId" value="{{ $temp->householdId }}" class= "form-control" />
                            @error('householdId') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Start date</label>
                            <input type="date" name="startDate" value="{{ $temp->startDate }}" class= "form-control" />
                            @error('startDate') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>End date</label>
                            <input type="date" name="endDate" value="{{ $temp->endDate }}" class= "form-control" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}"/>
                            @error('endDate') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-6">
                            <label>Reason</label>
                            <input type="text" name="reason" value="{{ $temp->reason }}" class= "form-control" />
                            @error('reason') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Temporary absence's address</label><br />
                            <input type="text" name="tempAbsenceAddress" value="{{ $temp->tempAbsenceAddress }}" class= "form-control" />
                            @error('tempAbsenceAddress') <small class="text-danger">{{ $message }}</small>@enderror
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
