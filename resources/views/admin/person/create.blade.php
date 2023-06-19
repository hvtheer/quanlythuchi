@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add person
                    <a href="{{ url('admin/person') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/person') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>First name</label>
                            <input type="text" name="firstName" class="form-control" />
                            @error('firstName') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Last name</label>
                            <input type="text" name="lastName" class="form-control" />
                            @error('lastName') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Card's ID</label>
                            <input type="text" name="idCard" class="form-control" />
                            @error('idCard') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Date of birth</label>
                            <input type="date" name="dateOfBirth" class="form-control" placeholder="yyyy-mm-dd" pattern="\d{4}-\d{2}-\d{2}"/>
                            @error('dayOfBirth') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Avatar</label>
                            <input type="file" name="avatar" class="form-control" />
                            @error('avatar') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gender</label><br />
                            <input type="checkbox" name="gender"/> FEMALE:check, MALE:uncheck
                            @error('gender') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" />
                            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Number phone</label>
                            <input type="text" name="numberPhone" class="form-control" />
                            @error('numberPhone') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" />
                            @error('address') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ethnic</label>
                            <input type="text" name="ethnic" class="form-control" />
                            @error('ethnic') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nationality</label>
                            <input type="text" name="nationality" class="form-control" />
                            @error('nationality') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Occupation</label>
                            <input type="text" name="occupation" class="form-control" />
                            @error('occupation') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Education level</label>
                            <input type="text" name="educationLevel" class="form-control" />
                            @error('educationLevel') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Marital status</label><br />
                            <input type="checkbox" name="maritalSatus"/> MARRIED:check, SINGLE:uncheck
                            @error('status') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status</label><br />
                            <input type="checkbox" name="status"/> DEAD:check, ALIVE:uncheck
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
