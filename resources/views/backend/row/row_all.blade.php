@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
					<div class="breadcrumb-title pe-3">جميع اسألة صح و خطأ</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="p-0 mb-0 breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">جميع اسألة صح و خطأ  <span class="badge rounded-pill bg-danger"> {{ count($rows) }} </span> </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
		<a href="{{ route('add.row') }}" class="btn btn-primary">اضف سؤال</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
			<tr>
				<th>Sl</th>
				<th>صورة السؤال</th>
				<th>السؤال</th>
				<th>Status </th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	@foreach($rows as $key => $item)
			<tr>
				<td> {{ $key+1 }} </td>
				<td> <img src="{{ asset($item->row_thambnail) }}" style="width: 70px; height:40px;" >  </td>
				<td>{{ $item->row_title }}</td>
				<td> @if($item->status == 1)
					<span class="badge rounded-pill bg-success">نشط</span>
					@else
					<span class="badge rounded-pill bg-danger">معطل</span>
					@endif
				   </td>

				<td>
                    <a href="{{ route('edit.row',$item->id) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
                    <a href="{{ route('delete.row',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data" ><i class="fa fa-trash"></i></a>

                    <a href="{{ route('edit.category',$item->id) }}" class="btn btn-warning" title="Details Page"> <i class="fa fa-eye"></i> </a>

                    @if($item->status == 1)
                    <a href="{{ route('row.inactive',$item->id) }}" class="btn btn-primary" title="Inactive"> <i class="fa-solid fa-thumbs-down"></i> </a>
                    @else
                    <a href="{{ route('row.active',$item->id) }}" class="btn btn-primary" title="Active"> <i class="fa-solid fa-thumbs-up"></i> </a>
                    @endif

				</td>
			</tr>
			@endforeach


		</tbody>
		<tfoot>
			<tr>
				<th>Sl</th>
				<th>صورة السؤال </th>
				<th>السؤال</th>
				<th>Status </th>
				<th>Action</th>
			</tr>
		</tfoot>
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection
