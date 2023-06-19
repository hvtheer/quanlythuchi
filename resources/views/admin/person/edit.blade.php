@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit person's infomation
                    <a href="{{ url('admin/person') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/person/'.$person->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>First name</label>
                            <input type="text" name="firstName" value="{{ $person->firstName }}" class="form-control" />
                            @error('firstName') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Last name</label>
                            <input type="text" name="lastName" value="{{ $person->lastName }}" class="form-control" />
                            @error('lastName') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Card's ID</label>
                            <input type="text" name="idCard" value="{{ $person->idCard }}" class="form-control" />
                            @error('idCard') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Date of birth</label>
                            <input type="date" name="dateOfBirth" value="{{ $person->dateOfBirth }}" class="form-control" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}"/>
                            @error('dayOfBirth') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Avatar</label>
                            <input type="file" name="avatar" class="form-control" />
                            <img src="{{ asset($person->avatar) }}" width="60px" height="60px">
                            @error('avatar') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gender</label><br />
                            <input type="checkbox" name="gender" {{ $person->gender ? 'checked':'' }} /> FEMALE:check, MALE:uncheck
                            @error('gender') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $person->email }}" class="form-control" />
                            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Number phone</label>
                            <input type="text" name="numberPhone" value="{{ $person->numberPhone }}" class="form-control" />
                            @error('numberPhone') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $person->address }}" class="form-control" />
                            @error('address') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ethnic</label>
                            <input type="text" name="ethnic" value="{{ $person->ethnic }}" class="form-control" />
                            @error('ethnic') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nationality</label>
                            <input type="text" name="nationality" value="{{ $person->nationality }}" class="form-control" />
                            @error('nationality') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Occupation</label>
                            <input type="text" name="occupation" value="{{ $person->occupation }}" class="form-control" />
                            @error('occupation') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Education level</label>
                            <input type="text" name="educationLevel" value="{{ $person->educationLevel }}" class="form-control" />
                            @error('educationLevel') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Marital status</label><br />
                            <input type="checkbox" name="maritalStatus" {{ $person->maritalStatus ? 'checked':'' }}/> MARRIED:check, SINGLE:uncheck
                            @error('maritalStatus') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status" {{ $person->status ? 'checked':'' }}/> DEAD:check, ALIVE:uncheck
                            @error('status') <small class="text-danger">{{ $message }}</small>@enderror
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
