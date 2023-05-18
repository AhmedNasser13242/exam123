@extends('vendor.vendor_dashboard')
@section('vendor')

@php
$id = Auth::user()->id;
$verdorId = App\Models\User::find($id);
$status = $verdorId->status;
@endphp

<div class="page-content">


    @if($status === 'active')
    <h4>حساب المعلم <span class="text-success">مفعل</span> </h4>
    @else
    <h4>حساب المعلم <span class="text-danger">معطل</span> </h4>
    <p class="text-danger"><b>لقدت تم تعطيل حسابك يرجي مراجعة الدعم</b></p>
    @endif



    @endsection