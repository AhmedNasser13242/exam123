@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
					<div class="breadcrumb-title pe-3">تعديل الوحدات الدراسية </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="p-0 mb-0 breadcrumb">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">تعديل الوحدات الدراسية </li>
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

<div class="col-lg-10">
	<div class="card">
		<div class="card-body">

            <form id="myForm" method="post" action="{{ route('update.brand') }}" enctype="multipart/form-data" >
                			@csrf

                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">اختيار المادة</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                         <select name="level_id" class="mb-3 form-select" aria-label="Default select example">
                             <option selected=""></option>

                             @foreach($levels as $level)
                             <option value="{{ $level->id }}" {{ $level->id == $brand->level_id ? 'selected' : '' }} >{{ $level->level_name }}</option>
                             @endforeach

                                                </select>
                                </div>
                            </div>


			<div class="mb-3 row">
				<div class="col-sm-3">
					<h6 class="mb-0">عنوان</h6>
				</div>
				<div class="form-group col-sm-9 text-secondary">
					<input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}"   />
				</div>
			</div>


			<div class="mb-3 row">
				<div class="col-sm-3">
					<h6 class="mb-0">صورة</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="file" name="brand_image" class="form-control"  id="image"   />
				</div>
			</div>



			<div class="mb-3 row">
				<div class="col-sm-3">
					<h6 class="mb-0"> </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ asset($brand->brand_image)   }}" alt="Admin" style="width:100px; height: 100px;"  >
				</div>
			</div>





			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="px-4 btn btn-primary" value="حفظ" />
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




<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                brand_name: {
                    required : true,
                },
            },
            messages :{
                brand_name: {
                    required : 'Please Enter brand Name',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>




<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>



@endsection
