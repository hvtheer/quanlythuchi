@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Thông tin khoản thu<a href="{{ url('admin/fee') }}" class="btn btn-danger btn-sm text-white float-right">Trở về</a></h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
              <p><strong>ID khoản thu:</strong> {{ $fee->id }}</p>
              <p><strong>Tên khoản thu:</strong> {{ $fee->name }}</p>
              <p><strong>Loại hình:</strong> {{ $fee->type == 'mandatory' ? 'Bắt buộc':'Tự nguyện' }}</p>
          </div>
          <div class="col-md-6">
            <p><strong>Ngày bắt đầu:</strong>{{$fee->startDate}}</p>
            <p><strong>Ngày kết thúc:</strong> {{ $fee->endDate }}</p>
            <p><strong>Ngày tạo:</strong> {{ $fee->created_at }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $fee->updated_at }}</p>
        </div>

            <div class="form-group col-md-12">
              <a href="{{url('admin/fee/'.$fee->id.'/edit')}}" class="btn btn-primary">Sửa thông tin</a>
            </div>
        </div>
    </div>
</div>

@endsection
