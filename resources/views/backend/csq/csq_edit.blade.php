@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">تعديل اسألة اكمل</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل اسألة اكمل</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="p-4 card-body">
            <h5 class="card-title">تعديل السؤال</h5>
            <hr />
            <form id="myForm" method="post" action="{{ route('update.csq') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $csqs->id }}">
                <div class="mt-4 form-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="p-4 border rounded border-3">
                                <div class="mb-3 form-group">
                                    <label for="inputcsqTitle" class="form-label">السؤال</label>
                                    <input type="text" name="csq_title" class="form-control" id="inputcsqTitle"
                                        value="{{ $csqs->csq_title }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="p-4 border rounded border-3">
                                <div class="row g-3">
                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">المرحلة الدراسية</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $csqs->category_id ?
                                                'selected' : '' }}>{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">الصف الدراسي</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            @foreach($subcategory as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $csqs->subcategory_id ?
                                                'selected' : '' }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputmcqType" class="form-label">المادة الدراسية</label>
                                        <select name="level_id" class="form-select" id="inputmcqType">
                                            @foreach($levels as $level)
                                            <option value="{{ $level->id }}" {{ $level->id == $csqs->level_id ?
                                                'selected' : '' }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputmcqType" class="form-label">الوحدة الدراسية</label>
                                        <select name="brand_id" class="form-select" id="inputmcqType">
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $csqs->brand_id ?
                                                'selected' : '' }} >{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">تعديل معلم *(اختياري)</label>
                                        <select name="vendor_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach($activeVendor as $vendor)
                                            <option value="{{ $vendor->id }}" {{ $vendor->id == $csqs->vendor_id ?
                                                'selected' : '' }}>{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div> <!-- // end row  -->
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="px-4 btn btn-primary" value="Save Changes" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
        </div>
        </form>
    </div>
</div>


<!-- /// Main Image Thambnail Update ////// -->

<div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Main Image Thambnail </h6>
    <hr>
    <div class="card">
        <form method="post" action="{{ route('update.csq.thambnail') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $csqs->id }}">
            <input type="hidden" name="old_img" value="{{ $csqs->csq_thambnail }}">

            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Chose Thambnail Image </label>
                    <input name="csq_thambnail" class="form-control" type="file" id="formFile">
                </div>


                <div class="mb-3">
                    <label for="formFile" class="form-label"> </label>
                    <img src="{{ asset($csqs->csq_thambnail) }}" style="width:100px; height:100px">
                </div>

                <input type="submit" class="px-4 btn btn-primary" value="حفظ التغييرات" />

            </div>

        </form>

    </div>
</div>


<!-- /// End Main Image Thambnail Update ////// -->

<!-- /// Update Multi Image  ////// -->

<div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Multi Image </h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">تغيير الصورة</th>
                        <th scope="col">مسح </th>
                    </tr>
                </thead>
                <tbody>

                    <form method="post" action="{{ route('update.csq.multiimage') }}" enctype="multipart/form-data">
                        @csrf

                        @foreach($multiImgs as $key => $img)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td> <img src="{{ asset($img->photo_name) }}" style="width:70; height: 40px;"> </td>
                            <td> <input type="file" class="form-group" name="multi_img[{{ $img->id }}]"> </td>
                            <td>
                                <input type="submit" class="px-4 btn btn-primary" value="تغيير الصورة" />
                                <a href="{{ route('csq.multiimg.delete',$img->id) }}" class="btn btn-danger"
                                    id="delete"> مسح </a>
                            </td>
                        </tr>
                        @endforeach

                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /// End Update Multi Image  ////// -->





<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                csq_name: {
                    required : true,
                },

                 brand_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
                 subcategory_id: {
                    required : true,
                },
            },
            messages :{
                csq_name: {
                    required : 'Please Enter csq Name',
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
    function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>
    $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

</script>



<script type="text/javascript">
    $(document).ready(function(){
  			$('select[name="category_id"]').on('change', function(){
  				var category_id = $(this).val();
  				if (category_id) {
  					$.ajax({
  						url: "{{ url('/subcategory/ajax') }}/"+category_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="subcategory_id"]').html('');
  							var d =$('select[name="subcategory_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
</script>


@endsection