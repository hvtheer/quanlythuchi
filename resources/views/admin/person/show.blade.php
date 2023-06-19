@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Person's information
                    <a href="{{ url('admin/person') }}" class="btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <td>{{$person->id}}</td>
                    </tr>
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <img src="{{ asset($person->avatar) }}" style="width: 100px; height: 100px" alt="Avatar" >
                        </td>
                    </tr>
                    <tr>
                        <th>Card's ID</th>
                        <td>{{$person->idCard}}</td>
                    </tr>
                    <tr>
                        <th>First name</th>
                        <td>{{$person->firstName}}</td>
                    </tr>
                    <tr>
                        <th>Last name</th>
                        <td>{{$person->lastName}}</td>
                    </tr>
                    <tr>
                        <th>D.O.B</th>
                        <td>{{$person->dateOfBirth}}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>{{ $person->gender ? 'Female':'Male'}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$person->email}}</td>
                    </tr>
                    <tr>
                        <th>Number phone</th>
                        <td>{{$person->numberPhone}}</td>
                    </tr>
                    <tr>
                        <th>Ethnic</th>
                        <td>{{$person->ethnic}}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{$person->nationality}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$person->address}}</td>
                    </tr>
                    <tr>
                        <th>Occupation</th>
                        <td>{{$person->occupation}}</td>
                    </tr>
                    <tr>
                        <th>Educational level</th>
                        <td>{{$person->educationLevel}}</td>
                    </tr>
                    <tr>
                        <th>Marital status</th>
                        <td>{{$person->maritalStatus ? 'Married':'Single'}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$person->status ? 'Dead':'Alive'}}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{$person->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td>{{$person->updated_at}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
