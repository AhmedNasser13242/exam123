@extends('vendor.vendor_dashboard')
@section('vendor')
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">جمبع الأختبارات</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">جميع الأختبارات</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.project') }}" class="btn btn-primary">اضف اختبار</a>
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
                            <th>فعل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td>{{ $item->project_name }}</td>
                            <td>
                                <a href="/vendor/add/test/{{ $item->id }}" class="btn btn-info"
                                    style="background-color: rgb(99, 37, 153); color:white;">اضف اسالة الاختياري</a>
                                <a href="/vendor/add/testcsq/{{ $item->id }}" class="btn btn-info"
                                    style="background-color: rgb(99, 37, 153); color:white;">اضف اسالة اكمل</a>
                                <a href="/vendor/add/testrow/{{ $item->id }}" class="btn btn-info"
                                    style="background-color: rgb(99, 37, 153); color:white;">اضف اسالة صح و خطأ</a>
                                <a href="/vendor/export-pdf/download/{{ $item->id }}" class="btn btn-info"
                                    style="color: white;">قم
                                    بالشراء</a>
                                {{-- <a href="{{ route('edit.project',$item->id) }}" class="btn btn-info">تعديل</a> --}}
                                <a href="{{ route('delete.project',$item->id) }}" class="btn btn-danger"
                                    id="delete">ازالة</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>عنوان</th>
                            <th>فعل</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection