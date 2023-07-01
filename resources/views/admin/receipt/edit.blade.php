@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Chỉnh sửa phiếu thu
        <a href="{{ url('admin/receipt') }}" class="btn btn-danger btn-sm text-white float-right">Trở về</a>
    </h5>
    <div class="card-body">
        <form action="{{ url('admin/receipt/'.$receipt->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Người nộp<span class="text-danger">*</span></label>
                    <input type="text" name="personId" placeholder="Họ tên đệm" value="{{$receipt->personId}}" class="form-control">
                    @error('personId')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Nộp cho hộ<span class="text-danger">*</span></label>
                    <input type="text" name="householdId" placeholder="Tên" value="{{$receipt->householdId}}" class="form-control">
                    @error('householdId')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Khoản thu<span class="text-danger">*</span></label>
                    <input type="text" name="feeId" placeholder="Tên" value="{{$receipt->fee->name}}" class="form-control">
                    @error('feeId')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Số tiền nộp<span class="text-danger">*</span></label>
                    <input type="number" name="amount" placeholder="Tên" value="{{$receipt->amount}}" class="form-control">
                    @error('amount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <label>Ghi chú</span></label>
                    <input type="text" name="note" placeholder="Căn cước công dân(CCCD)" value="{{$receipt->note}}" class="form-control">
                    @error('note')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-md-12">
                    <button type="reset" class="btn btn-warning">Khôi phục</button>
                    <button type="submit" class="btn btn-success">Lưu trữ</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
