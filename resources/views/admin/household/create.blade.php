@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Thêm hộ khẩu
      <a href="{{ url('admin/household') }}" class="btn btn-danger btn-sm text-white float-right">Trở về</a>
    </h5>
    <div class="card-body">
      <form method="post" action="{{url('admin/household')}}">
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
              <label>Address</label>
              <input type="text" name="address" value="{{old('address')}}" class="form-control" />
              @error('address') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="col-md-12">
              <h4>Members</h4>
          </div>
          <table class="table table-bordered" id="table">
            <thead>
              <tr>
                <th>Person's ID</th>
                <th>Relationship</th>
                <th>Owner</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <tr>
                <td>
                  <select name="personId[]" class="form-control" required>
                    <option value="">Chọn nhân khẩu</option>
                    @foreach ($people as $person)
                    <option value="{{$person->id}}">{{$person->id}}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select name="relationship[]" class="form-control" required>
                    <option value="chuho">Chủ hộ</option>
                    <option value="vochong">Vợ (chồng)</option>
                    <option value="chamede">Cha đẻ, mẹ đẻ</option>
                    <option value="chamenuoi">Cha nuôi, mẹ nuôi</option>
                    <option value="conde">Con đẻ</option>
                    <option value="connuoi">Con nuôi</option>
                    <option value="ongba">Ông nội, bà nội</option>
                    <option value="ongba">Ông ngoại, bà ngoại</option>
                    <option value="anhchiem">Anh ruột; chị ruột; em ruột; cháu ruột</option>
                    <option value="cu">Cụ nội, cụ ngoại</option>
                    <option value="bacchucaucodi">Bác ruột, chú ruột, cậu ruột, cô ruột, dì ruột, chắt ruột</option>
                    <option value="nguoigiamho">Người giám hộ</option>
                    <option value="nguoionho">Người ở nhờ; ở mượn; ở thuê</option>
                    <option value="nguoicungonho">Người cùng ở nhờ; cùng ở thuê; cùng ở mượn.</option>
                  </select>
                </td>
                <td>
                  <select name="isOwner[]" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </td>
                <td>
                  <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                </td>
              </tr>
            </tbody>
          </table>

        
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
          
        <div class="form-group col-md-12">
          <button type="reset" class="btn btn-warning">Khôi phục</button>
           <button type="submit" class="btn btn-success">Lưu trữ</button>
        </div>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
  // Add member dynamically
  const addMemberButton = document.getElementById('add');
  const membersContainer = document.getElementById('tbody');
  const memberTemplate = `
  <td>
  <select name="personId[]" class="form-control">
    <option value="">Chọn đi</option>
    @foreach ($people as $person)
    <option value="{{$person->id}}">{{$person->id}}</option>
    @endforeach
  </select>
  </td>
  <td>
    <select name="relationship[]" class="form-control">
      <option value="">Quan hệ với chủ hộ</option>
      <option value="chuho">Chủ hộ</option>
      <option value="vochong">Vợ (chồng)</option>
      <option value="chamede">Cha đẻ, mẹ đẻ</option>
      <option value="chamenuoi">Cha nuôi, mẹ nuôi</option>
      <option value="conde">Con đẻ</option>
      <option value="connuoi">Con nuôi</option>
      <option value="ongba">Ông nội, bà nội</option>
      <option value="ongba">Ông ngoại, bà ngoại</option>
      <option value="anhchiem">Anh ruột; chị ruột; em ruột; cháu ruột</option>
      <option value="cu">Cụ nội, cụ ngoại</option>
      <option value="bacchucaucodi">Bác ruột, chú ruột, cậu ruột, cô ruột, dì ruột, chắt ruột</option>
      <option value="nguoigiamho">Người giám hộ</option>
      <option value="nguoionho">Người ở nhờ; ở mượn; ở thuê</option>
      <option value="nguoicungonho">Người cùng ở nhờ; cùng ở thuê; cùng ở mượn.</option>
    </select>
  </td>
  <td>
                  <select name="isOwner[]" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </td>
  <td>
    <button type="button" name="remove" class="btn btn-danger remove">Remove</button>
  </td>

`;


  addMemberButton.addEventListener('click', function () {
      const memberWrapper = document.createElement('tr');
      memberWrapper.innerHTML = memberTemplate;
      membersContainer.appendChild(memberWrapper);

      const removeButtons = document.getElementsByClassName('remove');
      for (let i = 0; i < removeButtons.length; i++) {
          const removeButton = removeButtons[i];
          removeButton.addEventListener('click', function () {
              memberWrapper.remove();
          });
      }
  });



</script>
@endpush
