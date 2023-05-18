@extends('vendor.vendor_dashboard')
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">اضف الاختبار دراسية</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">اضف الاختبار دراسية</li>
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
                            <form id="myForm" method="post" action="{{ route('store.project') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 form-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="p-4 border rounded border-3">


                                                <div class="mb-3 form-group">
                                                    <label for="inputmcqTitle" class="form-label">اسم الاختبار</label>
                                                    <input type="text" name="project_name" class="form-control"
                                                        id="inputmcqTitle" placeholder="Enter mcq title">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="p-4 border rounded border-3">
                                                <div class="row g-3">




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

                    <script type="text/javascript">
                        $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                project_name: {
                    required: true
                , }
            , }
            , messages: {
                project_name: {
                    required: 'Please Enter project Name'
                , }
            , }
            , errorElement: 'span'
            , errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
            , highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            }
            , unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        , });
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
