@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">جمبع المراحل</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">جميع المراحل</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.category') }}" class="btn btn-primary">اضف مرحلة</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>عنوان</th>
                            <th>صورة</th>
                            <th>فعل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td>{{ $item->category_name }}</td>
                            <td> <img src="{{ asset($item->category_image) }}" style="width: 70px; height:40px;"> </td>

                            <td>
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">تعديل</a>
                                <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger"
                                    id="delete">ازالة</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>عنوان</th>
                            <th>صورة</th>
                            <th>فعل</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection