@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">

    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">تعديل السؤال</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل السؤال</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="p-4 card-body">
            <h5 class="card-title">تعديل السؤال</h5>
            <hr />

            <form id="myForm" method="post" action="{{ route('update.mcq') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $mcqs->id }}">
                <div class="mt-4 form-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="p-4 border rounded border-3">


                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" name="mcq_title" class="form-control" id="inputProductTitle"
                                        value="{{ $mcqs->mcq_title }}">
                                </div>



                                <div class="mb-3 form-group">
                                    <label for="inputmcqDescription" class="form-label">الاجابة الاولي</label>
                                    <input name="first_answer" class="form-control" id="inputmcqDescription" rows="3"
                                        value="{{ $mcqs->first_answer }}"></input>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputmcqDescription" class="form-label">الاجابة الثانية</label>
                                    <input name="sec_answer" class="form-control" id="inputmcqDescription" rows="3"
                                        value="{{ $mcqs->sec_answer }}"></input>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputmcqDescription" class="form-label">الاجابة الثالثة</label>
                                    <input name="thr_answer" class="form-control" id="inputmcqDescription" rows="3"
                                        value="{{ $mcqs->thr_answer }}"></input>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputmcqDescription" class="form-label">الاجابة الرابعة</label>
                                    <input name="forth_answer" class="form-control" id="inputmcqDescription" rows="3"
                                        value="{{ $mcqs->forth_answer }}"></input>
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
                                            <option value="{{ $cat->id }}" {{ $cat->id == $mcqs->category_id ?
                                                'selected' : '' }}>{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">الصف الدراسي</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            @foreach($subcategory as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $mcqs->subcategory_id ?
                                                'selected' : '' }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputmcqType" class="form-label">المادة الدراسية</label>
                                        <select name="level_id" class="form-select" id="inputmcqType">
                                            @foreach($levels as $level)
                                            <option value="{{ $level->id }}" {{ $level->id == $mcqs->level_id ?
                                                'selected' : '' }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputmcqType" class="form-label">الوحدة الدراسية</label>
                                        <select name="brand_id" class="form-select" id="inputmcqType">
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $mcqs->brand_id ?
                                                'selected' : '' }} >{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">تعديل معلم *(اختياري)</label>
                                        <select name="vendor_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach($activeVendor as $vendor)
                                            <option value="{{ $vendor->id }}" {{ $vendor->id == $mcqs->vendor_id ?
                                                'selected' : '' }}>{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12">

                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <div class="form-check">




                                                </div> <!-- // end row  -->

                                            </div>

                                            <hr>


                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="submit" class="px-4 btn btn-primary"
                                                        value="Save Changes" />

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
        <h6 class="mb-0 text-uppercase">تغيير الصورة</h6>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('update.mcq.thambnail') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $mcqs->id }}">
                <input type="hidden" name="old_img" value="{{ $mcqs->mcq_thambnail }}">

                <div class="card-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">تغيير الصورة</label>
                        <input name="mcq_thambnail" class="form-control" type="file" id="formFile">
                    </div>


                    <div class="mb-3">
                        <label for="formFile" class="form-label"> </label>
                        <img src="{{ asset($mcqs->mcq_thambnail) }}" style="width:100px; height:100px">
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

                        <form method="post" action="{{ route('update.mcq.multiimage') }}" enctype="multipart/form-data">
                            @csrf

                            @foreach($multiImgs as $key => $img)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td> <img src="{{ asset($img->photo_name) }}" style="width:70; height: 40px;"> </td>
                                <td> <input type="file" class="form-group" name="multi_img[{{ $img->id }}]"> </td>
                                <td>
                                    <input type="submit" class="px-4 btn btn-primary" value="تغيير الصورة" />
                                    <a href="{{ route('mcq.multiimg.delete',$img->id) }}" class="btn btn-danger"
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
                mcq_name: {
                    required : true,
                },
                 short_descp: {
                    required : true,
                },
                 mcq_thambnail: {
                    required : true,
                },
                 multi_img: {
                    required : true,
                },
                 selling_price: {
                    required : true,
                },
                 mcq_code: {
                    required : true,
                },
                 mcq_qty: {
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
                mcq_name: {
                    required : 'Please Enter mcq Name',
                },
                short_descp: {
                    required : 'Please Enter Short Description',
                },
                mcq_thambnail: {
                    required : 'Please Select mcq Thambnail Image',
                },
                multi_img: {
                    required : 'Please Select mcq Multi Image',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                },
                mcq_code: {
                    required : 'Please Enter mcq Code',
                },
                 mcq_qty: {
                    required : 'Please Enter mcq Quantity',
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
                          alert('سيحدث خطأ اذا لغتيه');
                      }

                });
            });

            $(document).ready(function(){
                          $('select[name="subcategory_id"]').on('change', function(){
                              var subcategory_id = $(this).val();
                              if (subcategory_id) {
                                  $.ajax({
                                      url: "{{ url('/level/ajax') }}/"+subcategory_id,
                                      type: "GET",
                                      dataType:"json",
                                      success:function(data){
                                          $('select[name="level_id"]').html('');
                                          var d =$('select[name="level_id"]').empty();
                                          $.each(data, function(key, value){
                                              $('select[name="level_id"]').append('<option value="'+ value.id + '">' + value.level_name + '</option>');
                                          });
                                      },
                                  });
                              } else {
                                  alert('سيحدث خطأ اذا لغتيه');
                              }
                          });
                      });

            $(document).ready(function(){
                          $('select[name="level_id"]').on('change', function(){
                              var level_id = $(this).val();
                              if (level_id) {
                                  $.ajax({
                                      url: "{{ url('/brand/ajax') }}/"+level_id,
                                      type: "GET",
                                      dataType:"json",
                                      success:function(data){
                                          $('select[name="brand_id"]').html('');
                                          var d =$('select[name="brand_id"]').empty();
                                          $.each(data, function(key, value){
                                              $('select[name="brand_id"]').append('<option value="'+ value.id + '">' + value.brand_name + '</option>');
                                          });
                                      },
                                  });
                              } else {
                                  alert('سيحدث خطأ اذا لغتيه');
                              }
                          });
                      });


    </script>


    @endsection