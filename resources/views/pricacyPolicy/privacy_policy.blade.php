@extends('layout.master')

@section('title', 'Privacy Policy')

@section('style')
<style></style>
@endsection

@section('content')
<div>
    <div class="position-relative banner page-banner">
        <img src="{{ asset('public/assets/images/banner-img.png') }}" class="w-100 h-100" />
        <div class="content">
            <h1 class="heading">Privacy Policy</h1>
        </div>
    </div>
    <div class="my-3 my-md-5 px-3 px-md-0">
        <div class="container shadow-lg rounded p-3 px-md-3 py-md-4">
            {!! $data->description !!}
        </div>
    </div>
</div> 
@endsection

@section('script')
<script></script>
@endsection
