@extends('vendor.vendor_dashboard')
@section('vendor')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">الاسالة الاختياري</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">الاسالة الاختياري <span
                            class="badge rounded-pill bg-danger"> {{ count($tests) }} </span> </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                {{-- <a href="{{ route('vendor.add.test') }}" class="btn btn-primary">Add test</a> --}}
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
                            <th>اختبار </th>
                            <th>صورة </th>
                            <th>السؤال</th>
                            <th>الاجابة الاولي</th>
                            <th>الاجابة الثانية</th>
                            <th>الاجابة الثالثة</th>
                            <th>الاجابة الرابعة</th>
                            <th>الحالة </th>
                            <th>فعل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $key => $item)
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td>{{ $item['project']['project_name'] }}</td>
                            <td> <img src="{{ asset($item->q5) }}" style="width: 70px; height:40px;"> </td>
                            <td>{{ $item->name_program }}</td>
                            <td>{{ $item->q1 }}</td>
                            <td>{{ $item->q2 }}</td>
                            <td>{{ $item->q3 }}</td>
                            <td>{{ $item->q4 }}</td>
                            <td> @if($item->status == 1)
                                <span class="badge rounded-pill bg-success">نشط</span>
                                @else
                                <span class="badge rounded-pill bg-danger">غير نشط</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('vendor.delete.test',$item->id) }}" class="btn btn-danger" id="delete"
                                    title="Delete Data"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>اختبار </th>
                            <th>صورة </th>
                            <th>السؤال</th>
                            <th>الاجابة الاولي</th>
                            <th>الاجابة الثانية</th>
                            <th>الاجابة الثالثة</th>
                            <th>الاجابة الرابعة</th>
                            <th>الحالة </th>
                            <th>فعل</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



</div>




@endsection