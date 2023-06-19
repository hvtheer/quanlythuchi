@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit household's infomation
                    <a href="{{ url('admin/household') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/household/'.$household->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $household->address }}" class="form-control" />
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
                            @if ($members->count() > 0)
                                @foreach ($members as $member)
                                    <tr>
                                        <td>
                                            <input type="text" name="members[]['personId']" value="{{ $member->personId }}" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="members[]['relationship']" value="{{ $member->relationship }}" class="form-control">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="members[]['isOwner']" {{ $member->isOwner ? 'checked':'' }}>
                                        </td>
                                        @if ($member->isOwner)
                                        <td>
                                            <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                                        </td>
                                        @else
                                        <td>
                                            <button type="button" class="btn btn-danger remove-table-row">Remove</button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td>
                                    <input type="text" name="members[0]['personId']" placeholder="Enter person's ID" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="members[0]['relationship']" placeholder="Enter relationship with the owner" class="form-control">
                                </td>
                                <td>
                                    <input type="checkbox" name="members[0]['isOwner']">
                                </td>
                                <td>
                                    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                                </td>
                            </tr>
                            @endif
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