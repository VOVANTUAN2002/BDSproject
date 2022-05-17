@extends('admin.layouts.master')
@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{route('messages.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Tin Nhắn</a>
            </li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm Tin Nhắn</h1>
</header>

<div class="page-section">
    <form method="post" action="{{route('messages.store')}}">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="tf1">Tiêu Đề<abbr name="Trường bắt buộc">*</abbr></label> 
                    <input name="title" type="text" class="form-control" id="" value="{{ old('title')}}" placeholder="Nhập tiêu đề tin nhắn">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Nội Dung<abbr name="Trường bắt buộc">*</abbr></label> 
                    <textarea name="content"class="form-control" id=""  type="text" placeholder="Nhập nội dung tin nhắn"> {{ old('content') }}</textarea>
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('content') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Kiểu Tin Nhắn<abbr name="Trường bắt buộc">*</abbr></label> <input name="type" type="text" class="form-control" id="" value="{{ old('type')}}" placeholder="Nhập kiểu tin nhắn">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('type') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Trạng Thái<abbr name="Trường bắt buộc">*</abbr></label> <input name="status" type="text" class="form-control" id="" value="{{ old('status')}}" placeholder="Nhập trạng thái">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('status') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tf1">Ngày Gửi<abbr name="Trường bắt buộc">*</abbr></label> <input name="date_send" type="date" value="{{ old('date_send')}}" class="form-control" id="">
                    <small id="" class="form-text text-muted"></small>
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('date_send') }}</p>
                    @endif
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{route('messages.index')}}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection