@extends('layout.master')
@section('title', 'Training')
{{-- @section('title', $seo_data['title'])
@section('og_title', $seo_data['og_title'])
@section('description', $seo_data['description'])
@section('og_description', $seo_data['og_description'])
@section('keywords', $seo_data) --}}

@section('content')
<img src="{{ asset('public/assets/images/dummy1.png') }}" class="w-100" />
<img src="{{ asset('public/assets/images/dummy2.png') }}" class="w-100" />
<img src="{{ asset('public/assets/images/dummy3.png') }}" class="w-100" />
@endsection

@section('script')

@endsection
