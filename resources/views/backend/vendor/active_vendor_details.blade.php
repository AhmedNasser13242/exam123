@extends('admin.admin_dashboard')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">الحسابات المفعلة</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">تفاصيل الحسابات المفعلة</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

<div class="col-lg-12">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('inactive.vendor.approve') }}" enctype="multipart/form-data" >
			@csrf

		<input type="hidden" name="id" value="{{ $activeVendorDetails->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">اسم المستخدم</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="username" value="{{ $activeVendorDetails->username }}"   />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">اسم الشهرة</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="{{ $activeVendorDetails->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"></h6>حساب المعلم
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="{{ $activeVendorDetails->email }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">رقم المعلم</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="{{ $activeVendorDetails->phone }}" />
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">عنوان المعلم</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="{{ $activeVendorDetails->address }}" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">سجل في</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="vendor_join" class="form-control" value="{{ $activeVendorDetails->vendor_join }}" />
				</div>
			</div>




			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">معلومات المعلم</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<textarea name="vendor_short_info" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3">
					{{ $activeVendorDetails->vendor_short_info }}
				</textarea>
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">صورة المعلم</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ (!empty($activeVendorDetails->photo)) ? url('upload/vendor_images/'.$activeVendorDetails->photo):url('upload/no_image.jpg') }}" alt="Vendor" style="width:100px; height: 100px;"  >
				</div>
			</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-danger px-4" value="تعطيل حساب المعلم" />
				</div>
			</div>
		</div>

		</form>



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>






@endsection
