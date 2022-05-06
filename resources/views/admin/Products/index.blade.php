@extends('admin.layouts.master')

@section('content')

<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
        </ol>
    </nav>
    <a href="{{route('products.index')}}" class="btn btn-success btn-floated"></a>
    <div class="d-md-flex align-items-md-start">
        <h1 class="page-title mr-sm-auto">Quản Lý Sản Phẩm</h1>
        <div class="btn-toolbar">
            <a href="{{route('products.create')}}" class="btn btn-primary">
                <i class="fa-solid fa fa-plus"></i>
                <span class="ml-1">Thêm Mới</span>
            </a>
        </div>
    </div>
</header>

<div class="page-section">
    <div class="card card-fluid">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#tab1">Tất Cả</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <form action="" method="GET" id="form-search">
                        <div class="input-group input-group-alt">
                            <div class="input-group-prepend">
                                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#modalFilterColumnsProducts">Tìm nâng cao</button>
                            </div>
                            <div class="input-group has-clearable">
                                <button type="button" class="close trigger-submit trigger-submit-delay" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                </button>
                                <div class="input-group-prepend trigger-submit">
                                    <span class="input-group-text"><span class="fas fa-search"></span></span>
                                </div>
                                <input type="text" class="form-control" name="s" value="" placeholder="Tìm nhanh theo cú pháp (ma:Mã kết quả hoặc ten:Tên kết quả)">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearchProducts" type="button">Lưu bộ lọc</button>
                            </div>
                        </div>
                        <!-- modalFilterColumns  -->
                        @include('admin.products.modals.modalFilterColumnsProducts')
                    </form>
                    <!-- modalFilterColumns  -->
                    @include('admin.products.modals.modalSaveSearchProducts')
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <br>
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{session::get('success')}}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{session::get('error')}}</div>
                        @endif
                        <br>
                        <tr>

                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Địa chỉ</th>
                            <th>Loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>

                            <td class="align-middle"> {{ $product->name }} 
                                <br><span class="badge badge-success">CN: {{ $product->branch->name }}</span>
                                <span class="badge badge-primary">Mã: {{ $product->id }}</span>
                                <span class="badge badge-warning">Loại: {{ $product->product_type }}</span>
                                @if( $product->product_hot)
                                <span class="badge badge-danger">Sản phẩm HOT</span>
                                @endif
                            </td>
                            <td class="align-middle"> {{number_format($product->price)}} </td> 
                            <td class="align-middle"> {{ $product->address }} </td>
                            <td class="align-middle"> {{ $product->product_type }} </td>
                            <td class="align-middle"> {{ $product->status }} </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}}" title="Edit Student"><button class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> </button></a>
                                <form method="POST" action="{{ route('products.destroy',$product->id )}}" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Xóa {{$product->name}} ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $products->links() }}</span>
                </ul>
            </div>
        </nav>

        @endsection