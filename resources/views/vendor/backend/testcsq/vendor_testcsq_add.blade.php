@extends('vendor.vendor_dashboard')
@section('vendor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">

    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">اضف الاسألة</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">اضف الاسألة</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="p-4 card-body">
            <h5 class="card-title">اضف اسالة جديدة</h5>
            <hr />

            <form id="myForm" method="post" action="{{ route('vendor.store.testcsq') }}" enctype="multipart/form-data">
                @csrf

                <div class="mt-4 form-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="p-4 border rounded border-3">

                                @php
                                $projects =
                                App\Models\Project::where('id',$project->id)->orderBy('project_name','ASC')->get();
                                @endphp
                                <div class="mb-3 form-group">
                                    <label for="inputtestTycsqpe" class="form-label">الاختبار</label>
                                    <select name="project_id" class="form-select" id="inputtestType">
                                        @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3 form-group">
                                    <label for="inputtestTitle" class="form-label">صورة الاختبار اذا وجد</label>
                                    <input name="product_thambnail" class="form-control" type="file" id="formFile"
                                        onChange="mainThamUrl(this)">

                                    <img src="" id="mainThmb" />
                                </div>






                                <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
                                    <div class="breadcrumb-title pe-3">جمبع المراحل</div>
                                    <div class="ps-3">
                                        <nav aria-label="breadcrumb">
                                            <ol class="p-0 mb-0 breadcrumb">
                                                <li class="breadcrumb-item"><a href="javascript:;"><i
                                                            class="bx bx-home-alt"></i></a>
                                                </li>
                                                <li class="breadcrumb-item active" aria-current="page">جميع
                                                    المراحل</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="btn-group">
                                            <a href="{{ route('add.category') }}" class="btn btn-primary"
                                                style="background-color: rgb(94, 31, 141); color:white;">اضف
                                                مرحلة</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end breadcrumb-->

                                <hr />
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>السؤال</th>
                                                        <th>الوحدة -- المادة -- الصف -- المرحلة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($csqs as $key => $item)
                                                    <tr>
                                                        <td> {{ $key+1 }} </td>

                                                        </td>

                                                        <td>
                                                            <label class="form-check-label" for="check1">
                                                                <input type="checkbox" class="form-check-input" id=""
                                                                    name="checkbox[]" value="{{ $item->csq_title }}">{{
                                                                $item->csq_title }}
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <h6>{{$item['category']['category_name']}}
                                                                -- {{$item['subcategory']['subcategory_name']}}
                                                                -- {{$item['level']['level_name']}}
                                                                -- {{$item['brand']['brand_name']}}</h6>
                                                        </td>

                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>السؤال</th>
                                                        <th>الوحدة -- المادة -- الصف -- المرحلة</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="p-4 border rounded border-3">
                                <div class="row g-3">
                                    <div class="form-group col-12">




                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input type="submit" class="px-4 btn btn-primary"
                                                    style="background-color: rgb(94, 31, 141); color:white;"
                                                    value="حفظ" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>





        </div>
    </div>

    </form>

</div>

</div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                test_name: {
                    required : true,
                },
                 short_descp: {
                    required : true,
                },

                 selling_price: {
                    required : true,
                },
                 test_code: {
                    required : true,
                },
                 test_qty: {
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
                test_name: {
                    required : 'Please Enter test Name',
                },
                short_descp: {
                    required : 'Please Enter Short Description',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                },
                test_code: {
                    required : 'Please Enter test Code',
                },
                 test_qty: {
                    required : 'Please Enter test Quantity',
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