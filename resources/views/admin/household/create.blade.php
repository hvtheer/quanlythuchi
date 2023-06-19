@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add household
                    <a href="{{ url('admin/household') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/household') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" />
                            @error('address') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12">
                            <h4>Members</h4>
                        </div>
                        <table class="table table-bordered table-striped" id="table">
                            <tr>
                                <th>Person's ID</th>
                                <th>Relationship</th>
                                <th>Owner</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="members[]['personId']" placeholder="Enter person's ID" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="members[]['relationship']" placeholder="Enter relationship with the owner" class="form-control">
                                </td>
                                <td>
                                    <input type="checkbox" name="members[]['isOwner']">
                                </td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                                </td>
                            </tr>
                        </table>
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

@section('scripts')
<script>
    var i = 0;
    $('#add').click( function() {
        ++i;
        $('#table').append(
            `<tr>
                <td>
                    <input type="text" name="members[`+i+`]['personId']" placeholder="Enter person's ID" class="form-control">
                </td>
                <td>
                    <input type="text" name="members[`+i+`]['relationship']" placeholder="Enter relationship with the owner" class="form-control">
                </td>
                <td>
                    <input type="checkbox" name="members[`+i+`]['isOwner']">
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                </td>
                </tr>`)
    });

    $(document).on('click','.remove-table-row', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection